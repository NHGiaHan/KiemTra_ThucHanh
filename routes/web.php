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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/','App\Http\Controllers\LayoutController@sach');
Route::get('/sach/theloai/{id}','App\Http\Controllers\LayoutController@theloai');
Route::get('/sach/chitiet/{id}','App\Http\Controllers\BookController@chitiet');
Route::get('/test-email', function() {
    return "Cấu hình email đã sẵn sàng. Bạn có thể test gửi mail!";
});
use App\Models\User;

Route::get('/test-reset-email', function() {
    // Lấy user đầu tiên trong database
    $user = User::first();
    
    if (!$user) {
        return "Chưa có user nào! Vui lòng tạo user trước.";
    }
    
    try {
        $user->sendPasswordResetNotification('test-token-' . time());
        return "✅ Đã gửi email test đến: " . $user->email . "<br>Kiểm tra hộp thư để xem nội dung tùy chỉnh!";
    } catch (\Exception $e) {
        return "❌ Lỗi: " . $e->getMessage();
    }
});
Route::get('/check-db', function() {
    try {
        DB::connection()->getPdo();
        $dbName = DB::connection()->getDatabaseName();
        return "✅ Kết nối thành công! Database đang dùng: " . $dbName;
    } catch (\Exception $e) {
        return "❌ Lỗi: " . $e->getMessage();
    }
});

Route::get('/accountpanel','App\Http\Controllers\AccountController@accountpanel')
->middleware('auth')->name("account");
Route::post('/saveaccountinfo','App\Http\Controllers\AccountController@saveaccountinfo')
->middleware('auth')->name('saveinfo');
Route::get('/sach','App\Http\Controllers\LayoutController@sach') ->name("order");
Route::get('/sach/theloai/{id}','App\Http\Controllers\LayoutController@theloai');
Route::get('/sach/chitiet/{id}','App\Http\Controllers\BookController@chitiet');


Route::get('/book/list','App\Http\Controllers\BookController@booklist')
->middleware('auth')->name("booklist");

Route::get('/book/create','App\Http\Controllers\BookController@bookcreate')
        ->middleware('auth')->name("bookcreate");
Route::get('/book/edit/{id}','App\Http\Controllers\BookController@bookedit')
        ->middleware('auth')->name("bookedit");
Route::post('/book/save/{action}','App\Http\Controllers\BookController@booksave')
        ->middleware('auth')->name("booksave");
Route::post('/book/delete','App\Http\Controllers\BookController@bookdelete')
        ->middleware('auth')->name("bookdelete");


Route::match(['get', 'post'], '/bookview', 'App\Http\Controllers\BookController@bookview')->name("bookview");
Route::get('/testemail', [App\Http\Controllers\BookController::class, 'testemail']);
Route::post('/order/create', [App\Http\Controllers\BookController::class, 'ordercreate'])->middleware('auth')->name('ordercreate');
