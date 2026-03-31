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

}