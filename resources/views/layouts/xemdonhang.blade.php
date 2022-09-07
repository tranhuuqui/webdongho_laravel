@extends('index_layout')
@section('content')
    <section class="breadcrumbbar">
        <div class="container">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active"><a href="#">Đơn hàng của bạn</a></li>
            </ol>
            <br>
            <hr>
        </div>
    </section>

    <!-- các sản phẩm  -->
    <section class="content my-4">
        <div class="container">
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
                    <th style="text-align: center;">STT</th>
                    <th style="text-align: center;">Mã đơn hàng</th>
                    <th style="text-align: center;" >Trạng thái</th>
                    <th style="text-align: center;" >Tính trạng hủy</th>
                    <th style="text-align: center;">Tổng giá</th>
                    <th style="text-align: center;">Địa chỉ nhận hàng</th>
                    <th style="text-align: center;">Thời gian đặt hàng</th>
                    <th colspan="2" style="text-align: center;" >Quản lý</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $STT=0;
                  ?>
                  @foreach($donhang as $dh)
                  <?php
                    $STT++;
                  ?>
                    <tr>
                      <td style="text-align: center;">
                        {{$STT}}
                      </td>
                      <td class="a" style="text-align: center;">{{$dh->donhang_ma}}</td>

                      <td style="text-align: center;"><span class="text-ellipsis">
                        <?php 
                          if($dh->donhang_trangthai==1){
                        ?>
                        <span class="text text-primary">Đang chờ duyệt</span>
                        <?php
                          }elseif($dh->donhang_trangthai==2){
                        ?>
                        <span class="text text-success">Đang giao hàng...</span>
                        <?php                
                          }else{
                        ?>
                        <span class="text text-danger">Đơn hàng đã được hủy...</span>
                        <?php                
                          }
                        ?>
                      </span></td>

                      <td style="text-align: center;"><span class="text-ellipsis">
                        <?php 
                          if($dh->donhang_trangthai==1){
                        ?>
                        <span class="text text-primary"><a href="{{URL::to('/huy-donhang/'.$dh->donhang_id)}}" style="color: blue;">Yêu cầu hủy</a></span>
                        <?php
                          }elseif($dh->donhang_trangthai==2){
                        ?>
                        <span class="text text-success">Đơn hàng đang giao...</span>
                        <?php                
                          }else{
                        ?>
                        <span class="text text-danger">Đơn hàng đã được hủy...</span>
                        <?php                
                          }
                        ?>
                      </span></td>

                      <td class="a" style="text-align: center;">{{number_format($dh->donhang_gia)}} VNĐ</td>
                      <td class="a" style="text-align: center;">{{$dh->diachi_nhanhang}}</td>
                      <td class="a" style="text-align: center;">{{$dh->thoigiandathang}}</td>
                      <td style="text-align: center;">
                        <a href="{{url('/chitiet-donhang/'.$dh->donhang_ma)}}" style="color: blue;">Chi tiết</a>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
        </div>
        <!--het container-->
    </section>
    
@endsection