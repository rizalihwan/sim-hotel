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
    // ganti password
    Route::prefix('account')->name('password.')->group(function(){
        Route::get('/password', 'UserController@changePassword')->name('edit');
        Route::patch('/password', 'UserController@updatePassword')->name('edit');
    });
});