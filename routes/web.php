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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/sach','App\Http\Controllers\LayoutController@sach');
Route::get('/sach/theloai/{id}','App\Http\Controllers\LayoutController@theloai');
Route::get('/sach/chitiet/{id}','App\Http\Controllers\BookController@chitiet');
Route::match(['get', 'post'], '/bookview', 'App\Http\Controllers\BookController@bookview')->name("bookview");