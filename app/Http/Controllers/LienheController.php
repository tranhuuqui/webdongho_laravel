<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Danhmucsanpham;
use App\Models\Sanpham;
use App\Models\Thuonghieusanpham;
use App\Models\Danhmucbaiviet;
use Illuminate\Support\Facades\Session;

class LienheController extends Controller
{
    public function show_lienhe(){
        $all_sanpham = Sanpham::where('sanpham_trangthai','1')->orderBy('sanpham_id','desc')->get();
        $all_danhmuc = Danhmucsanpham::where('danhmuc_trangthai','1')->get();
        $all_thuonghieu= Thuonghieusanpham::where('thuonghieu_trangthai','1')->get();
        $all_danhmucbaiviet = Danhmucbaiviet::where('danhmucbaiviet_trangthai','1')->get();
        if(Session::get('cart')){
            $count_cart = count(Session::get('cart'));
        }else{
            $count_cart = 0;
        }
        return view('layouts.lienhe')->with(compact('count_cart','all_danhmuc','all_thuonghieu','all_sanpham','all_danhmucbaiviet'));
    }
}
