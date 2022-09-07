<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thuonghieusanpham;
use Illuminate\Support\Facades\Session;
use App\Models\Sanpham;
use App\Models\Danhmucsanpham;
use App\Models\Danhmucbaiviet;

class ThuonghieusanphamController extends Controller
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
        $data_thuonghieu = Thuonghieusanpham::paginate(4);
        return view('admin.thuonghieusanpham.lietke')->with(compact('data_thuonghieu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();
        return view('admin.thuonghieusanpham.them');
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
            'thuonghieu_ten' => 'required',
            'thuonghieu_trangthai' => 'required'
        ]);
        $thuonghieu = new Thuonghieusanpham();
        $thuonghieu->thuonghieu_ten = $data['thuonghieu_ten'];
        $thuonghieu->thuonghieu_trangthai = $data['thuonghieu_trangthai'];
        $thuonghieu->save();

        return redirect('/them-thuonghieusanpham')->with('success','Thêm thành công');
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
        $thuonghieu_capnhat = Thuonghieusanpham::find($id);
        return view('admin.thuonghieusanpham.capnhat')->with(compact('thuonghieu_capnhat'));
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
            'thuonghieu_ten' => 'required',
        ]);
        $thuonghieu = Thuonghieusanpham::find($id);
        $thuonghieu->thuonghieu_ten = $data['thuonghieu_ten'];
        $thuonghieu->save();

        return redirect('lietke-thuonghieusanpham')->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thuonghieu_xoa = Thuonghieusanpham::find($id);
        $thuonghieu_xoa->delete();
        return redirect('lietke-thuonghieusanpham')->with('success','Xóa thành công');
    }

    public function active($id)
    {
        $this->AuthLogin();
        $thuonghieu_active =Thuonghieusanpham::find($id);
        $thuonghieu_active->thuonghieu_trangthai = 0;
        $thuonghieu_active->save();
        return redirect('/lietke-thuonghieusanpham')->with('success','Hủy kích hoạt thành công');
    }

    public function unactive($id)
    {
        $this->AuthLogin();
        $thuonghieu_active = Thuonghieusanpham::find($id);
        $thuonghieu_active->thuonghieu_trangthai = 1;
        $thuonghieu_active->save();
        return redirect('/lietke-thuonghieusanpham')->with('success','Kích hoạt thành công');
    }

    public function search (Request $request){
        $this->AuthLogin();

        $key = $request->search_thsp;
        $thuonghieu_timkiem = Thuonghieusanpham::where('thuonghieu_ten','like','%'.$key.'%')->paginate(4);

        return view('admin.thuonghieusanpham.timkiem')->with(compact('thuonghieu_timkiem'));
    }

    //frontend
    public function sanpham_thuonghieu($id){

        $all_sanpham = Sanpham::where('sanpham_trangthai','1')->orderBy('sanpham_id','desc')->get();
        $all_danhmuc = Danhmucsanpham::where('danhmuc_trangthai','1')->get();
        $all_thuonghieu= Thuonghieusanpham::where('thuonghieu_trangthai','1')->get();
        $all_danhmucbaiviet = Danhmucbaiviet::where('danhmucbaiviet_trangthai','1')->get();
        if(Session::get('cart')){
            $count_cart = count(Session::get('cart'));
        }else{
            $count_cart = 0;
        }

        $thuonghieu_title = Thuonghieusanpham::where('thuonghieu_id',$id)->get();
        $sanpham_thuonghieu = Sanpham::where('thuonghieu_id',$id)->where('sanpham_trangthai','1')->get();

        return view('layouts/sanpham_thuonghieu')->with(compact('count_cart','sanpham_thuonghieu','thuonghieu_title','all_danhmuc','all_thuonghieu','all_sanpham','all_danhmucbaiviet'));
    }
}