<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sanpham;
use Illuminate\Support\Facades\Session;

class ThongsokythuatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return redirect('admin_home');
        }else{
            return redirect('/admin')->send();
        }
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->AuthLogin();
        $thongsokythuat = Sanpham::find($id);
        return view('admin.thongsokythuat.them')->with(compact('thongsokythuat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sanpham = Sanpham::find($id);

        $sanpham->man_hinh = $request->man_hinh;
        $sanpham->thoi_luong_pin = $request->thoi_luong_pin;
        $sanpham->ket_noi = $request->ket_noi;
        $sanpham->mat = $request->mat;
        $sanpham->tinh_nang_suc_khoe = $request->tinh_nang_suc_khoe;

        $sanpham->sanpham_gia = $request->sanpham_gia;
        $sanpham->sanpham_hinhanh = $request->sanpham_hinhanh;
        $sanpham->sanpham_soluong = $request->sanpham_soluong;
        $sanpham->sanpham_mota = $request->sanpham_mota;
        $sanpham->sanpham_noidung = $request->sanpham_noidung;
        $sanpham->sanpham_sku = $request->sanpham_sku;
        $sanpham->danhmuc_id = $request->sanpham_danhmuc;
        $sanpham->thuonghieu_id = $request->sanpham_thuonghieu;
        $sanpham->sanpham_trangthai = $request->sanpham_trangthai;
        $sanpham->save();

        return redirect('/lietke-sanpham')->with('success','Lưu thành công');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
