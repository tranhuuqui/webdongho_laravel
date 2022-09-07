<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Trang chủ Admin</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('public/backend/plugins/ionicons-2.0.1/css/ionicons.min.css')}}">
  <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('public/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.cs')}}s">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('public/backend/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/backend/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('public/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('public/backend/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('public/backend/plugins/summernote/summernote-bs4.min.css')}}">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
          var maxField = 10; //Input fields increment limitation
          var addButton = $('.add_button'); //Add button selector
          var wrapper = $('.field_wrapper'); //Input field wrapper
          var fieldHTML = '<div><input type="text" class="form-control" style="width:18%; float:left; margin:2px;" name="sku[]" value="" placeholder="SKU"/> <input type="text" class="form-control" style="width:18%; float:left; margin:2px;" name="gia[]" value="" placeholder="Giá"/> <input type="text" class="form-control" style="width:18%; float:left; margin:2px;" name="size[]" value="" placeholder="Size"/> <input type="text" class="form-control" style="width:18%; float:left; margin:2px;" name="stock[]" value="" placeholder="stock"/><a href="javascript:void(0);" class="remove_button">remove</a> <div class="clearfix"></div> </div>'; //New input field html 
          var x = 1; //Initial field counter is 1
          
          //Once add button is clicked
          $(addButton).click(function(){
              //Check maximum number of input fields
              if(x < maxField){ 
                  x++; //Increment field counter
                  $(wrapper).append(fieldHTML); //Add field html
              }
          });
          
          //Once remove button is clicked
          $(wrapper).on('click', '.remove_button', function(e){
              e.preventDefault();
              $(this).parent('div').remove(); //Remove field html
              x--; //Decrement field counter
          });
      });
  </script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/logout')}}" role="button">
        <i class="fas fa-sign-out-alt"></i>
          <b><u>Logout</u></b>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{URL::to('/admin_home')}}" class="brand-link">
      <img src="{{asset('public/backend/images/dream.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ADMIN-QSTORE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('public/backend/images/icon.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            <?php
              $name = session('admin_name');
              if($name){
                echo $name;
              }
            ?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Trang chủ
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/quanlydonhang')}}" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Đơn hàng
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{URL::to('/lietke-phivanchuyen')}}" class="nav-link">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                Phí vận chuyển
              </p>
            </a>   
          </li>
          <li class="nav-item">
            <a href="{{URL::to('/lietke-magiamgia')}}" class="nav-link">
              <i class="nav-icon fas fa-barcode"></i>
              <p>
                Mã giảm giá
              </p>
            </a>   
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Quản lý sản phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('/lietke-danhmucsanpham')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('/lietke-thuonghieusanpham')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thương hiệu sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('/lietke-sanpham')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sản phẩm</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{url('/lietke-khachhang')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Thành viên
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Quản lý bài viết
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/lietke-danhmucbaiviet')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục bài viêt</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/lietke-baiviet')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bài viết</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{url('/quanly-binhluan')}}" class="nav-link">
              <i class="nav-icon fas fa-comment"></i>
              <p>
                Bình luận
              </p>
            </a>   
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->

  @yield('admin_content')

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy;  <a href="https://adminlte.io">Q-STORE</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
    <script src="{{asset('public/frontend/js/jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/backend/dist/js/adminlte.js')}}"></script>
<script src="{{asset('public/backend/js/ckeditor/ckeditor.js')}}"></script>
<script>
  CKEDITOR.replace('ckeditor');
  CKEDITOR.replace('ckeditor1');
  CKEDITOR.replace('ckeditor2');
  CKEDITOR.replace('ckeditor3');
  CKEDITOR.replace('ckeditor4');
  CKEDITOR.replace('ckeditor5');
</script>

<script>
  $(document).ready(function(){

    fetch_phivanchuyen();

    function fetch_phivanchuyen(){
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url: "{{route('selectPhivanchuyen')}}",
        method: 'POST',
        data: {
          _token: _token
        },
        success: function(data){
          $('#lietke_phivanchuyen').html(data);
        }
      });
    }

    $(document).on('blur','.phivanchuyen_capnhat', function(){
      var phivanchuyen_id = $(this).data('phivanchuyen_id');
      var phivanchuyen_gia = $(this).text();
      var _token = $('input[name="_token"]').val();

      $.ajax({
        url: "{{route('capnhatPhivanchuyen')}}",
        method: 'POST',
        data: {
          phivanchuyen_id: phivanchuyen_id,
          phivanchuyen_gia: phivanchuyen_gia,
          _token: _token
        },
        success: function(data){
          fetch_phivanchuyen();
        }
      });
    });

    $('.them_phivanchuyen').click(function(){
      var thanhpho = $('.thanhpho').val();
      var quanhuyen = $('.quanhuyen').val();
      var xaphuong = $('.xaphuong').val();
      var phivanchuyen = $('.phivanchuyen').val();
      var _token = $('input[name="_token"]').val();

      $.ajax({
        url: "{{route('themPhivanchuyen')}}",
        method: 'POST',
        data: {
          thanhpho: thanhpho,
          quanhuyen: quanhuyen,
          xaphuong: xaphuong,
          phivanchuyen: phivanchuyen,
          _token: _token
        },
        success: function(data){
          alert('Thêm phí vận chuyển thành công');
          fetch_phivanchuyen();
        }
      });
    });

    $('.choose').on('change',function(){ 
      var action = $(this).attr('id');
      var ma_id = $(this).val();
      var _token = $('input[name="_token"]').val();
      var result = '';
      if(action == 'thanhpho'){
        result = 'quanhuyen';
      }else{
        result = 'xaphuong';
      }
      $.ajax({
        url: "{{route('chonKhuvuc')}}",
        method: 'POST',
        data: {
          action: action,
          ma_id: ma_id,
          _token: _token
        },
        success: function(data){
          $('#'+result).html(data);
        }
      });
    });
  });
</script>


</body>
</html>