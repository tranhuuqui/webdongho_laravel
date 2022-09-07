<?php

namespace App\Http\Controllers;

use App\Models\Baiviet;
use Illuminate\Http\Request;
use App\Models\Danhmucsanpham;
use App\Models\Sanpham;
use App\Models\Thuonghieusanpham;
use App\Models\Danhmucbaiviet;
use Illuminate\Support\Facades\Session;

class DanhmucbaivietController extends Controller
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
        $data_danhmuc = Danhmucbaiviet::paginate(4);
        return view('admin.danhmucbaiviet.lietke')->with(compact('data_danhmuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();
        return view('admin.danhmucbaiviet.them');
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
            'danhmucbaiviet_ten' => 'required',
            'danhmucbaiviet_trangthai' => 'required'
        ]);
        $danhmuc = new Danhmucbaiviet();
        $danhmuc->danhmucbaiviet_ten = $data['danhmucbaiviet_ten'];
        $danhmuc->danhmucbaiviet_trangthai = $data['danhmucbaiviet_trangthai'];
        $danhmuc->save();

        return redirect('/them-danhmucbaiviet')->with('success','Thêm thành công');
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
        $danhmuc_capnhat = Danhmucbaiviet::find($id);
        return view('admin.danhmucbaiviet.capnhat')->with(compact('danhmuc_capnhat'));
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
            'danhmucbaiviet_ten' => 'required',
        ]);
        $danhmuc = Danhmucbaiviet::find($id);
        $danhmuc->danhmucbaiviet_ten = $data['danhmucbaiviet_ten'];
        $danhmuc->save();

        return redirect('lietke-danhmucbaiviet')->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $danhmuc_xoa = Danhmucbaiviet::find($id);
        $danhmuc_xoa->delete();
        return redirect('lietke-danhmucbaiviet')->with('success','Xóa thành công');
    }

    public function active($id)
    {
        $this->AuthLogin();
        $danhmuc_active = Danhmucbaiviet::find($id);
        $danhmuc_active->danhmucbaiviet_trangthai = 0;
        $danhmuc_active->save();
        return redirect('/lietke-danhmucbaiviet')->with('success','Hủy kích hoạt thành công');
    }

    public function unactive($id)
    {
        $this->AuthLogin();
        $danhmuc_unactive = Danhmucbaiviet::find($id);
        $danhmuc_unactive->danhmucbaiviet_trangthai = 1;
        $danhmuc_unactive->save();
        return redirect('/lietke-danhmucbaiviet')->with('success','Kích hoạt thành công');
    }

    public function show_danhmuc($id)
    {
        $all_sanpham = Sanpham::where('sanpham_trangthai','1')->orderBy('sanpham_id','desc')->get();
        $all_danhmuc = Danhmucsanpham::where('danhmuc_trangthai','1')->get();
        $all_thuonghieu= Thuonghieusanpham::where('thuonghieu_trangthai','1')->get();
        $all_danhmucbaiviet = Danhmucbaiviet::where('danhmucbaiviet_trangthai','1')->get();
        if(Session::get('cart')){
            $count_cart = count(Session::get('cart'));
        }else{
            $count_cart = 0;
        }

        $danhmuc_title = Danhmucbaiviet::where('danhmucbaiviet_id',$id)->first();
        $baiviet_danhmuc = Baiviet::where('danhmucbaiviet_id',$id)->where('baiviet_trangthai','1')->get();

        return view('layouts/danhmucbaiviet')->with(compact('count_cart','baiviet_danhmuc','danhmuc_title','all_danhmuc','all_thuonghieu','all_sanpham','all_danhmucbaiviet'));
    }
}
