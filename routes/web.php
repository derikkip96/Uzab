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
//load manage routes

require __DIR__.'/web/manage.php';

//load store-front routes

require __DIR__.'/web/store-front.php';

Route::get('/','HomeController@showLandingPage')->name('landing-page');