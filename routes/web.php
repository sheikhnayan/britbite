<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\TeamController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\FoodCategoryController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\BlogController;

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

Route::prefix('/')->group(function () {
    Route::get('/',[FrontController::class,'index'])->name('index');
    Route::get('/about',[FrontController::class,'about'])->name('about');
    Route::get('/blog',[FrontController::class,'blog'])->name('blog');
    Route::get('/booking',[FrontController::class,'booking'])->name('booking');
    Route::get('/contact',[FrontController::class,'contact'])->name('contact');
    Route::get('/feature',[FrontController::class,'feature'])->name('feature');
    Route::get('/menu',[FrontController::class,'menu'])->name('menu');
    Route::get('/single/{id}',[FrontController::class,'single'])->name('single');
    Route::get('/page{title}',[FrontController::class,'page'])->name('page');
    Route::get('/team',[FrontController::class,'team'])->name('team');
});

Route::prefix('/admins')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/',[AdminController::class,'index'])->name('index');

    Route::prefix('/team')->name('team.')->group(function () {
        Route::get('/',[TeamController::class,'index'])->name('index');
        Route::get('/add',[TeamController::class,'create'])->name('add');
        Route::post('/store',[TeamController::class,'store'])->name('store');
        Route::get('/edit/{id}',[TeamController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[TeamController::class,'update'])->name('update');
        Route::get('/delete/{id}',[TeamController::class,'destroy'])->name('delete');
    });

    Route::prefix('/banner')->name('banner.')->group(function () {
        Route::get('/',[BannerController::class,'index'])->name('index');
        Route::get('/add',[BannerController::class,'create'])->name('add');
        Route::post('/store',[BannerController::class,'store'])->name('store');
        Route::get('/edit/{id}',[BannerController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[BannerController::class,'update'])->name('update');
        Route::get('/delete/{id}',[BannerController::class,'destroy'])->name('delete');
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

    Route::prefix('/menu')->name('menu.')->group(function () {
        Route::get('/',[MenuController::class,'index'])->name('index');
        Route::get('/add',[MenuController::class,'create'])->name('add');
        Route::post('/store',[MenuController::class,'store'])->name('store');
        Route::get('/edit/{id}',[MenuController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[MenuController::class,'update'])->name('update');
        Route::get('/delete/{id}',[MenuController::class,'destroy'])->name('delete');
    });

    Route::prefix('/page')->name('page.')->group(function () {
        Route::get('/',[PageController::class,'index'])->name('index');
        Route::get('/add',[PageController::class,'create'])->name('add');
        Route::post('/store',[PageController::class,'store'])->name('store');
        Route::get('/edit/{id}',[PageController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[PageController::class,'update'])->name('update');
        Route::get('/delete/{id}',[PageController::class,'destroy'])->name('delete');
    });

    Route::prefix('/blog')->name('blog.')->group(function () {
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
