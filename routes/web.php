<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\TeamController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\OfferController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\FoodCategoryController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\PlanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware("auth")->group(function () {
    Route::get('plans', [PlanController::class, 'index'])->name("plans.indexs");
    Route::get('plans/{plan}', [PlanController::class, 'show'])->name("plans.show");
    Route::post('subscription', [PlanController::class, 'subscription'])->name("subscription.create");
});

Route::get('/cart/{id}', [FrontController::class,'cart']);
Route::post('/add-to-cart', [FrontController::class,'add_to_cart'])->name('add-to-cart');
Route::get('/remove-from-cart/{id}', [FrontController::class,'remove_from_cart']);

Route::prefix('/')->group(function () {
    Route::get('/home/{slug}',[FrontController::class,'index'])->name('index');
    Route::get('/home/{slug}/about',[FrontController::class,'about'])->name('about');
    Route::get('/home/{slug}/blog',[FrontController::class,'blog'])->name('blog');
    Route::get('/home/{slug}/booking',[FrontController::class,'booking'])->name('booking');
    Route::get('/home/{slug}/contact',[FrontController::class,'contact'])->name('contact');
    Route::get('/home/{slug}/feature',[FrontController::class,'feature'])->name('feature');
    Route::get('/home/{slug}/menu',[FrontController::class,'menu'])->name('menu');
    Route::get('/home/{slug}/single/{id}',[FrontController::class,'single'])->name('single');
    Route::get('/home/{slug}/page{title}',[FrontController::class,'page'])->name('page');
    Route::get('/home/{slug}/team',[FrontController::class,'team'])->name('team');
});

Route::prefix('/admins')->name('admin.')->middleware(['auth','admin'])->group(function () {
    Route::get('/',[AdminController::class,'index'])->name('index');

    Route::prefix('/teams')->name('team.')->group(function () {
        Route::get('/',[TeamController::class,'index'])->name('index');
        Route::get('/add',[TeamController::class,'create'])->name('add');
        Route::post('/store',[TeamController::class,'store'])->name('store');
        Route::get('/edit/{id}',[TeamController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[TeamController::class,'update'])->name('update');
        Route::get('/delete/{id}',[TeamController::class,'destroy'])->name('delete');
    });

    Route::prefix('/plans')->name('plan.')->group(function () {
        Route::get('/',[PlanController::class,'plan_index'])->name('index');
        Route::get('/add',[PlanController::class,'plan_create'])->name('add');
        Route::post('/store',[PlanController::class,'plan_store'])->name('store');
        Route::get('/edit/{id}',[PlanController::class,'plan_edit'])->name('edit');
        Route::post('/update/{id}',[PlanController::class,'plan_update'])->name('update');
        Route::get('/delete/{id}',[PlanController::class,'plan_destroy'])->name('delete');
    });

    Route::prefix('/payment-getaway')->name('payment.')->group(function () {
        Route::get('/',[PlanController::class,'admin_index'])->name('index');
        Route::get('/edit/{id}',[PlanController::class,'admin_edit'])->name('edit');
        Route::post('/update/{id}',[PlanController::class,'admin_update'])->name('update');
    });

    Route::prefix('/banner')->name('banner.')->group(function () {
        Route::get('/',[BannerController::class,'index'])->name('index');
        Route::get('/add',[BannerController::class,'create'])->name('add');
        Route::post('/store',[BannerController::class,'store'])->name('store');
        Route::get('/edit/{id}',[BannerController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[BannerController::class,'update'])->name('update');
        Route::get('/delete/{id}',[BannerController::class,'destroy'])->name('delete');
    });

    Route::prefix('/offer')->name('offer.')->group(function () {
        Route::get('/',[OfferController::class,'index'])->name('index');
        Route::get('/add',[OfferController::class,'create'])->name('add');
        Route::post('/store',[OfferController::class,'store'])->name('store');
        Route::get('/edit/{id}',[OfferController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[OfferController::class,'update'])->name('update');
        Route::get('/delete/{id}',[OfferController::class,'destroy'])->name('delete');
    });

    Route::prefix('/setting')->name('setting.')->group(function () {
        Route::get('/',[SettingController::class,'index'])->name('index');
        Route::get('/add',[SettingController::class,'create'])->name('add');
        Route::post('/store',[SettingController::class,'store'])->name('store');
        Route::get('/edit/{id}',[SettingController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[SettingController::class,'update'])->name('update');
        Route::get('/delete/{id}',[SettingController::class,'destroy'])->name('delete');
    });

    Route::prefix('/food-category')->name('food-category.')->group(function () {
        Route::get('/',[FoodCategoryController::class,'index'])->name('index');
        Route::get('/add',[FoodCategoryController::class,'create'])->name('add');
        Route::post('/store',[FoodCategoryController::class,'store'])->name('store');
        Route::get('/edit/{id}',[FoodCategoryController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[FoodCategoryController::class,'update'])->name('update');
        Route::get('/delete/{id}',[FoodCategoryController::class,'destroy'])->name('delete');
    });

    Route::prefix('/menus')->name('menu.')->group(function () {
        Route::get('/',[MenuController::class,'index'])->name('index');
        Route::get('/add',[MenuController::class,'create'])->name('add');
        Route::post('/store',[MenuController::class,'store'])->name('store');
        Route::get('/edit/{id}',[MenuController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[MenuController::class,'update'])->name('update');
        Route::get('/delete/{id}',[MenuController::class,'destroy'])->name('delete');
    });

    Route::prefix('/pages')->name('page.')->group(function () {
        Route::get('/',[PageController::class,'index'])->name('index');
        Route::get('/add',[PageController::class,'create'])->name('add');
        Route::post('/store',[PageController::class,'store'])->name('store');
        Route::get('/edit/{id}',[PageController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[PageController::class,'update'])->name('update');
        Route::get('/delete/{id}',[PageController::class,'destroy'])->name('delete');
    });

    Route::prefix('/blogs')->name('blog.')->group(function () {
        Route::get('/',[BlogController::class,'index'])->name('index');
        Route::get('/add',[BlogController::class,'create'])->name('add');
        Route::post('/store',[BlogController::class,'store'])->name('store');
        Route::get('/edit/{id}',[BlogController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[BlogController::class,'update'])->name('update');
        Route::get('/delete/{id}',[BlogController::class,'destroy'])->name('delete');
    });

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
