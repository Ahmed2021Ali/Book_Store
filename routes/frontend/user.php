<?php

use App\Http\Controllers\frontend\CardController;
use App\Http\Controllers\frontend\FavController;
use App\Http\Controllers\frontend\HomepageController;
use App\Http\Controllers\frontend\OrderController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::controller(HomepageController::class)->prefix('HomePage')->group(function () {
    Route::get('/', 'index')->name('homepage');
    Route::get('/books/all', 'showAllBooks')->name('books.all');
    Route::get('/books/category/{encryptedId}', 'booksCategory')->name('books.category');
    Route::get('/book/{encryptedId}', 'book')->name('book');
    Route::get('/branches', 'branches')->name('branches');
    Route::view('about_us', 'frontend.about_us.index')->name('about_us');
    Route::view('contact_us', 'frontend.contact_us.index')->name('contact_us');
    Route::view('refund_policy', 'frontend.refund-policy.index')->name('refund_policy');
    Route::post('/search', 'search')->name('search');
});

Route::middleware(['auth'])->prefix('HomePage')->group(function () {

    Route::view('account_details', 'frontend.account_details.index')->name('account_details');
    Route::PUT('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::controller(CardController::class)->prefix('card')->as('card.')->group(function () {
        Route::post('/store/{book}', 'store')->name('store');
        Route::delete('/delete/{card}', 'delete')->name('delete');
    });

    Route::controller(OrderController::class)->prefix('order')->as('order.')->group(function () {
        Route::post('status/payment', 'statusPayment')->name('status.payment');
        Route::get('create', 'create')->name('create');
        Route::get('details/{address_id}', 'detailsOrder')->name('details');
        Route::get('oder/store{status}', 'store')->name('store');
        Route::get('user/show', 'showOrderUser')->name('show');
        Route::delete('delete/{order}', 'deleteOrder')->name('delete');
        Route::view('search/page', 'frontend.track-order.index')->name('search.page');
        Route::post('search', 'searchOrder')->name('search');
        Route::get('all', 'showAllOrder')->name('all');
    });

    Route::controller(FavController::class)->prefix('Favorite/books')->as('fav.')->group(function () {
        Route::get('/store/{book}', 'store')->name('store');
        Route::get('/show', 'show')->name('show');
        Route::delete('/destroy/{fav}', 'delete')->name('delete');
    });

    Route::controller(PaypalController::class)->prefix('payment')->as('payment.')->group(function () {
        Route::get('/', 'payment')->name('index');
        Route::get('/cancel', 'cancel')->name('cancel');
        Route::get('/success', 'success')->name('success');
    });

    Route::resource('/address', \App\Http\Controllers\frontend\AddressController::class)->except('show', 'index');
});


