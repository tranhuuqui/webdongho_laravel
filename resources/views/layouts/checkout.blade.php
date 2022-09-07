@extends('index_layout')
@section('content')
    <section class="breadcrumbbar">
        <div class="container">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active"><a>Checkout</a></li>
            </ol>
            <br>
            <hr>
        </div>
    </section>
    
    <section class="content my-4">
        <form action="{{URL::to('/thanhtoan-giohang')}}" method="POST">
            @csrf
        <div class="container">
            <div class="informations">
                <h3 style="color: blue;">Thông tin khách hàng</h3>
                <?php
                    $khachhang_id=session('khachhang_id');
                    $khachhang_ten=session('khachhang_ten');
                    $khachhang_diachi=session('khachhang_diachi');
                    $khachhang_sdt=session('khachhang_sdt');
                    $khachhang_email=session('khachhang_email');
                ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="shopper-info">
                                <label>Tên khách hàng:</label>
                                    <input type="hidden" name="khachhang_id" value="{{$khachhang_id}}">
                                    <input type="text" name="khachhang_ten" class="form-control" value="{{$khachhang_ten}}" disabled><br>
                                <label>email:</label>
                                    <input type="text" class="form-control" value="{{$khachhang_email}}" disabled><br>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="shopper-info">  
                                <label>Địa chỉ:</label>
                                    <input type="text" class="form-control" value="{{$khachhang_diachi}}" disabled><br>
                                <label>Số điện thoại:</label>
                                    <input type="text" class="form-control" value="{{$khachhang_sdt}}" disabled><br>  
                                </div>	
                            </div>
                        
                    </div>
                    <div>
                        <br>
                        <hr>
                    <h3 style="color: blue;">Địa chỉ nhận hàng</h3>
                      <?php
                        $xa = session('xaphuong');
                        $huyen = session('quanhuyen');
                        $tinh = session('thanhpho');
                      ?>
                        <div class="form-group">
                            <input type="text" name="diachinhanhang" class="form-control" value="{{session('sonha')}}, {{$xa}}, {{$huyen}}, {{$tinh}}" disabled>
                            <input type="hidden" name="diachinhanhang" value="{{session('sonha')}}, {{$xa}}, {{$huyen}}, {{$tinh}}">
                        </div>         
                </div>
            </div>
         <br><br>
            <hr>
            <h3 style="color: blue;">Giỏ hàng</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng giá</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $stt = 0;
                        $tong = 0;
                    ?>
                    @foreach($carts as $cart)
                        <?php 
                            $stt++;
                            $tong += $cart['gia'] * $cart['soluong'];
                        ?>
                            <tr>
                                <th scope="row">{{$stt}}</th>
                                <td>{{$cart['ten']}}</td>
                                <td><img src="{{URL::to('uploads/'.$cart['hinhanh'])}}" alt="" width="100px" height="80px"></td>
                                <td>{{number_format($cart['gia'])}} VNĐ</td> 
                                <td>{{$cart['soluong']}}</td>
                                </td>
                                <td>{{number_format($cart['gia'] * $cart['soluong'])}} VNĐ</td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <hr>
            <?php
              $magiamgia = session('magiamgia');
            ?>
            @if($magiamgia)
                <?php
                  if($magiamgia['magiamgia_tinhnang']==1){
                    $tong_giamgia = ($tong*$magiamgia['magiamgia_giagiam'])/100;
                ?>
                  <br>
                  <h5>Tổng giá: {{number_format($tong)}} VNĐ</h5>
                  <p>Giá giảm: - {{number_format($tong_giamgia)}} VNĐ (-{{$magiamgia['magiamgia_giagiam']}}%)</p>
                  <p>Phí vận chuyển: {{number_format(session('phivanchuyen'))}} VNĐ </p>
                  <h4 style="color:red;">Tổng cần thanh toán: {{number_format($tong - $tong_giamgia + session('phivanchuyen'))}} VNĐ</h4>
                  <input type="hidden" name="tonggia" value="{{$tong - $tong_giamgia + session('phivanchuyen')}}">
                <?php
                  }elseif($magiamgia['magiamgia_tinhnang']==2){
                ?>
                  <br>
                  <h5>Tổng giá: {{number_format($tong)}} VNĐ</h5>
                  <p>Giá giảm: - {{number_format($magiamgia['magiamgia_giagiam'])}} VNĐ</p>
                  <p>Phí vận chuyển: {{number_format(session('phivanchuyen'))}} VNĐ </p>
                  <h4 style="color:red;">Tổng cần thanh toán: {{number_format($tong-$magiamgia['magiamgia_giagiam'] + session('phivanchuyen'))}} VNĐ</h4>
                  <input type="hidden" name="tonggia" value="{{$tong-$magiamgia['magiamgia_giagiam'] + session('phivanchuyen')}}">
                <?php
                  }
                ?>
            @endif
            @if(!$magiamgia)
                <h3 style="color: blue;">Thanh toán</h3><br>
              <p>Tổng giá: {{number_format($tong)}} VNĐ</p>
              <p>Phí vận chuyên: {{number_format(session('phivanchuyen'))}} VNĐ </p>
              <h4 style="color:red;">Tổng cần thanh toán: {{number_format($tong + session('phivanchuyen'))}} VNĐ</h4>
              <input type="hidden" name="tonggia" value="{{$tong + session('phivanchuyen')}}">
            @endif
            <input type="hidden" name="phivanchuyen" value="{{session('phivanchuyen')}}">
            <?php 
                $magiamgia = session('magiamgia');
                if($magiamgia){
            ?>
            <input type="hidden" name="magiamgia" value="{{$magiamgia['magiamgia_ma']}}">
            <?php
                }else{
            ?>
            <input type="hidden" name="magiamgia" value="0">
            <?php
                }
            ?>
            <button class="btn btn-primary" onclick="return confirm('Nhấn OK đặt hàng')">Đặt hàng</button>
        </div>
        </form>
    </section>
@endsection