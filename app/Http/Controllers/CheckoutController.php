<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Danhmucsanpham;
use App\Models\Sanpham;
use App\Models\Thuonghieusanpham;
use App\Models\Danhmucbaiviet;
use Illuminate\Http\Request;
use App\Models\Magiamgia;
use App\Models\TinhThanhpho;
use App\Models\QuanHuyen;
use App\Models\XaPhuong;
use App\Models\Phivanchuyen;
use App\Models\Donhang;
use App\Models\Donhangchitiet;


class CheckoutController extends Controller
{
    public function checkout(){
        $all_sanpham = Sanpham::where('sanpham_trangthai','1')->orderBy('sanpham_id','desc')->get();
        $all_danhmuc = Danhmucsanpham::where('danhmuc_trangthai','1')->get();
        $all_thuonghieu= Thuonghieusanpham::where('thuonghieu_trangthai','1')->get();
        $all_danhmucbaiviet = Danhmucbaiviet::where('danhmucbaiviet_trangthai','1')->get();
        $thanhpho = TinhThanhpho::orderby('matp','ASC')->get();
        if(Session::get('cart')){
            $count_cart = count(Session::get('cart'));
        }else{
            $count_cart = 0;
        }
        $carts = session()->get('cart');
        return view('layouts.checkout', compact('count_cart','carts', 'all_sanpham','all_danhmuc','all_thuonghieu','all_danhmucbaiviet','thanhpho'));
    }

    public function diachinhanhang(Request $request){
        $data = $request->all();
        $output = '';
        if($data['action']=='thanhpho'){
            $output .='<option>---Chọn quận/huyện---</option>';
            $select_quanhuyen = QuanHuyen::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
            foreach($select_quanhuyen as $key =>$quanhuyen){
                $output.='<option value="'.$quanhuyen->maqh.'">'.$quanhuyen->name_quanhuyen.'</option>';
            }
        }else{
            $output .='<option>---Chọn xã/phường/thị trấn---</option>';
            $select_xaphuong = XaPhuong::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
            foreach($select_xaphuong as $key =>$xaphuong){
                $output.='<option value="'.$xaphuong->xaid.'">'.$xaphuong->name_xaphuong.'</option>';
            }
        }
        echo $output;
    }

    public function xacnhandiachi(Request $request){

        $data = $request->all();
        if($data['thanhpho']){
            Session::forget('phivanchuyen');
            Session::forget('sonha');
            Session::forget('xaphuong');
            Session::forget('quanhuyen');
            Session::forget('thanhpho');
            $phivanchuyen = Phivanchuyen::where('phivanchuyen_matp',$data['thanhpho'])
            ->where('phivanchuyen_maqh',$data['quanhuyen'])
            ->where('phivanchuyen_xaid',$data['xaphuong'])
            ->get();

            if($phivanchuyen){
                $count_phi = $phivanchuyen->count();
                if($count_phi>0){
                    foreach($phivanchuyen as $key => $phi){
                        Session::put('phivanchuyen',$phi->phivanchuyen_gia);
                        Session::save();
                    }
                    
                }else{
                    Session::put('phivanchuyen',40000);
                    Session::save();
                }

                Session::put('sonha',$data['sonha']);
                $xaphuong= XaPhuong::where('xaid',$data['xaphuong'])->get();
                foreach($xaphuong as $xp){
                    Session::put('xaphuong',$xp->name_xaphuong);
                }
                $quanhuyen = QuanHuyen::where('maqh',$data['quanhuyen'])->get();
                foreach($quanhuyen as $qh){
                    Session::put('quanhuyen',$qh->name_quanhuyen);
                }
                $thanhpho = TinhThanhpho::where('matp',$data['thanhpho'])->get();
                foreach($thanhpho as $tp){
                    Session::put('thanhpho',$tp->name_tinhthanhpho);
                }
                session::save();
            }
        }
             
    }

    public function thanhtoan_giohang(Request $request){
        $data = $request->all();
        
        $donhang_code = substr(md5(microtime()),rand(0,26),5);
        $donhang = new Donhang();
        $donhang->khachhang_id = $data['khachhang_id'];
        $donhang->donhang_trangthai = 1;
        $donhang->diachi_nhanhang = $data['diachinhanhang'];
        $donhang->donhang_ma = $donhang_code;
        $donhang->donhang_gia = $data['tonggia'];
        $donhang->save();

        
        $carts = session()->get('cart');
        if($carts){
            foreach($carts as $key => $cart){
                $donhang_chitiet = new Donhangchitiet();
                $donhang_chitiet->donhang_ma = $donhang_code;
                $donhang_chitiet->sanpham_id = $cart['id'];
                $donhang_chitiet->sanpham_ten = $cart['ten'];
                $donhang_chitiet->sanpham_gia = $cart['gia'];
                $donhang_chitiet->sanpham_soluong_mua = $cart['soluong'];
                $donhang_chitiet->phivanchuyen = $data['phivanchuyen'];
                $donhang_chitiet->magiamgia = $data['magiamgia'];
                $donhang_chitiet->save();

                $sanpham = Sanpham::find($cart['id']);
                $sanpham->sanpham_soluong = $sanpham->sanpham_soluong - $cart['soluong'];
                $sanpham->save();
            }
        }
        $soluong_giam = Magiamgia::where('magiamgia_ma',$data['magiamgia'])->first();
        if($soluong_giam){
            $soluong_giam->magiamgia_soluong = $soluong_giam->magiamgia_soluong-1;
            $soluong_giam->save();
        }
        


        Session::forget('magiamgia');
        Session::forget('phivanchuyen');
        Session::forget('cart');

        $all_sanpham = Sanpham::where('sanpham_trangthai','1')->orderBy('sanpham_id','desc')->get();
        $all_danhmuc = Danhmucsanpham::where('danhmuc_trangthai','1')->get();
        $all_thuonghieu= Thuonghieusanpham::where('thuonghieu_trangthai','1')->get();
        $all_danhmucbaiviet = Danhmucbaiviet::where('danhmucbaiviet_trangthai','1')->get();
        if(Session::get('cart')){
            $count_cart = count(Session::get('cart'));
        }else{
            $count_cart = 0;
        }
        return view('layouts/thanhtoan')->with(compact('count_cart','carts','all_danhmuc','all_thuonghieu','all_sanpham','all_danhmucbaiviet'));
    }
}
