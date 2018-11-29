<?php

/*
|--------------------------------------------------------------------------
| Store Management Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'my', 'as' => 'merchant.'], function () {
    Route::group(['prefix' => 'auth'], function () {
        //Registration Routes
        Route::get('register', 'Auth\StoreManagement\RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'Auth\StoreManagement\RegisterController@register')->name('perform.register');

        // Authentication Routes...
        Route::get('login', 'Auth\StoreManagement\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\StoreManagement\LoginController@login')->name('perform.login');
        Route::post('logout', 'Auth\StoreManagement\LoginController@logout')->name('logout');


        // Password Reset Routes...
        Route::get('password/reset', 'Auth\StoreManagement\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'Auth\StoreManagement\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'Auth\StoreManagement\ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'Auth\StoreManagement\ResetPasswordController@reset')->name('perform.password.reset');
    });
    Route::group(['namespace' => 'Manage\Store'], function () {

        // Catalogue
        Route::resource('products', 'ProductsController');
        Route::resource('categories', 'ProductsCategoryController');
        Route::resource('brands', 'BrandsController')->except(['create','show']);
//        Route::resource('tags', 'TagController')->except(['create', 'show']);

    });
});
