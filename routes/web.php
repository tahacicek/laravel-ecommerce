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

Route::group(["middleware" => ["auth", "isAdmin"],  "prefix" => "admin", "as" => "admin.", "namespace" => "Admin"], function() {

    Route::get('dashboard', [DashboardController::class, 'index']);
    //Category Routes

    Route::group(["prefix" => "category", "as" => "category."], function () {
        Route::get('/', 'CategoryController@index')->name('index');
        Route::get('/create', 'CategoryController@create')->name('create');
        Route::post('category/store', 'CategoryController@store')->name('store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('edit');
        Route::post('/update/{id}', 'CategoryController@update')->name('update');
        Route::get('/delete/{id}', 'CategoryController@delete')->name('delete');
    });


    // Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    // Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    // Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    // Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    // Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    // Route::get('category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    // Route::get('category/status/{id}', [CategoryController::class, 'changeStatus'])->name('category.status');




});
