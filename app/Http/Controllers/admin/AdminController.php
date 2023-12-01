<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        $team = Team::where('user_id',Auth::user()->id)->get();

        return view('admin.index',compact('team'));
    }
}
