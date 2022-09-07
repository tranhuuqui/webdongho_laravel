@extends('admin_layout')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quản lý phí vận chuyển</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Thêm sản phí vận chuyển</h3>
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
                    <form>
                      @csrf
                        <div class="form-group row">
                          <div class="col-md-2">
                              <label style="padding-left: 20px;">Tỉnh/thành phố:</label>
                          </div>
                          <div class="col-md-8">
                              <select name="thanhpho" id="thanhpho" class="form-control choose thanhpho">
                                  <option value="1">---Chọn tỉnh/thành phố---</option>
                                  @foreach($thanhpho as $tp)
                                      <option value="{{$tp->matp}}">{{$tp->name_tinhthanhpho}}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-2">
                              <label style="padding-left: 20px;">Quận/huyện:</label>
                          </div>
                          <div class="col-md-8">
                              <select name="quanhuyen" id="quanhuyen" class="form-control choose quanhuyen">
                                  <option value="">---Chọn quận/huyện---</option>
                                  
                              </select>
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-2">
                              <label style="padding-left: 20px;">Xã/phường/thị trấn:</label>
                          </div>
                          <div class="col-md-8">
                              <select name="xaphuong" id="xaphuong" class="form-control xaphuong">
                                  <option value="">---Chọn xã/phường/thị trấn---</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-2">
                              <label style="padding-left: 20px;">Phí vận chuyển:</label>
                          </div>
                          <div class="col-md-8">
                              <input type="text" class="form-control phivanchuyen" name="phivanchuyen" require="">
                          </div>
                      </div>
                      <div style="padding-left: 20px;">
                        <button type="button"  class="btn btn-primary them_phivanchuyen">Thêm</button>
                      </div>                  
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

    <!-- Main content -->
    <div id="lietke_phivanchuyen">
      
    </div>
    <!-- /.content -->
  </div>
@endsection