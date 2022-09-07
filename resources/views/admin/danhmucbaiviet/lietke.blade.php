@extends('admin_layout')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quản lý danh mục bài viết</h1>
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
                <h3 class="card-title">Danh sách danh mục bài viết</h3>
              </div>
            <div class="row " style="padding-top: 20px;">
                <div class="col-sm-10">        
                </div>
                <div class="col-sm-2" style="padding-left: 70px;">
                    <a href="{{URL::to('/them-danhmucbaiviet')}}"><button class="btn btn-primary">Thêm</button></a>
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
                    <th style="text-align: center;">Tên danh mục</th>
                    <th style="text-align: center;">Trạng thái</th>
                    <th colspan="2" style="text-align: center;" >Quản lý</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $STT=0;
                  ?>
                  @foreach($data_danhmuc as $danhmuc)
                  <?php
                    $STT++;
                  ?>
                    <tr>
                      <td style="text-align: center;">
                        {{$STT}}
                      </td>
                      <td class="a" style="text-align: center;">{{$danhmuc->danhmucbaiviet_ten}}</td>
                      <td style="text-align: center;"><span class="text-ellipsis">
                        <?php 
                          if($danhmuc->danhmucbaiviet_trangthai==0){
                        ?>
                        <a href="{{URL::to('/unactive-danhmuc/'.$danhmuc->danhmucbaiviet_id)}}"><span class="text text-danger">Chưa kích hoạt</span></a>
                        <?php
                          }else{
                        ?>
                        <a href="{{URL::to('/active-danhmuc/'.$danhmuc->danhmucbaiviet_id)}}"><span class="text text-success">Kích hoạt</span></a>
                        <?php                
                          }
                        ?>
                      </span></td>
                      <td style="text-align: center;">
                        <a href="{{URL::to('/capnhat-danhmucbaiviet/'.$danhmuc->danhmucbaiviet_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-alt"></i></a>
                      </td>
                      <td style="text-align: center;">
                        <a href="{{URL::to('/xoa-danhmucbaiviet/'.$danhmuc->danhmucbaiviet_id)}}" class="active" ui-toggle-class="" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fa fa-times text-danger"></i></a>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <div style="padding-left: 18px;">
                  {!! $data_danhmuc->render() !!}
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