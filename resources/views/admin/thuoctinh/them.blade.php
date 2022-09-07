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
                <h3 class="card-title">Thêm thuộc tính sản phẩm</h3>
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
                    <form role="form" action="{{URL::to('/luu-thuoctinh/'.$sanpham_by_id->sanpham_id)}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="sanphamTen">Tên sản phẩm:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" value="{{$sanpham_by_id->sanpham_ten}}" name="sanpham_ten" disabled required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="code">Code:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control"  value="{{$sanpham_by_id->sanpham_sku}}" name="code" disabled require="">
                            </div>
                        </div>
                        <div class="field_wrapper">
                            <div>
                                <input type="text" class="form-control" style="width:18%; float:left; margin:2px;" name="sku[]" value="" placeholder="SKU"/>
                                <input type="text" class="form-control" style="width:18%; float:left; margin:2px;" name="gia[]" value="" placeholder="Giá"/>
                                <input type="text" class="form-control" style="width:18%; float:left; margin:2px;" name="size[]" value="" placeholder="Size"/>
                                <input type="text" class="form-control" style="width:18%; float:left; margin:2px;" name="stock[]" value="" placeholder="stock"/>
                                <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                                <div class="clearfix"></div>
                            </div>
                        </div> 
                        
                        <br>
                        <button type="submit" name="them_thuoctinh" class="btn btn-primary">Thêm</button>
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

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Danh sách thuộc tính</h3>
              </div>
              @if(session('success-xoathuoctinh'))
                  <div class="alert alert-success">
                    {{session('success-xoathuoctinh')}}
                  </div>
                @endif
                @if(session('error'))
                  <div class="alert alert-danger">
                    {{session('error')}}
                  </div>
                @endif
              <div class="card-body"> 
              <a href="{{URL::to('/lietke-sanpham')}}" style="float: right; padding-bottom:20px"><button class="btn btn-primary">Trở về</button></a>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th style="text-align: center;">SKU</th>
                    <th style="text-align: center;">Giá sản phẩm</th></th>
                    <th style="text-align: center;">Size</th>
                    <th style="text-align: center;">Số lượng còn:</th>
                    <th style="text-align: center;" >Quản lý</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach($thuoctinh as $data)
                      @if($sanpham_by_id->sanpham_id==$data->sanpham_id)
                      <tr>
                        <td style="text-align: center;">{{$data->sku}}</td>
                        <td style="text-align: center;">{{number_format($data->gia).' vnđ'}}</td>
                        <td style="text-align: center;">{{$data->size}}</td>
                        <td style="text-align: center;">{{$data->stock}}</td>
                        <td style="text-align: center;">
                          <a href="{{URL::to('/xoa-thuoctinh/'.$data->thuoctinh_id)}}" class="active" ui-toggle-class="" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fa fa-times text-danger"></i></a>
                        </td>
                      </tr>
                      @endif
                    @endforeach
                  </tbody>
                </table>
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
  </div>
@endsection