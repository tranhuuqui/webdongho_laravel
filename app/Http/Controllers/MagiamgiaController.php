<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Magiamgia;

class MagiamgiaController extends Controller
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
        $data_magiamgia = Magiamgia::orderby('magiamgia_id','DESC')->get();
        return view('admin.magiamgia.lietke')->with(compact('data_magiamgia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();
        
        return view('admin.magiamgia.them');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $magiamgia = new Magiamgia;
        $magiamgia->magiamgia_ten = $data['magiamgia_ten'];
        $magiamgia->magiamgia_ma = $data['magiamgia_ma'];
        $magiamgia->magiamgia_soluong = $data['magiamgia_soluong'];
        $magiamgia->magiamgia_tinhnang = $data['magiamgia_tinhnang'];
        $magiamgia->magiamgia_giagiam = $data['magiamgia_giagiam'];
        $magiamgia->save();

        return redirect('/them-magiamgia')->with('success','Thêm thành công');
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
        $magiamgia_xoa = Magiamgia::find($id);
        $magiamgia_xoa->delete();
        return redirect('lietke-magiamgia')->with('success','Xóa thành công');
    }

    //forn-end
    public function del_magiamgia(){
        $magiamgia = Session::get('magiamgia');
        if($magiamgia==true){
            Session::forget('magiamgia');
            return redirect()->back()->with('message','Xóa mã khuyến mãi thành công');
        }
    }
}
