@extends('admin_layout')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quản lý bình luận</h1>
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
                <h3 class="card-title">Danh sách bình luận</h3>
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
                    <th style="text-align: center;">Trạng thái</th>
                    <th style="text-align: center;">Khách hàng</th>
                    <th style="text-align: center;">Sản phẩm</th>
                    <th style="text-align: center;">Nội dung</th>
                    <th colspan="2" style="text-align: center;" >Quản lý</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $STT=0;
                  ?>
                  @foreach($data_binhluan as $binhluan)
                  <?php
                    $STT++;
                  ?>
                    <tr>
                      <td style="text-align: center;">
                        {{$STT}}
                      </td>
                      <td style="text-align: center;"><span class="text-ellipsis">
                        <?php 
                          if($binhluan->binhluan_trangthai==0){
                        ?>
                        <a href="{{URL::to('/unactive-binhluan/'.$binhluan->binhluan_id)}}"><span class="text text-danger">Chưa duyệt</span></a>
                        <?php
                          }else{
                        ?>
                        <a href="{{URL::to('/active-binhluan/'.$binhluan->binhluan_id)}}"><span class="text text-success">Đã duyệt</span></a>
                        <?php                
                          }
                        ?>
                      </span></td>
                      <td style="text-align: center;">{{$binhluan->khachhang_ten}}</td>
                      <td style="text-align: center;">{{$binhluan->sanpham['sanpham_ten']}}</td>
                      <td style="text-align: center;">{{$binhluan->binhluan_noidung}}</td>
                      <td style="text-align: center;">
                        <a href="#" data-toggle="modal" data-target="#traloi{{$binhluan->binhluan_id}}">Trả lời</a><br>
                      </td>
                      <td style="text-align: center;">
                        <a href="{{URL::to('/xoa-binhluan/'.$binhluan->binhluan_id)}}" class="active" ui-toggle-class="" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fa fa-times text-danger"></i></a>
                      </td>
                    </tr>

                    <!-- Modal -->
                    <form action="{{url('/traloi-binhluan')}}" method="POST">
                      {{csrf_field()}}
                      <div class="modal fade" id="traloi{{$binhluan->binhluan_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="exampleModalLabel" style="text-align: center;">Trả lời bình luận</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <?php
                              $id = session('admin_id');
                              $name = session('admin_name');
                            ?>
                            <div class="modal-body">
                              <span>Nhập nội dung trả lời:<span>
                              <textarea rows="4" style="width:100%" class="form-control" name="traloi_binhluan" ></textarea>
                              <input type="hidden" value="{{$binhluan->sanpham_id}}" name="sanpham_id_hidden">
                              <input type="hidden" value="{{$binhluan->binhluan_id}}" name="binhluan_id_hidden">
                              <input type="hidden" value="{{$id}}" name="khachhang_id_hidden">
                              <input type="hidden" value="{{$name}}" name="khachhang_name_hidden">

                            </div>
                            <div class="modal-footer" style="text-align: center;">
                              <button type="submit" class="btn btn-primary">Trả lời</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>

                  @endforeach
                  </tbody>
                </table>
              </div>

              <div style="padding-left: 18px;">
                  {!! $data_binhluan->render() !!}
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