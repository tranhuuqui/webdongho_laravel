@extends('admin_layout')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quản lý Bài viết</h1>
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
                <h3 class="card-title">Thêm bài viết</h3>
                <a href="{{URL::to('/lietke-baiviet')}}" style="float: right;"><button class="btn btn-primary">Trở về</button></a>
              </div>
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
                <div class="card-body"> 
                <form role="form" action="{{URL::to('/luu-baiviet')}}" method="post" enctype="multipart/form-data">
                  @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề</label>
                                    <input type="text" class="form-control" name="baiviet_tieude" required="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file"  class="form-control" name="baiviet_hinhanh"  require="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả</label>
                                    <textarea row="8" class="form-control" name="baiviet_mota" require=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nội dung</label>
                                    <textarea row="8" class="form-control" id="ckeditor5" name="baiviet_noidung" require=""></textarea>
                                </div>
                                <div class="form-group" >
                                <label for="exampleInputEmail1">Danh mục bài viết</label>
                                    <select name="baiviet_danhmuc" class="form-control ">
                                        @foreach($danhmuc_baiviet as $data_danhmuc)
                                            <option value="{{$data_danhmuc->danhmucbaiviet_id}}">{{$data_danhmuc->danhmucbaiviet_ten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group" >
                                <label for="exampleInputEmail1">Trạng thái</label>
                                    <select name="baiviet_trangthai" class="form-control ">
                                        <option value="1">Kích hoạt</option>
                                        <option value="0">Không</option>
                                    </select>
                                </div>
                                
                                <button type="submit" name="them_baiviet" class="btn btn-primary">Thêm</button>
                            </form>
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