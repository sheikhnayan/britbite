<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Auth;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Page::where('user_id',Auth::user()->id)->get();

        return view('admin.page.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $add = new Page;
        $add->title = $request->title;
        $add->content = $request->content;
        $add->user_id = Auth::user()->id;
        $add->save();

        return redirect(route('admin.page.index'));
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
        $data = Page::find($id);

        return view('admin.page.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $add = Page::find($id);
        $add->title = $request->title;
        $add->content = $request->content;
        $add->user_id = Auth::user()->id;
        $add->update();

        return redirect(route('admin.page.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Page::where('id',$id)->delete();

        return redirect(route('admin.page.index'));
    }
}
