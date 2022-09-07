<?php

namespace App\Http\Controllers;

use App\Models\Baiviet;
use Illuminate\Http\Request;
use App\Models\Danhmucsanpham;
use App\Models\Sanpham;
use App\Models\Thuonghieusanpham;
use App\Models\Danhmucbaiviet;
use Illuminate\Support\Facades\Session;


class BaivietController extends Controller
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
        $this->AuthLogin();
        $data_baiviet = Baiviet::paginate(6);
        return view('admin.baiviet.lietke')->with(compact('data_baiviet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();
        $danhmuc_baiviet = Danhmucbaiviet::all();
        return view('admin.baiviet.them')->with(compact('danhmuc_baiviet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->AuthLogin();
        if($request->has('baiviet_hinhanh')){
            $baiviet_hinhanh = $request->baiviet_hinhanh;
            //lay ten file
            $hinhanh_ten = $baiviet_hinhanh->getClientOriginalName();
            //upload
            $baiviet_hinhanh->move(base_path('uploads/baiviet'),$hinhanh_ten);
        }
        $data = $request->all();

        $baiviet = new Baiviet();
        $baiviet->baiviet_tieude = $data['baiviet_tieude'];
        $baiviet->baiviet_mota = $data['baiviet_mota'];
        $baiviet->baiviet_noidung = $data['baiviet_noidung'];
        $baiviet->danhmucbaiviet_id = $data['baiviet_danhmuc'];
        $baiviet->baiviet_trangthai = $data['baiviet_trangthai'];
        $baiviet->baiviet_hinhanh = $hinhanh_ten;
        $baiviet->save();

        return redirect('/them-baiviet')->with('success','Thêm thành công');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $baiviet_xoa = Baiviet::find($id);
        $destinationPath = 'uploads/baiviet'.$baiviet_xoa->baiviet_hinhanh; //xóa ảnh trong file uploads
        if(file_exists($destinationPath)){
            unlink($destinationPath);
        }
        $baiviet_xoa->delete();
        return redirect('lietke-baiviet')->with('success','Xóa thành công');
    }

    public function show_baiviet($id){
        $all_sanpham = Sanpham::where('sanpham_trangthai','1')->orderBy('sanpham_id','desc')->get();
        $all_danhmuc = Danhmucsanpham::where('danhmuc_trangthai','1')->get();
        $all_thuonghieu= Thuonghieusanpham::where('thuonghieu_trangthai','1')->get();
        $all_danhmucbaiviet = Danhmucbaiviet::where('danhmucbaiviet_trangthai','1')->get();
        if(Session::get('cart')){
            $count_cart = count(Session::get('cart'));
        }else{
            $count_cart = 0;
        }

        $baiviet = Baiviet::where('baiviet_id',$id)->where('baiviet_trangthai','1')->get();
        foreach($baiviet as $bv){
            $danhmuc_title = Danhmucbaiviet::where('danhmucbaiviet_id',$bv['danhmucbaiviet_id'])->first();
        }

        return view('layouts/baiviet')->with(compact('count_cart','baiviet','danhmuc_title','all_danhmuc','all_thuonghieu','all_sanpham','all_danhmucbaiviet'));
    }
}
