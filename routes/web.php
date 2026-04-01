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