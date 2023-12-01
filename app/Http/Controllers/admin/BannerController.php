<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Banner;
use Auth;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Banner::where('user_id',Auth::user()->id)->get();

        return view('admin.banner.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->image->store('public/banenr');

        $path = str_replace('public','storage',$image );

        $add = new Banner;
        $add->banner = $path;
        $add->title = $request->title;
        $add->sub_title = $request->sub_title;
        $add->status = $request->status;
        $add->user_id = Auth::user()->id;
        $add->save();

        return redirect(route('admin.banner.index'));
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
        $data = Banner::find($id);

        return view('admin.banner.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (isset($request->image)) {
            # code...
            $image = $request->image->store('public/banner');

            $path = str_replace('public','storage',$image );
        }

        $add = Banner::find($id);
        if (isset($request->image)) {
            $add->banner = $path;
        }
        $add->title = $request->title;
        $add->sub_title = $request->sub_title;
        $add->status = $request->status;
        $add->user_id = Auth::user()->id;
        $add->update();

        return redirect(route('admin.banner.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Banner::where('id',$id)->delete();

        return redirect(route('admin.banner.index'));
    }
}
