<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');
Auth::routes();
// general option
Route::middleware('auth')->group(function(){
    // dashboard
    Route::get('/dashboard', 'HomeController@index')->name('home');
    // profil user
    Route::prefix('profile')->name('profile.')->group(function(){
        Route::get('/setting', 'UserController@edit')->name('setting');
        Route::patch('/setting/update', 'UserController@update')->name('update');
    });
    // change password
    Route::prefix('account')->name('password.')->group(function(){
        Route::get('/password', 'UserController@changePassword')->name('edit');
        Route::patch('/password', 'UserController@updatePassword')->name('edit');
    });
});
// admin access
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->namespace('Admin')->group(function(){
    // management account
    Route::prefix('account')->name('account.')->group(function(){
        // per view & role
        Route::get('/admin', 'AccountController@admin_index_account')->name('admin');
        Route::get('/customer', 'AccountController@costumer_index_account')->name('customer');
        Route::get('/manager', 'AccountController@boss_index_account')->name('boss');
        // edit per view management account
        Route::get('/admin_edit/{id}/edit', 'AccountController@edit_admin')->name('editadmin');
        Route::get('/customer_edit/{id}/edit', 'AccountController@edit_customer')->name('editcustomer');
        Route::get('/boss_edit/{id}/edit', 'AccountController@edit_boss')->name('editboss');
        // register account
        Route::resource('register', 'AccountController')->except(['edit_admin', 'edit_customer', 'edit_boss', 'admin_index_account', 'costumer_index_account', 'boss_index_account', 'index_latest', 'index_ascending', 'index_descending']);
        // View based on
        Route::get('/latest', 'AccountController@index_latest')->name('latest');
        Route::get('/ascending', 'AccountController@index_ascending')->name('asc');
        Route::get('/descending', 'AccountController@index_descending')->name('desc');
    });
    // category
    Route::resource('category', 'CategoryController');
    // room
    Route::resource('room', 'RoomController')->except('search');
    Route::get('/search/room', 'RoomController@search')->name('searchroom');
    // customer
    Route::resource('customer', 'CustomerController');
    // booking
    Route::resource('booking', 'BookingController')->except(['already_paid']);
    Route::get('/already_paid', 'BookingController@already_paid')->name('booking.already_paid');
    Route::get('/not_yet_paid', 'BookingController@not_yet_paid')->name('booking.not_paid');
    // payment
    Route::prefix('payment')->name('payment.')->group(function(){
        Route::get('/', 'PaymentController@index')->name('index');
        Route::get('/pay/{id}', 'PaymentController@pay')->name('pay');
        Route::patch('/payment/success/{id}', 'PaymentController@payment_success')->name('success');
    });
    // report management
    Route::prefix('report')->name('report.')->group(function(){
        Route::get('/finance', 'ReportController@finance')->name('finance');
    });
});    

// customer access
Route::prefix('customer')->name('customer.')->middleware(['auth', 'role:customer'])->namespace('Customer')->group(function(){
    // survey room
    Route::get('/survey/room', 'RoomSurveyController@index')->name('survey');
});   
