<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ProfileController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Admin Routes
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
        Route::group(['namespace' => 'Admin' , 'middleware' => 'auth:admin','prefix' => 'admin'], function()
        {
            Route::get('/',[DashboardController::class, 'index'])->name('admin.dashboard');
            Route::get('/logout',[LoginController::class, 'logout'])->name('admin.logout');

            Route::group(['prefix'=>'settings'],function()
            {
                Route::get('shipping-methods/{type}',[SettingsController::class,'editShippingMethods'])->name('admin.dashboard.edit.shipping.methods');
                Route::post('shipping-methods/{id}',[SettingsController::class,'updateShippingMethods'])->name('admin.dashboard.update.shipping.methods');
            });

            Route::group(['prefix' => 'profile'], function () {
                Route::get('edit', [ProfileController::class,'editProfile'])->name('edit.profile');
                Route::put('update', [ProfileController::class,'updateprofile'])->name('update.profile');
            });
            
        }); 
 
        Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin', 'prefix' => 'admin'], function()
        {
            Route::get('login', [LoginController::class, 'login'])->name('admin.login');
            Route::post('login', [LoginController::class, 'postLogin'])->name('admin.post.login');
        });
});

