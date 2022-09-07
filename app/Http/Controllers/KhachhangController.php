<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Khachhang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class KhachhangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $khachhang_xoa = Khachhang::find($id);
        $khachhang_xoa->delete();
        return redirect('lietke-khachhang')->with('success','Xóa thành công');
    }

    //Đăng ký
    public function them_khachhang(Request $request){
        $data = array();
        $data['khachhang_ten'] = $request->khachhang_ten; 
        $data['khachhang_email'] = $request->khachhang_email; 
        $data['khachhang_password'] = md5($request->khachhang_password); 
        $data['khachhang_sdt'] = $request->khachhang_sdt;
        $data['khachhang_diachi'] = $request->khachhang_diachi; 

        $data_khachhang_id = DB::table('tbl_khachhang')->insertGetId($data);
        Session::put('khachhang_id',$data_khachhang_id);
        Session::put('khachhang_ten',$request->khachhang_ten);
        Session::put('khachhang_diachi',$request->khachhang_diachi);
        Session::put('khachhang_sdt',$request->khachhang_sdt);
        Session::put('khachhang_email',$request->khachhang_email);
        
        return redirect()->back()->with('notice','Đã đăng ký thành công!');

    }
    //Đăng nhập
    public function dangnhap_khachhang(Request $request){
        $email=$request->dangnhap_email;
        $password=md5($request->dangnhap_password);
        $result = DB::table('tbl_khachhang')
        ->where('khachhang_email',$email)
        ->where('khachhang_password',$password)->first();
        if($result){
            Session::put('khachhang_id',$result->khachhang_id);
            Session::put('khachhang_ten',$result->khachhang_ten);
            Session::put('khachhang_diachi',$result->khachhang_diachi);
            Session::put('khachhang_sdt',$result->khachhang_sdt);
            Session::put('khachhang_email',$result->khachhang_email);
            return redirect()->back()->with('notice','Đã đăng nhập thành công!');
        }else{
            echo '<script>alert("Email hoặc mật khẩu không chính xác!")</script>'; 
            return redirect()->back()->with('notice','Đăng nhập không thành công!');
        } 
    }
    //Đăng xuất
    public function logout_khachhang(){
        Session::put('khachhang_ten',null);
        Session::put('khachhang_id',null);

        return redirect('/')->with('notice','Đăng xuất thành công thành công!');
    }

    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return redirect('admin_home');
        }else{
            return redirect('/admin')->send();
        }
    }
    //Backend
    public function lietke_khachhang(){
        $this->AuthLogin();
        $data_khachhang = Khachhang::paginate(8);
        return view('admin.khachhang.lietke')->with(compact('data_khachhang'));
    }

    
}
