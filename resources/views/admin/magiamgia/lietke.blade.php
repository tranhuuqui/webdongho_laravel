@extends('admin_layout')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quản lý mã giảm giá</h1>
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
                    <h3 class="card-title">Danh sách mã giảm giá</h3>
                </div>
                <div class="row " style="padding-top: 20px;">
                    <div class="col-sm-7">        
                    </div>
                    <div class="col-sm-1" style="padding-left: 70px;">
                        <a class="btn btn-primary" href="{{URL::to('/them-magiamgia')}}">Thêm</a>
                    </div>
                    <div class="col-sm-4" style="padding-left: 70px;">
                    <form class="form-inline" action="{{URL::to('/timkiem_magiamgia')}}" method="POST">
                        {{csrf_field()}}
                        <input type="text" class="form-control" name="search_mgg"  placeholder="Nhập tên mã giảm giá...">
                        <span>
                        <button class="btn btn-default" type="submit">Tìm</button>
                        </span>
                    </form>
                    </div>
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
                    <th style="text-align: center;">Tên mã giảm giá</th>
                    <th style="text-align: center;">Mã giảm giá</th>
                    <th style="text-align: center;">Số lượng</th>
                    <th style="text-align: center;">Kiểu giảm giá</th>
                    <th style="text-align: center;">Số giảm</th>
                    <th colspan="2" style="text-align: center;" >Quản lý</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $STT=0;
                  ?>
                  @foreach($data_magiamgia as $magiamgia)
                  <?php
                    $STT++;
                  ?>
                    <tr>
                      <td style="text-align: center;">
                        {{$STT}}
                      </td>
                      <td class="a" style="text-align: center;">{{$magiamgia->magiamgia_ten}}</td>
                      <td class="a" style="text-align: center;">{{$magiamgia->magiamgia_ma}}</td>
                      <td class="a" style="text-align: center;">{{$magiamgia->magiamgia_soluong}}</td>
                      <?php
                        if($magiamgia->magiamgia_tinhnang==1){
                      ?>
                        <td class="a" style="text-align: center;">Giảm theo %</td>
                      <?php
                        }else{
                      ?>
                        <td class="a" style="text-align: center;">Giảm theo số tiền</td>
                      <?php 
                        } 
                      ?>

                      <?php
                        if($magiamgia->magiamgia_tinhnang==1){
                      ?>
                        <td class="a" style="text-align: center;">Giảm {{$magiamgia->magiamgia_giagiam}}%</td>
                      <?php
                        }else{
                      ?>
                        <td class="a" style="text-align: center;">Giảm {{number_format($magiamgia->magiamgia_giagiam)}} VNĐ</td>
                      <?php 
                        } 
                      ?>
                      <td style="text-align: center;">
                        <a href="{{URL::to('/xoa-magiamgia/'.$magiamgia->magiamgia_id)}}" class="active" ui-toggle-class="" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fa fa-times text-danger"></i></a>
                      </td>
                    </tr>
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