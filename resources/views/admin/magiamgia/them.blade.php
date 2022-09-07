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
                <h3 class="card-title">Thêm mã giảm giá</h3>
                <a href="{{URL::to('/lietke-magiamgia')}}" style="float: right;"><button class="btn btn-primary">Trở về</button></a>
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
                    <form role="form" action="{{URL::to('/luu-magiamgia')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group row">
                      <div class="col-md-2">
                        <label for="magiamgiaTen">Tên mã giảm giá:</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="magiamgia_ten" required="">
                      </div>
                    </div> 
                    <div class="form-group row">
                      <div class="col-md-2">
                        <label for="magiamgiaMa">Mã giảm giá:</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="magiamgia_ma" require="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-2">
                        <label for="magiamgiaSoluong">Số lượng:</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="magiamgia_soluong"  require="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-2">
                        <label for="magiamgiaTinhnang">Tính năng mã:</label>
                      </div>
                      <div class="col-md-8">
                        <select name="magiamgia_tinhnang" class="form-control ">
                            <option value="0">----Chọn----</option>
                            <option value="1">Giảm theo %</option>
                            <option value="2">Giảm theo tiền</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-2">
                        <label for="magiamgiaGiagiam">Nhập số % hoặc số tiền giảm:</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="magiamgia_giagiam"  require="">
                      </div>
                    </div>
                                        
                        <button type="submit" name="them_magiamgia" class="btn btn-primary">Thêm</button>
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