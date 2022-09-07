<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Danhmucsanpham;
use App\Models\Thuonghieusanpham;
use App\Models\Sanpham;
use App\Models\Danhmucbaiviet;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('cart_index');
    }

    public function index_layout()
    {
        $all_sanpham = Sanpham::where('sanpham_trangthai','1')->orderBy('sanpham_id','desc')->get();
        $all_danhmuc = Danhmucsanpham::where('danhmuc_trangthai','1')->get();
        $all_thuonghieu= Thuonghieusanpham::where('thuonghieu_trangthai','1')->get();
        $all_danhmucbaiviet= Danhmucbaiviet::where('danhmucbaiviet_trangthai','1')->get();
        if(Session::get('cart')){
            $count_cart = count(Session::get('cart'));
        }else{
            $count_cart = 0;
        }

        return view('layouts.home')->with(compact('count_cart','all_sanpham','all_danhmuc','all_thuonghieu','all_danhmucbaiviet'));
    }

    public function timkiem(Request $request){
        $tukhoa = $request->search_product;
        $all_sanpham = Sanpham::where('sanpham_trangthai','1')->orderBy('sanpham_id','desc')->get();
        $all_danhmuc = Danhmucsanpham::where('danhmuc_trangthai','1')->get();
        $all_thuonghieu= Thuonghieusanpham::where('thuonghieu_trangthai','1')->get();
        $all_danhmucbaiviet= Danhmucbaiviet::where('danhmucbaiviet_trangthai','1')->get();
        if(Session::get('cart')){
            $count_cart = count(Session::get('cart'));
        }else{
            $count_cart = 0;
        }

        $sanpham_timkiem = Sanpham::where('sanpham_ten','like','%'.$tukhoa.'%')->where('sanpham_trangthai','1')->get();
        return view('layouts.timkiem')->with(compact('sanpham_timkiem','count_cart','all_sanpham','all_danhmuc','all_thuonghieu','all_danhmucbaiviet'));
    }

}
