<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Login;


session_start();

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return redirect('/admin_home');
        }else{
            return redirect('/admin')->send();
        }
    }

    public function index()
    {
        return view('admin_login');
    }

    public function __construct(){
        @session_start();
    }

    public function show_dashboard()
    {
        $this->AuthLogin();
        //$select_donhang=DB::table('tbl_donhang')->orderBy('donhang_id','desc')->get();
        //$select_sanpham=DB::table('tbl_sanpham')->orderBy('sanpham_id','desc')->get();
        //$select_khachhang=DB::table('tbl_khachhang')->orderBy('khachhang_id','desc')->get();
        //$select_binhluan=DB::table('tbl_binhluan')->orderBy('binhluan_id','desc')->get();
        return view('admin.admin_home');
    }

    public function login(Request $request)
    {
        $admin_email = $request->input('admin_email');
        $admin_password = md5($request->input('admin_password'));

        $result = Login::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        //$result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        
        if($result){
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);
            Session::put('admin_password', $result->admin_password);
            Session::put('admin_sdt', $result->admin_phone);
            Session::put('admin_email', $result->admin_email);

            return redirect('/admin_home');
        }else{
            return redirect('/admin')->with('notice', 'Tài khoản hoặc mật khẩu chưa chính xác !');
        }
    }


    public function logout()
    {
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return view('admin_login');
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
        //
    }
}
