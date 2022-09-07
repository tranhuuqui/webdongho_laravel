<?php

namespace App\Http\Controllers;

use App\Models\Binhluan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BinhluanController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return redirect('trangchu');
        }else{
            return redirect('/admin')->send();
        }
    }

    public function luu_binhluan(Request $request)
    {
        
        $data = $request->all();

        $binhluan = new Binhluan();
        $binhluan->sanpham_id = $data['sanpham_id_binhluan'];
        $binhluan->khachhang_id = $data['khachhang_id_binhluan'];
        $binhluan->khachhang_ten = $data['khachhang_ten_binhluan'];
        $binhluan->binhluan_noidung = $data['binhluan_noidung'];
        $binhluan->binhluan_trangthai = 0;
        $binhluan->binhluan_traloi = 0;
        $binhluan->save();

        return redirect('/sanpham-chitiet'.'/'.$request->sanpham_id_binhluan)->with('success','Bình luận thành công! Chờ duyệt!');
    }

    public function quanly_binhluan(Request $request)
    {
        $this->AuthLogin();
        $data_binhluan = Binhluan::orderBy('binhluan_trangthai','DESC')->paginate(8);

        return view('admin.binhluan.lietke')->with(compact('data_binhluan'));
    }

    public function active($binhluan_id)
    {
        $this->AuthLogin();
        $binhluan_active = Binhluan::find($binhluan_id);
        $binhluan_active->binhluan_trangthai = 0;
        $binhluan_active->save();
        return redirect('/quanly-binhluan')->with('success','Hủy duyệt thành công');
    }

    public function unactive($binhluan_id)
    {
        $this->AuthLogin();
        $binhluan_unactive = Binhluan::find($binhluan_id);
        $binhluan_unactive->binhluan_trangthai = 1;
        $binhluan_unactive->save();
        return redirect('/quanly-binhluan')->with('success','Duyệt bình luận thành công');
    }

    public function destroy($id)
    {
        $this->AuthLogin();
        $binhluan_xoa = Binhluan::find($id);
        $binhluan_xoa->delete();
        return redirect('/quanly-binhluan')->with('success','Xóa thành công');
    }

    public function traloi_binhluan(Request $request){
        $this->AuthLogin();
        $data = $request->all();
        $binhluan_traloi = new Binhluan();
        $binhluan_traloi->sanpham_id = $data['sanpham_id_hidden'];
        $binhluan_traloi->khachhang_id = $data['khachhang_id_hidden'];
        $binhluan_traloi->khachhang_ten = $data['khachhang_name_hidden'];
        $binhluan_traloi->binhluan_noidung = $data['traloi_binhluan'];
        $binhluan_traloi->binhluan_trangthai = 1;
        $binhluan_traloi->binhluan_traloi = $data['binhluan_id_hidden'];
        $binhluan_traloi->save();

        return redirect('/quanly-binhluan')->with('success','Trả lời bình luận thành công');
    }
}
