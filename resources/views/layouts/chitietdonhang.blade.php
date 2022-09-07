@extends('index_layout')
@section('content')
    <section class="breadcrumbbar">
        <div class="container">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{URL::to('/xem-donhang/'.$khachhang->khachhang_id)}}">Đơn hàng</a></li>
                <li class="breadcrumb-item active"><a href="#">Chi tiết đơn hàng của bạn</a></li>
            </ol>
            <br>
            <hr>
        </div>
    </section>

    <!-- các sản phẩm  -->
    <section class="content my-4">
        <div class="container">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="text-align: center;">Tên khách hàng</th>
                        <th style="text-align: center;">Số điện thoại</th>
                        <th style="text-align: center;">Email</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td class="a" style="text-align: center;">{{$khachhang->khachhang_ten}}</td>
                        <td class="a" style="text-align: center;">{{$khachhang->khachhang_sdt}}</td>
                        <td class="a" style="text-align: center;">{{$khachhang->khachhang_email}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!--het container-->
    </section>
    <section class="content my-4">
        <div class="container">
        <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th style="text-align: center;">Đơn hàng mã</th>
                    <th style="text-align: center;">Sản phẩm id</th>
                    <th style="text-align: center;">Sản phẩm tên</th>
                    <th style="text-align: center;">Sản phẩm giá</th>
                    <th style="text-align: center;">Số lượng</th>
                    <th style="text-align: center;">Tổng giá</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                        $tong=0;
                      ?>
                    @foreach($donhang_chitiet as $dhct)
                    <tr>
                      <td class="a" style="text-align: center;">{{$dhct->donhang_ma}}</td>
                      <td class="a" style="text-align: center;">{{$dhct->sanpham_id}}</td>
                      <td class="a" style="text-align: center;">{{$dhct->sanpham_ten}}</td>
                      <td class="a" style="text-align: center;">{{number_format($dhct->sanpham_gia)}} VNĐ</td>
                      <td class="a" style="text-align: center;">{{$dhct->sanpham_soluong_mua}}</td>
                      <?php
                        $tonggia = $dhct->sanpham_gia * $dhct->sanpham_soluong_mua;
                        $tong += $tonggia;   
                        $phivanchuyen = $dhct->phivanchuyen;   
                      ?>
                      <td class="a" style="text-align: center;">{{number_format($tonggia)}} VNĐ</td>
                    </tr>
                    @endforeach
                    @if($magiamgia)
                    <tr>
                    <td colspan="6">
                        <?php
                          $mgg = $magiamgia->magiamgia_giagiam;
                          $mgg_tn = $magiamgia->magiamgia_tinhnang;
                          $tonggiam = 0;
                        ?>
                        @if($mgg_tn==1)
                          <?php
                            $tonggiam = ($tong * $mgg)/100;
                            echo 'Giảm:-'.$mgg.'%';
                          ?><br>
                          Phí vận chuyển: {{number_format($phivanchuyen)}} VNĐ
                          <br>
                        @else
                          <?php
                            $tonggiam = $mgg;
                            echo 'Giảm:-'.number_format($mgg).'VND';
                          ?>
                          <br>
                          Phí vận chuyển: {{number_format($phivanchuyen)}} VNĐ
                          <br>
                        @endif

                        Thanh toán: {{number_format($tong - $tonggiam + $phivanchuyen)}} VNĐ</td>
                    </tr>
                    @else
                      <tr>
                        
                        <td colspan="6">
                          Phí vận chuyển:{{number_format($phivanchuyen)}} VNĐ <br>
                          Thanh toán: {{number_format($tong + $phivanchuyen)}} VNĐ </td>

                      </tr>
                    @endif
                  </tbody>
                </table>
        </div>
        <!--het container-->
    </section>
    
@endsection