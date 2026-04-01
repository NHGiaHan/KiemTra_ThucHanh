<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    function chitiet($id)
     {
         $data = DB::select("select * from sach where id = ?",[$id])[0]; 
         return view("components.chitiet",compact("data"));
     }
    public function bookview(Request $request)
    {
    $the_loai = $request->input("the_loai");
    $data = [];

    if ($the_loai != "") {
        $data = DB::select("select * from sach where the_loai = ?", [$the_loai]);
    } else {
        $data = DB::select("select * from sach order by gia_ban asc limit 0, 10");
    }

    return view("bookview", compact("data"));
    }
}