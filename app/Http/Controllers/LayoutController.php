<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LayoutController extends Controller
{
    // Hàm hiển thị 8 cuốn sách rẻ nhất cho trang chủ
    public function sach()
    {
        $data = DB::select("select * from sach order by gia_ban asc limit 0,8");
        return view("components.index", compact("data"));
    }

    // Hàm lọc sách theo thể loại (ID truyền từ URL)
    public function theloai($id)
    {
        $data = DB::select("select * from sach where the_loai = ?", [$id]);
        return view("components.index", compact("data"));
    }
}