<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Danhmucsanpham;
use App\Models\Thuonghieusanpham;
use App\Models\Sanpham;
use App\Models\Thuoctinh;

class ThuoctinhController extends Controller
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
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $this->AuthLogin();
        $thuoctinh = Thuoctinh::all();
        $sanpham_by_id = Sanpham::find($id);
        return view('admin.thuoctinh.them')->with(compact('sanpham_by_id','thuoctinh'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            foreach($data['sku'] as $key => $val){
                $thuoctinh = new Thuoctinh();
                $thuoctinh->sku = $val;
                $thuoctinh->sanpham_id= $id;
                $thuoctinh->gia = $data['gia'][$key];
                $thuoctinh->size = $data['size'][$key];
                $thuoctinh->stock = $data['stock'][$key];
                $thuoctinh->save();
            }
        }
        return redirect('/them-thuoctinh/'.$id)->with('success','Thêm thành công');
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
        $thuoctinh_xoa = Thuoctinh::find($id);
        $thuoctinh_xoa->delete();
        return redirect('/them-thuoctinh/'.$thuoctinh_xoa->sanpham_id)->with('success-xoathuoctinh','Xóa thành công');
    }
}
