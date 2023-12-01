<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Team;
use Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Team::where('user_id',Auth::user()->id)->get();

        return view('admin.team.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (isset($request->image)) {
            # code...
            $image = $request->image->store('public/team');

            $path = str_replace('public','storage',$image );
        }

        $add = new Team;
        $add->name = $request->name;
        $add->position = $request->position;
        if (isset($request->image)) {
            # code...
            $add->image = $path;
        }
        $add->facebook = $request->facebook;
        $add->twitter = $request->twitter;
        $add->linkedin = $request->linkedin;
        $add->instagram = $request->instagram;
        $add->user_id = Auth::user()->id;
        $add->save();

        return redirect(route('admin.team.index'));

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
        $data = Team::find($id);

        return view('admin.team.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (isset($request->image)) {
            # code...
            $image = $request->image->store('public/team');

            $path = str_replace('public','storage',$image );
        }

        $add = Team::find($id);
        $add->name = $request->name;
        $add->position = $request->position;
        if (isset($request->image)) {
            # code...
            $add->image = $path;
        }
        $add->facebook = $request->facebook;
        $add->twitter = $request->twitter;
        $add->linkedin = $request->linkedin;
        $add->instagram = $request->instagram;
        $add->user_id = Auth::user()->id;
        $add->update();

        return redirect(route('admin.team.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Team::where('id',$id)->delete();

        return redirect(route('admin.team.index'));
    }
}
