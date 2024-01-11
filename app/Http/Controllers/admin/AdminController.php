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
        if (Auth::user()->type == 'admin') {
            # code...
            if (Auth::user()->stripe_id == null) {
                # code...
                return redirect('/plans');
            }
        }
        $team = Team::where('user_id',Auth::user()->id)->get();

        return view('admin.index',compact('team'));
    }
}
