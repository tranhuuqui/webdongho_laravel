<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Magiamgia;
use App\Models\Phivanchuyen;
use App\Models\Donhang;
use App\Models\Donhangchitiet;
use App\Models\Khachhang;
use App\Models\Sanpham;
use App\Models\Danhmucsanpham;
use App\Models\Thuonghieusanpham;
use App\Models\Danhmucbaiviet;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;

class DonhangController extends Controller
{

    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return redirect('admin_home');
        }else{
            return redirect('/admin')->send();
        }
    }

    public function quanlydonhang(){
        $this->AuthLogin();
        $donhang = Donhang::orderby('donhang_id','DESC')->get();
        return view('admin.donhang.quanlydonhang')->with(compact('donhang'));
    }

    public function chitietdonhang($donhang_ma){
        $this->AuthLogin();
        $donhang_chitiet = Donhangchitiet::where('donhang_ma',$donhang_ma)->get();
        $donhang = Donhang::where('donhang_ma',$donhang_ma)->get();
        foreach($donhang as $key => $don){
            $khachhang_id = $don->khachhang_id;
        }
        $khachhang = Khachhang::where('khachhang_id',$khachhang_id)->first();

        foreach($donhang_chitiet as $key => $dh_ct){
            $dhct_magiamgia = $dh_ct->magiamgia;
        }
        $magiamgia = Magiamgia::where('magiamgia_ma',$dhct_magiamgia)->first();
        $donhang_select_code = Donhangchitiet::where('donhang_ma',$donhang_ma)->first();

        return view('admin.donhang.chitietdonhang')->with(compact('donhang_select_code','donhang_chitiet','khachhang','magiamgia'));
    }

    public function duyet_donhang($id)
    {
        $this->AuthLogin();
        $donhang = Donhang::find($id);
        $donhang->donhang_trangthai = 2;
        $donhang->save();
        return redirect('/quanlydonhang')->with('success','Duyệt đơn hàng thành công');
    }

    public function destroy($donhang_ma)
    {
        $donhang_xoa = Donhang::where('donhang_ma',$donhang_ma);
        $donhangchitiet_xoa = Donhangchitiet::where('donhang_ma',$donhang_ma);
        $donhang_xoa->delete();
        $donhangchitiet_xoa->delete();
        return redirect('/quanlydonhang')->with('success','Xóa thành công');
    }

    //frontend
    public function xem_donhang($khachhang_id){
        $all_sanpham = Sanpham::where('sanpham_trangthai','1')->orderBy('sanpham_id','desc')->get();
        $all_danhmuc = Danhmucsanpham::where('danhmuc_trangthai','1')->get();
        $all_thuonghieu= Thuonghieusanpham::where('thuonghieu_trangthai','1')->get();
        $all_danhmucbaiviet = Danhmucbaiviet::where('danhmucbaiviet_trangthai','1')->get();
        if(Session::get('cart')){
            $count_cart = count(Session::get('cart'));
        }else{
            $count_cart = 0;
        }
        $donhang = Donhang::where('khachhang_id',$khachhang_id)->orderby('donhang_id','DESC')->get();

        return view('layouts.xemdonhang')->with(compact('donhang','count_cart','all_danhmuc','all_thuonghieu','all_sanpham','all_danhmucbaiviet'));
    }

    public function huy_donhang($id)
    {
        $donhang = Donhang::find($id);
        $donhang->donhang_trangthai = 3;
        $donhang->save();
        return redirect('/xem-donhang'.'/'.$donhang->khachhang_id)->with('success','Hủy đơn hàng thành công!');
    }

    public function chitiet_donhang($donhang_ma){
        $all_sanpham = Sanpham::where('sanpham_trangthai','1')->orderBy('sanpham_id','desc')->get();
        $all_danhmuc = Danhmucsanpham::where('danhmuc_trangthai','1')->get();
        $all_thuonghieu= Thuonghieusanpham::where('thuonghieu_trangthai','1')->get();
        $all_danhmucbaiviet = Danhmucbaiviet::where('danhmucbaiviet_trangthai','1')->get();
        if(Session::get('cart')){
            $count_cart = count(Session::get('cart'));
        }else{
            $count_cart = 0;
        }
        $donhang_chitiet = Donhangchitiet::where('donhang_ma',$donhang_ma)->get();
        $donhang = Donhang::where('donhang_ma',$donhang_ma)->get();
        foreach($donhang as $key => $don){
            $khachhang_id = $don->khachhang_id;
        }
        $khachhang = Khachhang::where('khachhang_id',$khachhang_id)->first();

        foreach($donhang_chitiet as $key => $dh_ct){
            $dhct_magiamgia = $dh_ct->magiamgia;
        }
        $magiamgia = Magiamgia::where('magiamgia_ma',$dhct_magiamgia)->first();

        return view('layouts.chitietdonhang')->with(compact('magiamgia','khachhang','donhang_chitiet','count_cart','all_danhmuc','all_thuonghieu','all_sanpham','all_danhmucbaiviet'));
    }

    public function indonhang($checkout_code){
        $donhang_chitiet = Donhangchitiet::where('donhang_ma',$checkout_code)->get();
        $donhang = Donhang::where('donhang_ma',$checkout_code)->get();
        foreach($donhang as $key => $don){
            $khachhang_id = $don->khachhang_id;
        }
        $khachhang = Khachhang::where('khachhang_id',$khachhang_id)->first();

        foreach($donhang_chitiet as $key => $dh_ct){
            $dhct_magiamgia = $dh_ct->magiamgia;
        }
        $magiamgia = Magiamgia::where('magiamgia_ma',$dhct_magiamgia)->first();

        $pdf_doc = PDF::loadView('admin.donhang.xuat_pdf', compact('donhang_chitiet','magiamgia','khachhang','donhang'));

        return $pdf_doc->stream();
    }

}
