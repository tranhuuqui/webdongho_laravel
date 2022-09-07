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

class GiohangController extends Controller
{
    public function addToCart(Request $request, $id){
        //session()->flush('cart');
        $sanpham = Sanpham::find($id);
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            $cart[$id]['soluong'] = $cart[$id]['soluong'] +1;
        }else{
            $cart[$id] = [
                'session_id' => $session_id,
                'id' => $sanpham->sanpham_id,
                'ten' => $sanpham->sanpham_ten,
                'hinhanh' => $sanpham->sanpham_hinhanh,
                'soluong' => 1,
                'gia' => $sanpham->sanpham_gia,
            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ],200);
    }

    //Thêm từ chi tiết
    public function create_giohang(Request $request){
        $id=$request->sanpham_id_hidden;
        $soluong=$request->soluong;
        $session_id = substr(md5(microtime()),rand(0,26),5);

        $sanpham = Sanpham::find($id);
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            $cart[$id]['soluong'] = $cart[$id]['soluong'] + $soluong;
        }else{
            $cart[$id] = [
                'session_id' => $session_id,
                'id' => $sanpham->sanpham_id,
                'ten' => $sanpham->sanpham_ten,
                'hinhanh' => $sanpham->sanpham_hinhanh,
                'soluong' => $soluong,
                'gia' => $sanpham->sanpham_gia,
            ];
        }
        session()->put('cart', $cart);
        
        return Redirect('/show-cart');
    }

    //Trang gio hang
    public function showCart(Request $request){
        $all_sanpham = Sanpham::where('sanpham_trangthai','1')->orderBy('sanpham_id','desc')->get();
        $all_danhmuc = Danhmucsanpham::where('danhmuc_trangthai','1')->get();
        $all_thuonghieu= Thuonghieusanpham::where('thuonghieu_trangthai','1')->get();
        $all_danhmucbaiviet = Danhmucbaiviet::where('danhmucbaiviet_trangthai','1')->get();
        $thanhpho = TinhThanhpho::orderby('matp','ASC')->get();

        $carts = session()->get('cart');
        if(Session::get('cart')){
            $count_cart = count(Session::get('cart'));
        }else{
            $count_cart = 0;
        }
        return view('layouts.giohang', compact('count_cart','carts', 'all_sanpham','all_danhmuc','all_thuonghieu','all_danhmucbaiviet','thanhpho'));
    }
    
    //Cap nhat so luong
    public function updateCart(Request $request){

        $data = $request->all();
        $cart = Session::get('cart');

        if($cart==true){
            foreach($cart as $session => $val){
                if($val['id']==$data['id']){
                    $cart[$session]['soluong']=$data['soluong'];
                }
            }
            session()->put('cart', $cart);
            $carts = session()->get('cart');
            $thanhpho = TinhThanhpho::orderby('matp','ASC')->get();
            $cart_content = view('layouts\cart_content',compact('carts','thanhpho'))->render();
            return response()->json(['cart_content' => $cart_content, 'code' => 200],200);

        }

    }

    public function deleteCart(Request $request, $id){
        $cart = Session::get('cart');
        $thanhpho = TinhThanhpho::orderby('matp','ASC')->get();

        if($cart == true){
            foreach($cart as $key => $val){
                if($val['id']==$id){
                    unset($cart[$id]);
                }
            }
            Session::put('cart',$cart);
            $carts = session()->get('cart');
            if(!$carts){
                Session::forget('magiamgia');
            }
            $carts = session()->get('cart');
            $cart_content = view('layouts\cart_content',compact('carts','thanhpho'))->render();
            return response()->json(['cart_content' => $cart_content, 'code' => 200],200);
        }
        
    }

    public function check_coupon(Request $request){
        $data = $request->all();
        $magiamgia = Magiamgia::where('magiamgia_ma',$data['magiamgia'])->where('magiamgia_soluong','>','0')->first();
        if($magiamgia){
            $count_magiamgia = $magiamgia->count();
            if($count_magiamgia>0){
                $session_magiamgia = Session::get('magiamgia');
                if($session_magiamgia==true){
                    $is_available = 0;
                    if($is_available == 0){
                        $cou = array(
                            'magiamgia_ma'=> $magiamgia->magiamgia_ma,
                            'magiamgia_tinhnang'=> $magiamgia->magiamgia_tinhnang,
                            'magiamgia_giagiam' => $magiamgia->magiamgia_giagiam,
                        );
                        Session::put('magiamgia',$cou);
                    }
                }else{
                    $cou = array(
                        'magiamgia_ma'=> $magiamgia->magiamgia_ma,
                        'magiamgia_tinhnang'=> $magiamgia->magiamgia_tinhnang,
                        'magiamgia_giagiam' => $magiamgia->magiamgia_giagiam,
                    );
                    Session::put('magiamgia',$cou);
                }
                Session::save();
                return redirect()->back()->with('message','Đã thêm mã giảm giá thành công!');
            }
        }else{
            return redirect()->back()->with('error','Mã giảm giá không tồn tại hoặc hết số lượng!');
        }
    }

}