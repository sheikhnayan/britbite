<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $plans = [

            [

                'name' => 'Basic',

                'slug' => 'basic',

                'stripe_plan' => 'price_1OXNqPKosBOA6s1UiJ3BebyM',

                'price' => 10,

                'description' => 'Basic'

            ],

            [

                'name' => 'Premium',

                'slug' => 'premium',

                'stripe_plan' => 'price_1OXNqvKosBOA6s1U3boLTgcm',

                'price' => 15,

                'description' => 'Premium'

            ]

        ];



        foreach ($plans as $plan) {

            Plan::create($plan);

        }

    }
}
