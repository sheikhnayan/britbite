<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\FoodCategory;
use Auth;

class FoodCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = FoodCategory::where('user_id',Auth::user()->id)->get();

        return view('admin.food-category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.food-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->image->store('public/food-category');

        $path = str_replace('public','storage',$image );

        $add = new FoodCategory;
        $add->image = $path;
        $add->name = $request->name;
        $add->description = $request->description;
        $add->featured = $request->featured;
        $add->user_id = Auth::user()->id;
        $add->save();

        return redirect(route('admin.food-category.index'));
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
        $data = FoodCategory::find($id);

        return view('admin.food-category.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (isset($request->image)) {
            # code...
            $image = $request->image->store('public/food-category');

            $path = str_replace('public','storage',$image );
        }

        $add = FoodCategory::find($id);
        if ($request->image) {
            # code...
            $add->image = $path;
        }
        $add->name = $request->name;
        $add->description = $request->description;
        $add->featured = $request->featured;
        $add->user_id = Auth::user()->id;
        $add->update();

        return redirect(route('admin.food-category.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = FoodCategory::where('id',$id)->delete();

        return redirect(route('admin.food-category.index'));
    }
}
