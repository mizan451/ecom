<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {

    Route::get('user-dashboard', 'HomeController@index');
    Route::get('/', 'HomeController@authUser');

    Route::resource('wishlist', 'WishlistController');
    
});




Route::get('/{path}', 'HomeController@index');
