<?php


use App\Http\Controllers\frontend\CardController;
use App\Http\Controllers\frontend\FavController;
use App\Http\Controllers\frontend\HomepageController;
use App\Http\Controllers\frontend\OrderController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::controller(HomepageController::class)->prefix('HomePage')->group(function(){

        Route::get('/','index')->name('homepage');
        Route::get('/Show_all_Books','Show_all_Books')->name('Show_all_Books');
        Route::get('/ShowBooks/{encryptedId}','show_book')->name('show_book');
        Route::get('/SingleBooks/{encryptedId}','single_book')->name('single_book');
        Route::get('/branches','branches')->name('branches');
        Route::get('/about_us','about_us')->name('about_us');
        Route::get('/contact_us','contact_us')->name('contact_us');
        Route::get('/refund_policy','refund_policy')->name('refund_policy');
        Route::post('/search','search')->name('search');
});

Route::middleware(['auth'])->prefix('HomePage')->group(function () {

    Route::get('/account_details',[HomepageController::class,'account_details'])->name('account_details');
    Route::PUT('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/AddCard/{id}',[CardController::class,'AddCard'])->name('Card.add');
    Route::delete('/DestroyCard/{id}',[CardController::class,'DestroyCard'])->name('Card.Destroy');

    Route::controller(OrderController::class)->as('order.')->group(function(){

        Route::get('order/create','create_order')->name('create');
        Route::get('order/store{status}','store_order')->name('store');
        Route::post('order/status/payment','status_payment')->name('status_payment');

        Route::get('order/details','details_order')->name('details');
        Route::get('order/show','show_order_user')->name('show');
        Route::delete('order/destroy/{id}','delete_order_for_user')->name('destroy');
        Route::get('order/search_page','search_page')->name('search_page');
        Route::get('order/search','search_order')->name('search');
    });
    Route::controller(FavController::class)->as('fav.')->group(function(){
        Route::get('fav/store/{id}','store')->name('store');
        Route::get('fav/show','show')->name('show');
        Route::delete('fav/destroy/{id}','destroy')->name('destroy');
    });
    Route::controller(PaypalController::class)->as('payment.')->group(function(){
        Route::get('payment','payment')->name('index');
        Route::get('payment/cancel','cancel')->name('cancel');
        Route::get('payment/success','success')->name('success');
        });
    Route::resource('/address', \App\Http\Controllers\frontend\AddressOrederController::class)->except('show','index');

});


