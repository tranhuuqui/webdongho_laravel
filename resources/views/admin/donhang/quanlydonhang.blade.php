@extends('admin_layout')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quản lý đơn hàng</h1>
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
                <h3 class="card-title">Danh sách đơn hàng</h3>
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
                    <th style="text-align: center;">STT</th>
                    <th style="text-align: center;">Mã đơn hàng</th>
                    <th style="text-align: center;" >Trạng thái</th>
                    <th style="text-align: center;">Tổng giá</th>
                    <th style="text-align: center;">Tên khách hàng</th>
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
                        <a href="{{URL::to('/duyet-donhang/'.$dh->donhang_id)}}"><span class="text text-danger">Chưa duyệt</span></a>
                        <?php
                          }elseif($dh->donhang_trangthai==2){
                        ?>
                        <span class="text text-success">Đã duyệt</span>
                        <?php                
                          }else{
                        ?>
                        <span class="text text-secondary">Đã hủy</span>
                        <?php
                          }
                        ?>
                      </span></td>

                      <td class="a" style="text-align: center;">{{number_format($dh->donhang_gia)}} VNĐ</td>
                      <td class="a" style="text-align: center;"><a href="" data-toggle="modal" data-target="#khachhang{{$dh->khachhang_id}}">{{$dh->khachhang['khachhang_ten']}}</a></td>
                      <td class="a" style="text-align: center;">{{$dh->diachi_nhanhang}}</td>
                      <td class="a" style="text-align: center;">{{$dh->thoigiandathang}}</td>
                      <td style="text-align: center;">
                        <a href="{{URL::to('/chitietdonhang/'.$dh->donhang_ma)}}" class="active" ui-toggle-class=""><i class="fa fa-eye"></i></a>
                      </td>
                      <td style="text-align: center;">
                        <a href="{{URL::to('/xoa-donhang/'.$dh->donhang_ma)}}" class="active" ui-toggle-class="" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fa fa-times text-danger"></i></a>
                      </td>
                    </tr>

                    <!-- Modal -->
                      <div class="modal fade" id="khachhang{{$dh->khachhang_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Thông tin khách hàng</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>Tên khách hàng:</p>
                              <input type="text" class="form-control" value="{{$dh->khachhang['khachhang_ten']}}" disabled>
                              <p>Số điện thoại:</p>
                              <input type="text" class="form-control" value="{{$dh->khachhang['khachhang_sdt']}}" disabled>
                              <p>Email:</p>
                              <input type="text" class="form-control" value="{{$dh->khachhang['khachhang_email']}}" disabled>
                              <p>Địa chỉ:</p>
                              <input type="text" class="form-control" value="{{$dh->khachhang['khachhang_diachi']}}" disabled>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                  @endforeach
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
    <!-- /.content -->
  </div>


@endsection