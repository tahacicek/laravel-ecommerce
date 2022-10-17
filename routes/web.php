<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(["middleware" => ["auth", "isAdmin"],  "prefix" => "admin", "as" => "admin."], function () {

    Route::get('dashboard', [DashboardController::class, 'index']);
    //Category Routes

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
    });
});
