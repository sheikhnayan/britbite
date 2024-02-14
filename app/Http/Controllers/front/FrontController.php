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
use App\Models\FoodAttribute;
use App\Models\Setting;
use Session;

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
        $setting = Setting::where('slug',$slug)->first();


        $user = $setting->user;

        $category = FoodCategory::where('user_id',$user->id)->get();

        $menu = Menu::where('user_id',$user->id)->get();

        return view('front.menu',compact('slug','menu','category','setting'));
    }

    public function cart($id)
    {
        $data = Menu::with('attribute')->find($id);

        return $data;
    }

    public function add_to_cart(Request $request)
    {
        $item = Menu::findOrFail($request->menu_id);

        if ($item->user->offer) {
            # code...
            if ($item->user->offer->status == 1) {
                # code...
                $price = ($item->price/100)*$item->user->offer->percentage;
            } else {
                # code...
                $price = $item->price;
            }

        } else {
            # code...
            $price = $item->price;
        }

        if (isset($request->attr)) {
            # code...
            $attr = FoodAttribute::find($request->attr);
        }else {
            $attr = null;
        }


        $cart = session()->get('cart', []);



        if(isset($cart[$request->menu_id])) {

            $cart[$request->menu_id]['quantity']++;
            $cart[$request->menu_id]['price'] = $cart[$request->menu_id]['price'] + $cart[$request->menu_id]['price'];

        } else {

            $cart[$request->menu_id] = [

                "name" => $item->name,

                "data" => $item,

                "quantity" => 1,

                "price" => $price,

                "attr" => $attr,

            ];

        }



        session()->put('cart', $cart);

        return redirect()->back();
    }


    public function remove_from_cart($id)
    {

            $cart = session()->get('cart');

            if(isset($cart[$id])) {

                unset($cart[$id]);

                session()->put('cart', $cart);

            }

            return redirect()->back();


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
