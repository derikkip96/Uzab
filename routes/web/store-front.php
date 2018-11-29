<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'Storefront'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('products','ProductController')->only(['index','show']);
    Route::resource('brands','BrandController')->only(['index','show']);
    Route::resource('categories','CategoryController')->only(['index','show']);
    Route::get('products/brand','BrandController@productBrand')->name('product.brand');
    Route::get('products/category','ProductController@productCat')->name('product.category');
    Route::get('/checkout','ShopController@checkout');
    Route::post('/cartAdd/{id}','CartController@add')->name('cart.add');
    Route::post('/cartRemove','CartController@remove')->name('cart.remove');
    Route::get('/cart','CartController@index')->name('cart.index');
    Route::post('/cartAddQty','CartController@cartAddQty')->name('cart.add.qty');
});
