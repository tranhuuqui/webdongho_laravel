<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TinhThanhpho;
use App\Models\QuanHuyen;
use App\Models\XaPhuong;
use App\Models\Phivanchuyen;
use Illuminate\Support\Facades\Session;

class PhivanchuyenController extends Controller
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
        $thanhpho = TinhThanhpho::orderby('matp','ASC')->get();
        return view('admin.phivanchuyen.lietke')->with(compact('thanhpho'));
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

    public function chon_khuvuc(Request $request){
        $data = $request->all();
        $output = '';
        if($data['action']=='thanhpho'){
            $output .='<option>---Chọn quận/huyện---</option>';
            $select_quanhuyen = QuanHuyen::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
            foreach($select_quanhuyen as $key =>$quanhuyen){
                $output.='<option value="'.$quanhuyen->maqh.'">'.$quanhuyen->name_quanhuyen.'</option>';
            }
        }else{
            $output .='<option>---Chọn xã/phường/thị trấn---</option>';
            $select_xaphuong = XaPhuong::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
            foreach($select_xaphuong as $key =>$xaphuong){
                $output.='<option value="'.$xaphuong->xaid.'">'.$xaphuong->name_xaphuong.'</option>';
            }
        }
        echo $output;
    }

    public function them_phivanchuyen(Request $request){
        $data = $request->all();
        $phivanchuyen = new Phivanchuyen();
        $phivanchuyen->phivanchuyen_matp = $data['thanhpho'];
        $phivanchuyen->phivanchuyen_maqh = $data['quanhuyen'];
        $phivanchuyen->phivanchuyen_xaid = $data['xaphuong'];
        $phivanchuyen->phivanchuyen_gia = $data['phivanchuyen'];
        $phivanchuyen->save();
    }

    public function select_phivanchuyen(){
        $phivanchuyen = Phivanchuyen::orderby('phivanchuyen_id','DESC')->get();
        $output = '';
        $output .= '<div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Tên tỉnh/thành phố</th>
                                    <th>Tên quận/huyện</th>
                                    <th>Tên xã/phường</th>
                                    <th>Phí vận chuyển</th>
                                </tr>
                            </thead>
                            <tbody>';
                            foreach($phivanchuyen as $phi){
                    
                    $output .=' <tr>
                                    <td>'.$phi->TinhThanhpho->name_tinhthanhpho.'</td>
                                    <td>'.$phi->QuanHuyen->name_quanhuyen.'</td>
                                    <td>'.$phi->XaPhuong->name_xaphuong.'</td>
                                    <td contenteditable data-phivanchuyen_id="'.$phi->phivanchuyen_id.'" class="phivanchuyen_capnhat">'.number_format($phi->phivanchuyen_gia).'</td>
                                </tr>';
                            }
                                  
                $output .=' </tbody>
                        </table>
                    </div>';
        echo $output;
    }

    public function capnhat_phivanchuyen(Request $request){
        $data = $request->all();

        $phivanchuyen = Phivanchuyen::find($data['phivanchuyen_id']);
        $phivanchuyen_gia = rtrim($data['phivanchuyen_gia'],',');
        $phivanchuyen->phivanchuyen_gia = $phivanchuyen_gia;
        $phivanchuyen->save();
    }
}
