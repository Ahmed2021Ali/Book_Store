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
    Route::post('/AddCard/{id}', [CardController::class, 'addCard'])->name('card.add');
    Route::delete('/destroyCard/{card}', [CardController::class, 'destroyCard'])->name('card.destroy');

    Route::controller(OrderController::class)->as('order.')->group(function () {

        Route::get('order/create', 'create')->name('create');
        Route::get('order/store{status}', 'store')->name('store');
        Route::post('order/status/payment', 'status_payment')->name('status_payment');

        Route::get('order/details', 'details_order')->name('details');
        Route::get('order/show', 'show_order_user')->name('show');
        Route::delete('order/destroy/{id}', 'delete_order_for_user')->name('destroy');
        Route::get('order/search_page', 'search_page')->name('search_page');
        Route::get('order/search', 'search_order')->name('search');
    });

    Route::controller(FavController::class)->prefix('Favorite/books')->as('fav.')->group(function () {
        Route::get('/store/{book}', 'store')->name('store');
        Route::get('/show', 'show')->name('show');
        Route::delete('/destroy/{fav}', 'delete')->name('delete');
    });

    Route::controller(PaypalController::class)->as('payment.')->group(function () {
        Route::get('payment', 'payment')->name('index');
        Route::get('payment/cancel', 'cancel')->name('cancel');
        Route::get('payment/success', 'success')->name('success');
    });

    Route::resource('/address', \App\Http\Controllers\frontend\AddressController::class)->except('show', 'index');

});


