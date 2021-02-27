<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');
Auth::routes();

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
    // admin 
    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){
        // management account
        Route::prefix('account')->name('account.')->group(function(){
            // per view & role
            Route::get('/admin', 'AccountController@admin_index_account')->name('admin');
            Route::get('/customer', 'AccountController@costumer_index_account')->name('customer');
            Route::get('/boss', 'AccountController@boss_index_account')->name('boss');
            // register account
            Route::resource('register', 'AccountController')->except(['admin_index_account', 'costumer_index_account', 'boss_index_account']);
        });
    });
});