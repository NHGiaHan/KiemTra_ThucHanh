<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TestSendEmail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function testemail()
    {
        $user = User::find(2); 
        $user->notify(new TestSendEmail()); 
        return "Đã gửi email thử!";
    }

    public function ordercreate(Request $request)
    {
        $request->validate([
            "hinh_thuc_thanh_toan" => ["required", "numeric"] 
        ]);

        $order = [
            "ngay_dat_hang" => DB::raw("now()"), 
            "tinh_trang" => 1, 
            "hinh_thuc_thanh_toan" => $request->hinh_thuc_thanh_toan, 
            "user_id" => Auth::user()->id 
        ];

        DB::transaction(function () use ($order) {
            $id_don_hang = DB::table("don_hang")->insertGetId($order); 
            $cart = session("cart"); 
            
            $list_book = "";
            foreach($cart as $id => $value) {
                $list_book .= $id . ", ";
            }
            $list_book = substr($list_book, 0, strlen($list_book) - 2); 

            $data = DB::table("sach")->whereRaw("id in (" . $list_book . ")")->get(); 

            $detail = [];
            foreach ($data as $row) {
                $detail[] = [
                    "ma_don_hang" => $id_don_hang, 
                    "sach_id" => $row->id,
                    "so_luong" => $cart[$row->id], 
                    "don_gia" => $row->gia_ban
                ]; 
            }

            DB::table("chi_tiet_don_hang")->insert($detail); 

            Auth::user()->notify(new TestSendEmail($data)); 

            session()->forget('cart'); 
        });

        return redirect()->route('order');
    }
}