<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Danhmucsanpham;
use App\Models\Thuonghieusanpham;
use App\Models\Sanpham;
use App\Models\Danhmucbaiviet;
use App\Models\Binhluan;
use Illuminate\Support\Facades\Session;

class SanphamController extends Controller
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
        $data_sanpham = Sanpham::orderby('sanpham_id','DESC')->paginate(6);
        return view('admin.sanpham.lietke')->with(compact('data_sanpham'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();
        $danhmuc = Danhmucsanpham::all();
        $thuonghieu = Thuonghieusanpham::all();
        return view('admin.sanpham.them')->with(compact('danhmuc'))->with(compact('thuonghieu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('sanpham_hinhanh')){
            $sanpham_hinhanh = $request->sanpham_hinhanh;
            //lay ten file
            $hinhanh_ten = $sanpham_hinhanh->getClientOriginalName();
            //upload
            $sanpham_hinhanh->move(base_path('uploads'),$hinhanh_ten);
        }
        $data = request()->validate([
            'sanpham_ten' => 'required',
            'sanpham_gia' => 'required',
            'sanpham_soluong' => 'required',
            'sanpham_mota' => 'required',
            'sanpham_noidung' => 'required',
            'sanpham_sku' => 'required',
            'sanpham_danhmuc' => 'required',
            'sanpham_thuonghieu' => 'required',
            'sanpham_trangthai' => 'required'
        ]);

        $sanpham = new Sanpham();
        $sanpham->sanpham_ten = $data['sanpham_ten'];
        $sanpham->sanpham_gia = $data['sanpham_gia'];
        $sanpham->sanpham_hinhanh = $hinhanh_ten;
        $sanpham->sanpham_soluong = $data['sanpham_soluong'];
        $sanpham->sanpham_mota = $data['sanpham_mota'];
        $sanpham->sanpham_noidung = $data['sanpham_noidung'];
        $sanpham->sanpham_sku = $data['sanpham_sku'];
        $sanpham->danhmuc_id = $data['sanpham_danhmuc'];
        $sanpham->thuonghieu_id = $data['sanpham_thuonghieu'];;
        $sanpham->sanpham_trangthai = $data['sanpham_trangthai'];
        $sanpham->save();

        return redirect('/them-sanpham')->with('success','Thêm thành công');
        
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
        $danhmuc = Danhmucsanpham::all();
        $thuonghieu = Thuonghieusanpham::all();
        $sanpham_capnhat = Sanpham::find($id);
        return view('admin.sanpham.capnhat')->with(compact('sanpham_capnhat','danhmuc','thuonghieu'));
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
            'sanpham_ten' => 'required',
            'sanpham_gia' => 'required',
            'sanpham_soluong' => 'required',
            'sanpham_mota' => 'required',
            'sanpham_noidung' => 'required',
            'sanpham_sku' => 'required',
            'sanpham_danhmuc' => 'required',
            'sanpham_thuonghieu' => 'required',
            'sanpham_trangthai' => 'required'
            
        ]);
        $sanpham = Sanpham::find($id);
        $image = request('sanpham_hinhanh');
        if($image){     //nếu chọn ảnh mới
            $destinationPath = 'uploads/'.$sanpham->sanpham_hinhanh;
            if(file_exists($destinationPath)){
                unlink($destinationPath);
            }

            if($request->has('sanpham_hinhanh')){
                $sanpham_hinhanh = $request->sanpham_hinhanh;
                //lay ten file
                $hinhanh_ten = $sanpham_hinhanh->getClientOriginalName();
                //upload
                $sanpham_hinhanh->move(base_path('uploads'),$hinhanh_ten);
            }
            $sanpham->sanpham_ten = $data['sanpham_ten'];
            $sanpham->sanpham_gia = $data['sanpham_gia'];
            $sanpham->sanpham_hinhanh = $hinhanh_ten;
            $sanpham->sanpham_soluong = $data['sanpham_soluong'];
            $sanpham->sanpham_mota = $data['sanpham_mota'];
            $sanpham->sanpham_noidung = $data['sanpham_noidung'];
            $sanpham->sanpham_sku = $data['sanpham_sku'];
            $sanpham->danhmuc_id = $data['sanpham_danhmuc'];
            $sanpham->thuonghieu_id = $data['sanpham_thuonghieu'];;
            $sanpham->sanpham_trangthai = $data['sanpham_trangthai'];
        }else{
            $sanpham->sanpham_ten = $data['sanpham_ten'];
            $sanpham->sanpham_gia = $data['sanpham_gia'];
            $sanpham->sanpham_soluong = $data['sanpham_soluong'];
            $sanpham->sanpham_mota = $data['sanpham_mota'];
            $sanpham->sanpham_noidung = $data['sanpham_noidung'];
            $sanpham->sanpham_sku = $data['sanpham_sku'];
            $sanpham->danhmuc_id = $data['sanpham_danhmuc'];
            $sanpham->thuonghieu_id = $data['sanpham_thuonghieu'];;
            $sanpham->sanpham_trangthai = $data['sanpham_trangthai'];
        }
        $sanpham->save();
        return redirect('lietke-sanpham')->with('success','Cập nhật thành công');
    }

    public function active($id)
    {
        $this->AuthLogin();
        $sanpham_active = Sanpham::find($id);
        $sanpham_active->sanpham_trangthai = 0;
        $sanpham_active->save();
        return redirect('/lietke-sanpham')->with('success','Hủy kích hoạt thành công');
    }

    public function unactive($id)
    {
        $this->AuthLogin();
        $sanpham_unactive = Sanpham::find($id);
        $sanpham_unactive->sanpham_trangthai = 1;
        $sanpham_unactive->save();
        return redirect('/lietke-sanpham')->with('success','Kích hoạt thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sanpham_xoa = Sanpham::find($id);
        $destinationPath = 'uploads'.$sanpham_xoa->sanpham_hinhanh; //xóa ảnh trong file uploads
        if(file_exists($destinationPath)){
            unlink($destinationPath);
        }
        $sanpham_xoa->delete();
        return redirect('lietke-sanpham')->with('success','Xóa thành công');
    }

    public function search (Request $request){
        $this->AuthLogin();

        $key = $request->search_sp;
        $sanpham_timkiem = Sanpham::where('sanpham_ten','like','%'.$key.'%')->paginate(4);

        return view('admin.sanpham.timkiem')->with(compact('sanpham_timkiem'));
    }


    /*public function searchAjax (Request $request){
        if(request('key')){
            $key = request('key');
            $danhmuc_timkiem = Sanpham::where('danhmuc_ten','LIKE','%'.$key.'%')->get();
        return $danhmuc_timkiem;}
    }*/

    //frontend
    public function sanpham_all(){
        $all_sanpham = Sanpham::where('sanpham_trangthai','1')->orderBy('sanpham_id','desc')->get();
        $all_danhmuc = Danhmucsanpham::where('danhmuc_trangthai','1')->get();
        $all_thuonghieu= Thuonghieusanpham::where('thuonghieu_trangthai','1')->get();
        $all_danhmucbaiviet = Danhmucbaiviet::where('danhmucbaiviet_trangthai','1')->get();
        if(Session::get('cart')){
            $count_cart = count(Session::get('cart'));
        }else{
            $count_cart = 0;
        }

        $sanpham_all = Sanpham::where('sanpham_trangthai','1')->orderBy('sanpham_id','desc')->get();

        return view('layouts/sanpham_all')->with(compact('count_cart','sanpham_all', 'all_sanpham','all_danhmuc','all_thuonghieu','all_danhmucbaiviet'));
    }

    public function sanpham_chitiet($id){
        $all_sanpham = Sanpham::where('sanpham_trangthai','1')->orderBy('sanpham_id','desc')->get();
        $all_danhmuc = Danhmucsanpham::where('danhmuc_trangthai','1')->get();
        $all_thuonghieu= Thuonghieusanpham::where('thuonghieu_trangthai','1')->get();
        $all_danhmucbaiviet = Danhmucbaiviet::where('danhmucbaiviet_trangthai','1')->get();
        $binhluan = Binhluan::where('binhluan_trangthai','1')->orderby('binhluan_id','DESC')->get();
        if(Session::get('cart')){
            $count_cart = count(Session::get('cart'));
        }else{
            $count_cart = 0;
        }
        
        $sanpham_chitiet = Sanpham::where('sanpham_id',$id)->first();
        return view('layouts/sanpham_chitiet')->with(compact('binhluan','count_cart','sanpham_chitiet', 'all_sanpham','all_danhmuc','all_thuonghieu','all_danhmucbaiviet'));
    }
}
