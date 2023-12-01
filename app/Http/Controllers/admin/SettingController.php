<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;
use Auth;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Setting::where('user_id',Auth::user()->id)->get();

        return view('admin.setting.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.setting.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $image = $request->logo->store('public/logo');

        $path = str_replace('public','storage',$image );


        $add = new Setting;
        $add->logo = $path;
        $add->name = $request->name;
        $add->email = $request->email;
        $add->phone = $request->phone;
        $add->address = $request->address;
        $add->content = $request->content;
        $add->video = $request->video;
        $add->facebook = $request->facebook;
        $add->linkedin = $request->linkedin;
        $add->instagram = $request->instagram;
        $add->twitter = $request->twitter;
        $add->youtube = $request->youtube;
        $add->user_id = Auth::user()->id;
        $add->save();

        return redirect(route('admin.setting.index'));
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
        $data = Setting::find($id);

        return view('admin.setting.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (isset($request->logo)) {

        $image = $request->logo->store('public/logo');

        $path = str_replace('public','storage',$image );

        }


        $add = Setting::find($id);
        if (isset($request->logo)) {

        $add->logo = $path;

        }
        $add->name = $request->name;
        $add->email = $request->email;
        $add->phone = $request->phone;
        $add->address = $request->address;
        $add->content = $request->content;
        $add->video = $request->video;
        $add->facebook = $request->facebook;
        $add->linkedin = $request->linkedin;
        $add->instagram = $request->instagram;
        $add->twitter = $request->twitter;
        $add->youtube = $request->youtube;
        $add->user_id = Auth::user()->id;
        $add->update();

        return redirect(route('admin.setting.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Setting::where('id',$id)->delete();

        return redirect(route('admin.setting.index'));
    }
}

