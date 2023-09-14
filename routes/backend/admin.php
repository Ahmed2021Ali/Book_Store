<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\FAQController;
use App\Http\Controllers\backend\BookController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\BranchController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\DashbordController;
use App\Http\Controllers\backend\WishListController;


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

Route::middleware(['auth','Check.Type'])->prefix('Dashboard.Admin')->group( function () {

    Route::get('/',[DashbordController::class,'index'])->name('dashbord');

    Route::resource('/slider',SliderController::class)->except('show');

    Route::resource('/banner',BannerController::class)->except('show');

    Route::resource('/book',BookController::class)->except('show');

    Route::resource('/contact',ContactController::class)->except('show');

    Route::resource('/FAQ',FAQController::class)->except('show');

    Route::resource('/category',CategoryController::class);

    Route::resource('/WishList',WishListController::class);  // waiting

    Route::resource('/branch',BranchController::class)->except('show');

});
