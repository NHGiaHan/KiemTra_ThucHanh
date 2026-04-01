<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\LayoutController@sach');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/sach','App\Http\Controllers\LayoutController@sach');
Route::get('/sach/theloai/{id}','App\Http\Controllers\LayoutController@theloai');
Route::get('/sach/chitiet/{id}','App\Http\Controllers\BookController@chitiet');
// Thêm dòng này vào cuối file web.php
Route::get('/profile', function () {
    return "Trang thông tin cá nhân";
})->middleware(['auth'])->name('account');
Route::get('/order','App\Http\Controllers\BookController@order')->name('order');
Route::post('/cart/add', 'App\Http\Controllers\BookController@cartadd')->name('cartadd');


Route::post('/cart/delete', 'App\Http\Controllers\BookController@cartdelete')->name('cartdelete');

Route::post('/order/create', 'App\Http\Controllers\BookController@ordercreate')
    ->middleware(['auth'])
    ->name('ordercreate');

Route::get('/bookview', 'App\Http\Controllers\BookController@bookview')->name('bookview');