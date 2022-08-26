<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\MainCategoriesController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\ProductController;
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
            
            ###################################### Category routes ##############################################

            Route::group(['prefix' => 'main_categories'], function () {
                Route::get('/', [MainCategoriesController::class,'index'])->name('admin.maincategories');
                Route::get('create', [MainCategoriesController::class,'create'])->name('admin.maincategories.create');
                Route::post('store', [MainCategoriesController::class,'store'])->name('admin.maincategories.store');
                Route::get('edit/{id}', [MainCategoriesController::class,'edit'])->name('admin.maincategories.edit');
                Route::put('update/{id}', [MainCategoriesController::class,'update'])->name('admin.maincategories.update');
                Route::get('delete/{id}', [MainCategoriesController::class,'destroy'])->name('admin.maincategories.delete');
                Route::put('changeStatus/{id}', [MainCategoriesController::class,'changeStatus'])->name('admin.maincategories.status');
            });

            ###################################### End category routes ##########################################


            ###################################### brands routes ################################################

            Route::group(['prefix' => 'brands'], function () {
                Route::get('/', [BrandsController::class,'index'])->name('admin.brands');
                Route::get('create', [BrandsController::class,'create'])->name('admin.brands.create');
                Route::post('store', [BrandsController::class,'store'])->name('admin.brands.store');
                Route::get('edit/{id}', [BrandsController::class,'edit'])->name('admin.brands.edit');
                Route::post('update/{id}', [BrandsController::class,'update'])->name('admin.brands.update');
                Route::get('delete/{id}', [BrandsController::class,'destroy'])->name('admin.brands.delete');
            
            });

            ###################################### End category routes ##########################################


              ###################################### tags routes ################################################

              Route::group(['prefix' => 'tags'], function () {
                Route::get('/',  [TagsController::class,'index'])->name('admin.tags');
                Route::get('create',  [TagsController::class,'create'])->name('admin.tags.create');
                Route::post('store',  [TagsController::class,'store'])->name('admin.tags.store');
                Route::get('edit/{id}', [TagsController::class,'edit'])->name('admin.tags.edit');
                Route::post('update/{id}', [TagsController::class,'update'])->name('admin.tags.update');
                Route::get('delete/{id}',  [TagsController::class,'destroy'])->name('admin.tags.delete');
            });

            ###################################### End tags routes ##########################################

              ###################################### products routes ################################################

              Route::group(['prefix' => 'products'], function () {
                Route::get('/',  [ProductController::class,'index'])->name('admin.products');
                Route::get('create',  [ProductController::class,'create'])->name('admin.products.general.create');
                Route::post('store',  [ProductController::class,'store'])->name('admin.products.general.store');
                Route::get('edit/{id}', [ProductController::class,'edit'])->name('admin.products.edit');
                Route::post('update/{id}', [ProductController::class,'update'])->name('admin.products.update');
                Route::get('delete/{id}',  [ProductController::class,'destroy'])->name('admin.products.delete');
            });

            ###################################### End products routes ##########################################


        }); 
 
        Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin', 'prefix' => 'admin'], function()
        {
            Route::get('login', [LoginController::class, 'login'])->name('admin.login');
            Route::post('login', [LoginController::class, 'postLogin'])->name('admin.post.login');
        });
});

