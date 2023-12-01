<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Banner;
use App\Models\Page;
use App\Models\Blog;
use App\Models\FoodCategory;

class FrontController extends Controller
{
    public function index()
    {
        $team = Team::all();

        $banner = Banner::all();

        $food_category = FoodCategory::all();

        return view('front.index',compact('team','banner','food_category'));
    }

    public function about()
    {
        return view('front.about');
    }

    public function blog()
    {
        return view('front.blog');
    }

    public function booking()
    {
        return view('front.booking');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function feature()
    {
        return view('front.feature');
    }

    public function menu()
    {
        return view('front.menu');
    }

    public function single($id)
    {
        $data = Blog::find($id);

        return view('front.single',compact('data'));
    }

    public function page($title)
    {
        $data = Page::where('title',$title)->first();

        return view('front.page',compact('data'));
    }

    public function team()
    {
        $data = Team::all();

        return view('front.team',compact('data'));
    }
}
