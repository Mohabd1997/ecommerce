<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| site Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],function()
    {

        Route::group(['namespace' => 'Site', 'middleware' => 'auth'], function()
        {
          
        });

        Route::group(['namespace' => 'Site', 'middleware' => 'guest'], function()
        {
            // Route::get('login', [LoginController::class, 'login'])->name('login');
            // Route::post('login', [LoginController::class, 'postLogin'])->name('post.login');
        });
});




