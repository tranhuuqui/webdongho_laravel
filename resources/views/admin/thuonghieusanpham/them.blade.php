@extends('admin_layout')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quản lý thương hiệu sản phẩm</h1>
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
                <h3 class="card-title">Thêm thương hiệu sản phẩm</h3>
                <a href="{{URL::to('/lietke-thuonghieusanpham')}}" style="float: right;"><button class="btn btn-primary">Trở về</button></a>
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
                    <form role="form" action="{{URL::to('/luu-thuonghieusanpham')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" class="form-control" name="thuonghieu_ten" placeholder="Nhập tên danh mục">
                        </div>
                        <div>
                            <label for="exampleInputEmail1">Trạng thái</label>
                                <select name="thuonghieu_trangthai" class="form-control ">
                                    <option value="1">Kích hoạt</option>
                                    <option value="0">Không</option>
                                </select>
                        </div><br>
                                        
                        <button type="submit" name="them_thuonghieu" class="btn btn-primary">Thêm</button>
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