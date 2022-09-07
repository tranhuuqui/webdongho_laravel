<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Danhmucsanpham;
use App\Models\Sanpham;
use App\Models\Thuonghieusanpham;
use App\Models\Danhmucbaiviet;
use Illuminate\Support\Facades\Session;

class DanhmucsanphamController extends Controller
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
        $data_danhmuc = Danhmucsanpham::paginate(4);
        return view('admin.danhmucsanpham.lietke')->with(compact('data_danhmuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();
        return view('admin.danhmucsanpham.them');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'danhmuc_ten' => 'required',
            'danhmuc_trangthai' => 'required'
        ]);
        $danhmuc = new Danhmucsanpham();
        $danhmuc->danhmuc_ten = $data['danhmuc_ten'];
        $danhmuc->danhmuc_trangthai = $data['danhmuc_trangthai'];
        $danhmuc->save();

        return redirect('/them-danhmucsanpham')->with('success','Thêm thành công');
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
        $danhmuc_capnhat = Danhmucsanpham::find($id);
        return view('admin.danhmucsanpham.capnhat')->with(compact('danhmuc_capnhat'));
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
        $data = request()->validate([
            'danhmuc_ten' => 'required',
        ]);
        $danhmuc = Danhmucsanpham::find($id);
        $danhmuc->danhmuc_ten = $data['danhmuc_ten'];
        $danhmuc->save();

        return redirect('lietke-danhmucsanpham')->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $danhmuc_xoa = Danhmucsanpham::find($id);
        $danhmuc_xoa->delete();
        return redirect('lietke-danhmucsanpham')->with('success','Xóa thành công');
    }

    public function active($id)
    {
        $this->AuthLogin();
        $danhmuc_active = Danhmucsanpham::find($id);
        $danhmuc_active->danhmuc_trangthai = 0;
        $danhmuc_active->save();
        return redirect('/lietke-danhmucsanpham')->with('success','Hủy kích hoạt thành công');
    }

    public function unactive($id)
    {
        $this->AuthLogin();
        $danhmuc_unactive = Danhmucsanpham::find($id);
        $danhmuc_unactive->danhmuc_trangthai = 1;
        $danhmuc_unactive->save();
        return redirect('/lietke-danhmucsanpham')->with('success','Kích hoạt thành công');
    }

    public function search (Request $request){
        $this->AuthLogin();

        $key = $request->search_dmsp;
        $danhmuc_timkiem = Danhmucsanpham::where('danhmuc_ten','like','%'.$key.'%')->paginate(4);

        return view('admin.danhmucsanpham.timkiem')->with(compact('danhmuc_timkiem'));
    }

    //frontend
    public function sanpham_danhmuc($id){

        $all_sanpham = Sanpham::where('sanpham_trangthai','1')->orderBy('sanpham_id','desc')->get();
        $all_danhmuc = Danhmucsanpham::where('danhmuc_trangthai','1')->get();
        $all_thuonghieu= Thuonghieusanpham::where('thuonghieu_trangthai','1')->get();
        $all_danhmucbaiviet = Danhmucbaiviet::where('danhmucbaiviet_trangthai','1')->get();
        if(Session::get('cart')){
            $count_cart = count(Session::get('cart'));
        }else{
            $count_cart = 0;
        }

        $danhmuc_title = Danhmucsanpham::where('danhmuc_id',$id)->get();
        $sanpham_danhmuc = Sanpham::where('danhmuc_id',$id)->where('sanpham_trangthai','1')->get();

        return view('layouts/sanpham_danhmuc')->with(compact('count_cart','sanpham_danhmuc','danhmuc_title','all_danhmuc','all_thuonghieu','all_sanpham','all_danhmucbaiviet'));
    }
}