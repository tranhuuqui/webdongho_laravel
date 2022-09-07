@extends('admin_layout')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quản lý chi tiết đơn hàng</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Thông tin khách hàng</h3>
              </div>
            
            <div class="card-body"> 
            @if(session('success'))
                <div class="alert alert-success">
                  {{session('success')}}
                </div>
              @endif
              @if(session('error'))
                <div class="alert alert-danger">
                  {{session('error')}}
                </div>
              @endif
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
              <div style="padding-left: 18px;">
                  
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Chi tiết đon hàng</h3>
              </div>
            
            <div class="card-body"> 
            @if(session('success'))
                <div class="alert alert-success">
                  {{session('success')}}
                </div>
              @endif
              @if(session('error'))
                <div class="alert alert-danger">
                  {{session('error')}}
                </div>
              @endif
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
                <a target="_blank" href="{{url('/indonhang/'.$donhang_select_code->donhang_ma)}}">In đơn hàng</a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  </div>

@endsection