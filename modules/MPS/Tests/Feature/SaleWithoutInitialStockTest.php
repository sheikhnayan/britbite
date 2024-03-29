<?php

namespace Modules\MPS\Tests\Feature;

use Modules\MPS\Models\Tax;
use Modules\MPS\Models\Item;
use Modules\MPS\Models\Sale;
use Modules\MPS\Models\Unit;
use Modules\MPS\Models\Brand;
use Modules\MPS\Models\Account;
use Modules\MPS\Models\Costing;
use Modules\MPS\Models\Category;
use Modules\MPS\Models\Customer;
use Modules\MPS\Models\Location;
use Modules\MPS\Models\SaleItem;
use Modules\MPS\Tests\MPSTestCase;
use Modules\MPS\Models\OverSelling;

class SaleWithoutInitialStockTest extends MPSTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->user    = $this->createUser('super');
        $this->unit    = factory(Unit::class)->create();
        $this->brand   = factory(Brand::class)->create();
        $this->account = factory(Account::class)->create();
        $category      = factory(Category::class)->create();
        $this->route   = url(module('route')) . '/app/sales/';
        factory('Modules\MPS\Models\Setting')->create(['mps_key' => 'stock', 'mps_value' => '1']);
        $locations = factory(Location::class, 2)->create(['account_id' => $this->account->id]);

        $taxes[]         = factory(Tax::class)->create(['name' => 'CGST @ 9%', 'code' => 'cgst@9', 'rate' => 9, 'compound' => false, 'state' => true, 'same' => true])->toArray()['id'];
        $taxes[]         = factory(Tax::class)->create(['name' => 'SGST @ 9%', 'code' => 'sgst@9', 'rate' => 9, 'compound' => false, 'state' => true, 'same' => true])->toArray()['id'];
        $taxes[]         = factory(Tax::class)->create(['name' => 'IGST @ 18%', 'code' => 'igst@18', 'rate' => 18, 'compound' => false, 'recoverable' => true, 'state' => true, 'same' => false])->toArray()['id'];
        $this->locations = $locations;
        $this->items     = factory(Item::class, 5)->create()->each(function ($item) use ($category, $locations, $taxes) {
            $item->taxes()->sync($taxes);
            $item->categories()->sync($category->id);
            foreach ($this->locations as $location) {
                session(['location_id' => $location->id]);
                // $item->stock()->create(['quantity' => 20]);
            }
        });
    }

    public function testMPSCanCreatAndUpdateSaleWithoutInitialStock()
    {
        // Check with draft true
        $location = $this->locations->first();
        session(['location_id' => $location->id]);
        $customer  = factory(Customer::class)->create(['user_id' => $this->user->id]);
        $new_sale1 = factory(Sale::class)->make([
            'draft'       => true,
            'customer_id' => $customer->id,
            'date'        => now()->format('Y-m-d'),
        ])->toArray();
        $new_sale1['items'] = $this->items->random(2)->map(function ($item) use ($location, $customer) {
            $applicable_taxes = $item->taxes->filter(function ($tax) use ($location, $customer) {
                if ($tax->state) {
                    $check = $customer->state == $location->state;
                    return $tax->same ? $check : !$check;
                }
                return true;
            })->pluck('id')->all();
            return [
                'id'              => $item->id,
                'name'            => $item->name,
                'code'            => $item->code,
                'cost'            => $item->cost,
                'price'           => $item->price,
                'quantity'        => mt_rand(2, 5),
                'item_id'         => $item->id,
                'batch_no'        => 'bn123',
                'net_cost'        => $item->net_cost,
                'net_price'       => $item->net_price,
                'unit_cost'       => $item->unit_cost,
                'unit_price'      => $item->unit_price,
                'taxes'           => $applicable_taxes,
                'allTaxes'        => $item->taxes->pluck('id')->all(),
                'categories'      => $item->categories[0]->id,
                'selected'        => [],
                'discount_amount' => null,
                'discount'        => null,
                'promotions'      => null,
                'expiry_date'     => now()->format('Y-m-d'),
            ];
        })->toArray();

        // insert
        $response = $this->actingAs($this->user)->ajax()->post($this->route, $new_sale1);
        // dd($response->json());
        $response->assertOk();

        // check
        $update = $new_sale1;
        $sale   = Sale::with('items')->find($response['data']['id']);
        $this->assertEquals(1, $sale->draft);
        foreach ($sale->items as $item) {
            $this->assertEquals(0, $item->stock()->first()?->quantity);
        }
        $update['draft'] = false;
        $update['date']  = now()->subDays(2)->format('Y-m-d');
        $response        = $this->actingAs($this->user)->ajax()->put($this->route . $sale->id, $update);
        // dd($response->json());
        $response->assertOk();

        // update
        $sale = $sale->refresh();
        $this->assertEquals(0, $sale->draft);
        $this->assertEquals($update['date'], $sale->date->toDateString());
        foreach ($sale->items as $item) {
            $item->refresh();
            $this->assertEquals(0 - $item->quantity, $item->stock()->first()->quantity);
        }

        // delete
        $this->actingAs($this->user)->ajax()->delete($this->route . $sale->id)->assertOk();
        $this->assertModelMissing($sale);
        $this->assertEquals(0, SaleItem::count());
        $items = Item::with('stock')->get();
        foreach ($items as $item) {
            $this->assertEquals(0, $item->stock()->where('location_id', $location->id)->first()?->quantity);
        }

        // Check with draft false
        $new_sale2          = $new_sale1;
        $new_sale2['draft'] = false;
        $response2          = $this->actingAs($this->user)->ajax()->post($this->route, $new_sale2);
        $response2->assertOk();

        $update = $new_sale2;
        $sale   = Sale::with('items')->find($response2['data']['id']);
        $this->assertEquals(0, $sale->draft);
        foreach ($sale->items as $item) {
            $this->assertEquals(0 - $item->quantity, $item->stock()->first()->quantity);
        }
        $update['draft'] = true;
        $update['date']  = now()->subDays(2)->format('Y-m-d');
        $this->actingAs($this->user)->ajax()->put($this->route . $sale->id, $update)->assertOk();

        // update
        $sale = $sale->refresh();
        $this->assertEquals(1, $sale->draft);
        $this->assertEquals($update['date'], $sale->date->toDateString());
        foreach ($sale->items as $item) {
            $item->refresh();
            $this->assertEquals(0, $item->stock()->first()->quantity);
        }

        $this->actingAs($this->user)->ajax()->delete($this->route . $sale->id)->assertOk();
        $this->assertModelMissing($sale);
        $this->assertEquals(0, SaleItem::count());
        $this->assertEquals(0, Costing::count());
        $this->assertEquals(0, OverSelling::count());
        $items = Item::with('stock')->get();
        foreach ($items as $item) {
            $this->assertEquals(0, $item->stock()->where('location_id', $location->id)->first()?->quantity);
        }
    }
}
