<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Banner;
use App\Models\Page;
use App\Models\Blog;
use App\Models\FoodCategory;
use App\Models\Menu;
use App\Models\Setting;

class FrontController extends Controller
{
    public function index($slug)
    {

        $user = Setting::where('slug',$slug)->first();


        $user = $user->user;

        $team = Team::where('user_id',$user->id)->get();

        $banner = Banner::where('user_id',$user->id)->get();

        $food_category = FoodCategory::where('user_id',$user->id)->get();

        return view('front.index',compact('team','banner','food_category','slug'));
    }

    public function about($slug)
    {
        $setting = Setting::where('slug',$slug)->first();

        $user = $setting->user;

        $food_category = FoodCategory::where('user_id',$user->id)->get();

        return view('front.about',compact('slug','food_category','setting'));
    }

    public function blog($slug)
    {
        $user = Setting::where('slug',$slug)->first();


        $user = $user->user;

        return view('front.blog',compact('slug'));
    }

    public function booking($slug)
    {
        $setting = Setting::where('slug',$slug)->first();


        $user = $setting->user;

        return view('front.booking',compact('slug','setting'));
    }

    public function contact($slug)
    {
        $setting = Setting::where('slug',$slug)->first();


        $user = $setting->user;

        return view('front.contact',compact('slug','setting'));
    }

    public function feature($slug)
    {
        $user = Setting::where('slug',$slug)->first();


        $user = $user->user;

        return view('front.feature',compact('slug'));
    }

    public function menu($slug)
    {
        $user = Setting::where('slug',$slug)->first();


        $user = $user->user;

        $category = FoodCategory::where('user_id',$user->id)->get();

        $menu = Menu::where('user_id',$user->id)->get();

        return view('front.menu',compact('slug','menu','category'));
    }

    public function single($slug,$id)
    {
        $user = Setting::where('slug',$slug)->first();


        $user = $user->user;

        $data = Blog::where('user_id',$user->id)->get();

        return view('front.single',compact('data','slug'));
    }

    public function page($slug,$title)
    {
        $user = Setting::where('slug',$slug)->first();


        $user = $user->user;

        $data = Page::where('title',$title)->first();

        return view('front.page',compact('data','slug'));
    }

    public function team($slug)
    {
        $user = Setting::where('slug',$slug)->first();


        $user = $user->user;

        $data = Team::where('user_id',$user->id)->get();;

        return view('front.team',compact('data','slug'));
    }
}
