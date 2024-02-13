<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\FoodCategory;
use App\Models\Menu;
use App\Models\FoodAttribute;
use Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Menu::where('user_id',Auth::user()->id)->get();

        return view('admin.menu.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = FoodCategory::where('user_id',Auth::user()->id)->get();

        return view('admin.menu.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->image->store('public/menu');

        $path = str_replace('public','storage',$image );

        $add = new Menu;
        $add->image = $path;
        $add->name = $request->name;
        $add->buy_type = $request->buy_type;
        $add->buy = $request->buy;
        $add->buy_get = $request->buy_get;
        $add->buy_offer = $request->buy_offer;
        $add->description = $request->description;
        $add->food_category_id = $request->food_category_id;
        $add->price = $request->price;
        $add->user_id = Auth::user()->id;
        $add->save();

        if($request->attribute[0]['name'] != null){
            foreach($request->attribute as $attribute)
            {
                $at = new FoodAttribute;
                $at->menu_id = $add->id;
                $at->price = $attribute['price'];
                $at->name = $attribute['name'];
                $at->user_id = Auth::user()->id;
                $at->save();
            }
        }

        return redirect(route('admin.menu.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Menu::find($id);

        $category = FoodCategory::where('user_id',Auth::user()->id)->get();

        return view('admin.menu.edit',compact('data','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (isset($request->image)) {
            # code...
            $image = $request->image->store('public/menu');

            $path = str_replace('public','storage',$image );
        }

        $add = Menu::find($id);
        if (isset($request->image)) {
            $add->image = $path;
        }
        $add->name = $request->name;
        $add->buy_type = $request->buy_type;
        $add->buy = $request->buy;
        $add->buy_get = $request->buy_get;
        $add->buy_offer = $request->buy_offer;
        $add->description = $request->description;
        $add->food_category_id = $request->food_category_id;
        $add->price = $request->price;
        $add->user_id = Auth::user()->id;
        $add->update();

        return redirect(route('admin.menu.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Menu::where('id',$id)->delete();

        return redirect(route('admin.menu.index'));
    }
}
