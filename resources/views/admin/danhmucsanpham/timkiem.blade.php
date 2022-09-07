@extends('admin_layout')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quản lý danh mục sản phẩm</h1>
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
            <div class="card-header">
                <h3 class="card-title">Kết quả tìm kiếm</h3>
              </div>
            <div class="row " style="padding-top: 20px;">
                <div class="col-sm-7">        
                </div>
                <div class="col-sm-1" style="padding-left: 70px;">
                    <a href="{{URL::to('/them-danhmucsanpham')}}"><button class="btn btn-primary">Thêm</button></a>
                </div>
                <div class="col-sm-4" style="padding-left: 70px;">
                  <form class="form-inline" action="{{URL::to('/timkiem_danhmucsanpham')}}" method="POST">
                    {{csrf_field()}}
                    <input type="text" class="form-control" name="search_dmsp"  placeholder="Nhập tên danh mục...">
                    <span>
                      <button class="btn btn-default" type="submit">Tìm</button>
                    </span>
                  </form>
                </div>
            </div>
            <div class="card-body"> 
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th style="text-align: center;">STT</th>
                    <th style="text-align: center;">Tên danh mục</th>
                    <th style="text-align: center;">Trạng thái</th>
                    <th colspan="2" style="text-align: center;" >Quản lý</th>
                  </tr>
                  </thead>
                  <tbody class="listDanhmuc">
                  <?php
                    $STT=0;
                  ?>
                  @foreach($danhmuc_timkiem as $danhmuc)
                  <?php
                    $STT++;
                  ?>
                    <tr>
                      <td style="text-align: center;">
                        {{$STT}}
                      </td>
                      <td class="a" style="text-align: center;">{{$danhmuc->danhmuc_ten}}</td>
                      <td style="text-align: center;"><span class="text-ellipsis">
                        <?php 
                          if($danhmuc->danhmuc_trangthai==0){
                        ?>
                        <a href="{{URL::to('/unactive-danhmuc/'.$danhmuc->danhmuc_id)}}"><span class="text text-danger">Chưa kích hoạt</span></a>
                        <?php
                          }else{
                        ?>
                        <a href="{{URL::to('/active-danhmuc/'.$danhmuc->danhmuc_id)}}"><span class="text text-success">Kích hoạt</span></a>
                        <?php                
                          }
                        ?>
                      </span></td>
                      <td style="text-align: center;">
                        <a href="{{URL::to('/capnhat-danhmucsanpham/'.$danhmuc->danhmuc_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-alt"></i></a>
                      </td>
                      <td style="text-align: center;">
                        <a href="{{URL::to('/xoa-danhmucsanpham/'.$danhmuc->danhmuc_id)}}" class="active" ui-toggle-class="" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fa fa-times text-danger"></i></a>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <div style="padding-left: 18px;">
                  {!! $danhmuc_timkiem->render() !!}
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