@extends('admin_layout')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quản lý sản phẩm</h1>
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
                <h3 class="card-title">Thông số kỹ thuật</h3>
                <a href="{{URL::to('/lietke-sanpham')}}" style="float: right;"><button class="btn btn-primary">Trở về</button></a>
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
                    <form role="form" action="{{URL::to('/luu-thongsokythuat/'.$thongsokythuat->sanpham_id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="sanphamTen">ID sản phẩm:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="sanpham_id" value="{{$thongsokythuat->sanpham_id}}" disabled required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="sanphamTen">Tên sản phẩm:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="sanpham_ten" value="{{$thongsokythuat->sanpham_ten}}" disabled required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="sanphamTen">Màn hình:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="man_hinh" value="{{$thongsokythuat->man_hinh}}"  required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="sanphamTen">Thời lượng pin:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="thoi_luong_pin" value="{{$thongsokythuat->thoi_luong_pin}}"  required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="sanphamTen">Kết nối hệ điều hành:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="ket_noi" value="{{$thongsokythuat->ket_noi}}"  required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="sanphamTen">Mặt:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="mat" value="{{$thongsokythuat->mat}}"  required="">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="sanphamTen">Tính năng cho sức khỏe:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="tinh_nang_suc_khoe" value="{{$thongsokythuat->tinh_nang_suc_khoe}}"  required="">
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="sanpham_gia" value="{{$thongsokythuat->sanpham_gia}}"  required="">
                        <input type="hidden" class="form-control" name="sanpham_hinhanh" value="{{$thongsokythuat->sanpham_hinhanh}}"  required="">
                        <input type="hidden" class="form-control" name="sanpham_soluong" value="{{$thongsokythuat->sanpham_soluong}}"  required="">
                        <input type="hidden" class="form-control" name="sanpham_mota" value="{{$thongsokythuat->sanpham_mota}}"  required="">
                        <input type="hidden" class="form-control" name="sanpham_noidung" value="{{$thongsokythuat->sanpham_noidung}}"  required="">
                        <input type="hidden" class="form-control" name="sanpham_sku" value="{{$thongsokythuat->sanpham_sku}}"  required="">
                        <input type="hidden" class="form-control" name="sanpham_danhmuc" value="{{$thongsokythuat->danhmuc_id}}"  required="">
                        <input type="hidden" class="form-control" name="sanpham_thuonghieu" value="{{$thongsokythuat->thuonghieu_id}}"  required="">
                        <input type="hidden" class="form-control" name="sanpham_trangthai" value="{{$thongsokythuat->sanpham_trangthai}}"  required="">
                        <button type="submit" name="luu_thongsokythuat" class="btn btn-primary">Lưu</button>
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