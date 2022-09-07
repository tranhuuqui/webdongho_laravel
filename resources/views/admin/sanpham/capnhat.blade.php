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
                <h3 class="card-title">Cập nhật sản phẩm</h3>
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
                    <form role="form" action="{{URL::to('/luucapnhat-sanpham/'.$sanpham_capnhat->sanpham_id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group row">
                      <div class="col-md-2">
                        <label for="sanphamTen">Tên sản phẩm:</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="sanpham_ten" value="{{$sanpham_capnhat->sanpham_ten}}" required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-2">
                        <label for="sanphamHinhanh">Hình ảnh:</label>
                      </div>
                      <div class="col-md-8">
                        <input type="file"  class="form-control" name="sanpham_hinhanh"  require="">
                        <img src="{{url('uploads')}}/{{$sanpham_capnhat->sanpham_hinhanh}}" width="80" height="80" alt="uploads/{{$sanpham_capnhat->sanpham_hinhanh}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-2">
                        <label for="sanphamGia">Giá sản phẩm:</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="sanpham_gia" value="{{$sanpham_capnhat->sanpham_gia}}" require="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-2">
                        <label for="sanphamSoluong">Số lượng:</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="sanpham_soluong" value="{{$sanpham_capnhat->sanpham_soluong}}"  require="">
                      </div>
                    </div>
                    <div class="form-group row" >
                      <div class="col-md-2">
                        <label for="sanphamDanhmuc">Danh mục sản phẩm:</label>
                      </div>
                      <div class="col-md-8">
                        <select name="sanpham_danhmuc" class="form-control ">
                            @foreach($danhmuc as $data_danhmuc)
                                @if($data_danhmuc->danhmuc_id==$sanpham_capnhat->danhmuc_id)
                                    <option selected value="{{$data_danhmuc->danhmuc_id}}">{{$data_danhmuc->danhmuc_ten}}</option>
                                @else
                                    <option value="{{$data_danhmuc->danhmuc_id}}">{{$data_danhmuc->danhmuc_ten}}</option>
                                @endif
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
                            @if($data_thuonghieu->thuonghieu_id==$sanpham_capnhat->thuonghieu_id)
                                <option selected value="{{$data_thuonghieu->thuonghieu_id}}">{{$data_thuonghieu->thuonghieu_ten}}</option>
                            @else
                                <option value="{{$data_thuonghieu->thuonghieu_id}}">{{$data_thuonghieu->thuonghieu_ten}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-2">
                        <label for="sanphamMota">Mô tả:</label>
                      </div>
                      <div class="col-md-8">
                        <textarea style="resize:none" row="8" class="form-control" id="ckeditor1" name="sanpham_mota" require="">{{$sanpham_capnhat->sanpham_mota}}</textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-2">
                        <label for="sanphamNoidung">Nội dung:</label>
                      </div>
                      <div class="col-md-8">
                        <textarea style="resize:none" row="8" class="form-control" id="ckeditor" name="sanpham_noidung" require="">{{$sanpham_capnhat->sanpham_noidung}}</textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-2">
                        <label for="sanphamAlias">Sản phẩm SKU:</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="sanpham_sku" value="{{$sanpham_capnhat->sanpham_sku}}" require="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-2">
                        <label for="sanphamTrangthai">Trạng thái:</label>
                      </div>
                      <div class="col-md-8">
                        <select name="sanpham_trangthai" class="form-control ">
                            @if($sanpham_capnhat->sanpham_trangthai==1)
                                <option selected value="1">Kích hoạt</option>
                                <option value="0">Không</option>
                            @else
                                <option value="1">Kích hoạt</option>
                                <option selected value="0">Không</option>
                            @endif
                        </select>
                      </div>
                    </div>
                                        
                        <button type="submit" name="capnhat_sanpham" class="btn btn-primary">Cập nhật</button>
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