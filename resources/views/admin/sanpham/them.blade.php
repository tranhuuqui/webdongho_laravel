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
                <h3 class="card-title">Thêm sản phẩm</h3>
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
                    <form role="form" action="{{URL::to('/luu-sanpham')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                    <div class="form-group row">
                      <div class="col-md-2">
                        <label for="sanphamTen">Tên sản phẩm:</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="sanpham_ten" required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-2">
                        <label for="sanphamHinhanh">Hình ảnh:</label>
                      </div>
                      <div class="col-md-8">
                        <input type="file"  class="form-control" name="sanpham_hinhanh"  require="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-2">
                        <label for="sanphamGia">Giá sản phẩm:</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="sanpham_gia" require="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-2">
                        <label for="sanphamSoluong">Số lượng:</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="sanpham_soluong"  require="">
                      </div>
                    </div>
                    <div class="form-group row" >
                      <div class="col-md-2">
                        <label for="sanphamDanhmuc">Danh mục sản phẩm:</label>
                      </div>
                      <div class="col-md-8">
                        <select name="sanpham_danhmuc" class="form-control ">
                            @foreach($danhmuc as $data_danhmuc)
                              <option value="{{$data_danhmuc->danhmuc_id}}">{{$data_danhmuc->danhmuc_ten}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row" >
                      <div class="col-md-2">
                        <label for="sanphamThuonghieu">Thương hiệu:</label>
                      </div>
                      <div class="col-md-8">
                        <select name="sanpham_thuonghieu" class="form-control ">
                          @foreach($thuonghieu as $data_thuonghieu)
                            <option value="{{$data_thuonghieu->thuonghieu_id}}">{{$data_thuonghieu->thuonghieu_ten}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-2">
                        <label for="sanphamMota">Mô tả:</label>
                      </div>
                      <div class="col-md-8">
                        <textarea style="resize:none" row="8" class="form-control" id="ckeditor1" name="sanpham_mota" require=""></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-2">
                        <label for="sanphamNoidung">Nội dung:</label>
                      </div>
                      <div class="col-md-8">
                        <textarea style="resize:none" row="8" class="form-control" id="ckeditor" name="sanpham_noidung" require=""></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-2">
                        <label for="sanphamAlias">Sản phẩm SKU:</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="sanpham_sku" require="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-2">
                        <label for="sanphamTrangthai">Trạng thái:</label>
                      </div>
                      <div class="col-md-8">
                        <select name="sanpham_trangthai" class="form-control ">
                          <option value="1">Kích hoạt</option>
                          <option value="0">Không</option>
                        </select>
                      </div>
                    </div>
                                        
                        <button type="submit" name="them_danhmuc" class="btn btn-primary">Thêm</button>
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