@extends('admin_layout')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quản lý thành viên</h1>
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
                <h3 class="card-title">Danh sách thành viên</h3>
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
                    <th style="text-align: center;">Tên thành viên</th>
                    <th style="text-align: center;">Số điện thoại</th>
                    <th style="text-align: center;">Email</th>
                    <th style="text-align: center;">Password</th>
                    <th style="text-align: center;">Địa chỉ</th>
                    <th style="text-align: center;" >Quản lý</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $STT=0;
                  ?>
                  @foreach($data_khachhang as $khachhang)
                  <?php
                    $STT++;
                  ?>
                    <tr>
                      <td style="text-align: center;">
                        {{$STT}}
                      </td>
                      <td class="a" style="text-align: center;">{{$khachhang->khachhang_ten}}</td>
                      <td class="a" style="text-align: center;">{{$khachhang->khachhang_sdt}}</td>
                      <td class="a" style="text-align: center;">{{$khachhang->khachhang_email}}</td>
                      <td class="a" style="text-align: center;">{{$khachhang->khachhang_password}}</td>
                      <td class="a" style="text-align: center;">{{$khachhang->khachhang_diachi}}</td>
                      <td style="text-align: center;">
                        <a href="{{URL::to('/xoa-khachhang/'.$khachhang->khachhang_id)}}" class="active" ui-toggle-class="" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fa fa-times text-danger"></i></a>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <div style="padding-left: 18px;">
                  {!! $data_khachhang->render() !!}
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