<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(base_path('routes/admin.php'));
Route::prefix('user')->group(base_path('routes/user.php'));

Auth::routes();

Route::get('user-login', 'HomeController@index')->name('login');

Route::get('/', function () {
    return view('public.public_master');
});

Route::get('product-list', 'ProductController@geltAllProduct');
Route::get('product-sidebar-info', 'ProductController@sidebarInfo');
Route::get('product-filter/{data}', 'ProductController@productFilter');

Route::group(['prefix'=>'cart'], function(){
    Route::post('add-to-cart', 'CartController@addToCart')->name('addToCart');
    Route::get('cart-product-list', 'CartController@productList')->name('productList');
});


Route::get('/{path}', function () {
    return view('public.public_master');
});

Route::get('/{path}/{id}', function () {
    return view('admin.public_master');
});
