<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Customer\CustomerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [App\Http\Controllers\Customer\CustomerController::class, 'index'])->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/kategori', [App\Http\Controllers\Customer\CustomerController::class, 'categories'])->name('categories');
Route::get('/kategori/{category_slug}', [App\Http\Controllers\Customer\CustomerController::class, 'products'])->name('products');
Route::get('/kategori/{category_slug}/{product_slug}', [App\Http\Controllers\Customer\CustomerController::class, 'productView'])->name('product.view');

Route::middleware(['auth'])->group(function () {
Route::get('/favoriler', [App\Http\Controllers\Customer\WishlistController::class, 'index'])->name('wishlist');

});

Route::group(["middleware" => ["auth", "isAdmin"],  "prefix" => "admin", "as" => "admin."], function () {

    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::group(["prefix" => "category", "as" => "category.", "namespace" => "App\Http\Controllers\Admin"], function () {
        Route::get('/', 'CategoryController@index')->name('index');
        Route::get('/create', 'CategoryController@create')->name('create');
        Route::post('/store', 'CategoryController@store')->name('store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('edit');
        Route::post('/update/{id}', 'CategoryController@update')->name('update');
        Route::get('/delete/{id}', 'CategoryController@delete')->name('delete');
    });
    Route::group(["prefix" => "brand", "as" => "brand.", "namespace" => "App\Http\Controllers\Admin"], function () {
        Route::get('/', 'BrandController@index')->name('index');
        Route::get('/create', 'BrandController@create')->name('create');
        Route::post('/store', 'BrandController@store')->name('store');
        Route::get('/edit/{id}', 'BrandController@edit')->name('edit');
        Route::post('/update/{id}', 'BrandController@update')->name('update');
        Route::get('/delete/{id}', 'BrandController@delete')->name('delete');
    });
    Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class)->name('brands.index');

    Route::group(["prefix" => "product", "as" => "product.", "namespace" => "App\Http\Controllers\Admin"], function () {
        Route::get('/', 'ProductController@index')->name('index');
        Route::get('/create', 'ProductController@create')->name('create');
        Route::post('/store', 'ProductController@store')->name('store');
        Route::get('/edit/{id}', 'ProductController@edit')->name('edit');
        Route::post('/update/{id}', 'ProductController@update')->name('update');
        Route::get('/delete/{id}', 'ProductController@delete')->name('delete');
        Route::get("/product-images/{id}", "ProductController@imageDelete")->name("images.delete");
        Route::post("/product-images/{id}", "ProductController@imageStore")->name("images.store");
        Route::post("/product-color/{prod_color_id}", "ProductController@updateProdColorQty");
        Route::get("/product-color/{prod_color_id}/delete", "ProductController@deleteProdColorQty");


    });
    Route::group(["prefix" => "color", "as" => "color.", "namespace" => "App\Http\Controllers\Admin"], function () {
        Route::get('/', 'ColorController@index')->name('index');
        Route::get('/create', 'ColorController@create')->name('create');
        Route::post('/store', 'ColorController@store')->name('store');
        Route::get('/edit/{id}', 'ColorController@edit')->name('edit');
        Route::post('/update/{id}', 'ColorController@update')->name('update');
        Route::get('/delete/{id}', 'ColorController@delete')->name('delete');
    });

    Route::group(["prefix" => "slider", "as" => "slider.", "namespace" => "App\Http\Controllers\Admin"], function () {
        Route::get('/', 'SliderController@index')->name('index');
        Route::get('/create', 'SliderController@create')->name('create');
        Route::post('/store', 'SliderController@store')->name('store');
        Route::get('/edit/{id}', 'SliderController@edit')->name('edit');
        Route::post('/update/{id}', 'SliderController@update')->name('update');
        Route::get('/delete/{id}', 'SliderController@delete')->name('delete');
    });
});
