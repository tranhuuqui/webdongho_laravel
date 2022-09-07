<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token()}}">
  <title>Q-STORE</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/frontend/fontawesome_free_5.13.0/css/all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/slick/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/slick/slick-theme.css')}}" />

    <!--CSS-->
    <link rel="stylesheet" href="{{asset('public/frontend/css/home7.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/nav4.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/product-item3.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/sweetalert2.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-white navbar-light">
        <div class="container">
            <!-- logo  -->
            <a class="navbar-brand" href="{{url('/')}}" style="color:#00008B">
                <img src="{{asset('public/backend/images/Q-STORE.png')}}" alt="">
            </a>

            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <!-- form tìm kiếm  -->
                <form action="{{url('/timkiem')}}" method="POST" class="form-inline ml-auto my-2 my-lg-0 mr-3">
                    @csrf
                    <div class="input-group" style="width: 520px;">
                        <input type="text" class="form-control" name="search_product" aria-label="Small"
                            placeholder="Nhập tên sản phẩm cần tìm kiếm..." required>
                        <div class="input-group-append">
                            <button type="submit" class="btn" style="background-color: #00008B; color: white;">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- ô đăng nhập đăng ký giỏ hàng trên header  -->
                <ul class="navbar-nav mb-1 ml-auto">
                    <div class="dropdown">
                                <?php 
									$khachhang_id=session('khachhang_id');
									$khachhang_ten=session('khachhang_ten');
									    if($khachhang_id != NULL){
								?>

                        <li class="nav-item account" type="button" class="btn dropdown" data-toggle="dropdown">
                            <a href="#" class="btn btn-secondary rounded-circle">
                                <i class="fa fa-user"></i>
                            </a>
                            <a class="nav-link text-dark text-uppercase" href="#" style="display:inline-block">{{$khachhang_ten}}</a>
                        </li>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item nutdangky text-center mb-2" href="{{URL::to('/xem-donhang/'.$khachhang_id)}}">Đơn hàng</a>
                            <a class="dropdown-item nutdangnhap text-center" href="{{URL::to('/logout-khachhang')}}">Đăng xuất</a>
                        </div>

                                <?php 
									}else{
								?>
                        <li class="nav-item account" type="button" class="btn dropdown" data-toggle="dropdown">
                            <a href="#" class="btn btn-secondary rounded-circle">
                                <i class="fa fa-user"></i>
                            </a>
                            <a class="nav-link text-dark text-uppercase" href="#" style="display:inline-block">Tài
                                khoản</a>
                        </li>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item nutdangnhap text-center mb-2" href="#" data-toggle="modal"
                                data-target="#formdangnhap">Đăng nhập</a>
                            <a class="dropdown-item nutdangky text-center" href="#" data-toggle="modal"
                                data-target="#formdangky">Đăng ký</a>   
                        </div>
                        <?php
                            }
                        ?>
                    </div>

                    <div>
                        <li class="nav-item account" type="button">
                            <a href="{{route('showCart')}}" class="btn btn-secondary rounded-circle">
                            <i class="fa fa-shopping-cart"></i>
                            <div class="cart-amount">{{$count_cart}}</div>
                            </a>
                            <a class="nav-link text-dark text-uppercase" href="{{route('showCart')}}" style="display:inline-block">Giỏ hàng</a>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

                    <!-- form dang ky khi click vao button tren header-->
                    <div class="modal fade mt-5" id="formdangky" data-backdrop="static" tabindex="-1" aria-labelledby="dangky_tieude"
                        aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <ul class="tabs d-flex justify-content-around list-unstyled mb-0">
                                        <li class="tab tab-dangnhap text-center">
                                            <a class=" text-decoration-none">Đăng nhập</a>
                                            <hr>
                                        </li>
                                        <li class="tab tab-dangky text-center">
                                            <a class="text-decoration-none">Đăng ký</a>
                                            <hr>
                                        </li>
                                    </ul>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{URL::to('/them-khachhang')}}" method="POST" class="form-signin mt-2">
                                        @csrf
                                        <div class="form-label-group">
                                            <input type="text" class="form-control" placeholder="Nhập họ và tên" name="khachhang_ten" required
                                                autofocus>
                                        </div>
                                        <div class="form-label-group">
                                            <input type="text" class="form-control" placeholder="Nhập số điện thoại" name="khachhang_sdt"
                                                required>
                                        </div>
                                        <div class="form-label-group mb-4">
                                            <input type="text" class="form-control" placeholder="Địa chỉ" name="khachhang_diachi" required>
                                        </div>
                                        <div class="form-label-group">
                                            <input type="email" class="form-control" placeholder="Nhập địa chỉ email" name="khachhang_email"
                                                required>
                                        </div>
                                        <div class="form-label-group">
                                            <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="khachhang_password"
                                                required>
                                        </div>
                                        
                                        <button class="btn btn-lg btn-block btn-signin text-uppercase text-white mt-3" type="submit"
                                            style="background: blue">Đăng ký</button>
                                        <hr class="mt-3 mb-2">
                                        <div class="custom-control custom-checkbox">
                                            <p class="text-center">Bằng việc đăng ký, bạn đã đồng ý với Q-STORE về</p>
                                            <a href="#" class="text-decoration-none text-center" style="color: blue">Điều khoản dịch
                                                vụ & Chính sách bảo mật</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- form dang nhap khi click vao button tren header-->
                    <div class="modal fade mt-5" id="formdangnhap" data-backdrop="static" tabindex="-1"
                        aria-labelledby="dangnhap_tieude" aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <ul class="tabs d-flex justify-content-around list-unstyled mb-0">
                                        <li class="tab tab-dangnhap text-center">
                                            <a class=" text-decoration-none">Đăng nhập</a>
                                            <hr>
                                        </li>
                                        <li class="tab tab-dangky text-center">
                                            <a class="text-decoration-none">Đăng ký</a>
                                            <hr>
                                        </li>
                                    </ul>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form  class="form-signin mt-2" action="{{URL::to('/dangnhap-khachhang')}}" method="POST">
                                        @csrf
                                        <div class="form-label-group">
                                            <input type="email" class="form-control" placeholder="Nhập địa chỉ email" name="dangnhap_email"
                                                required autofocus>
                                        </div>

                                        <div class="form-label-group">
                                            <input type="password" class="form-control" placeholder="Mật khẩu" name="dangnhap_password" required>
                                        </div>

                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Nhớ mật khẩu</label>
                                            <a href="#" class="float-right text-decoration-none" style="color: blue">Quên mật
                                                khẩu</a>
                                        </div>

                                        <button class="btn btn-lg btn-block btn-signin text-uppercase text-white" type="submit"
                                            style="background: blue">Đăng nhập</button>
                                        <hr class="my-4">
                                        <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i
                                                class="fab fa-google mr-2"></i> Đăng nhập bằng Google</button>
                                        <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i
                                                class="fab fa-facebook-f mr-2"></i> Đăng nhập bằng Facebook</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
    <!-- menu -->
    @include('layouts.nav')
    <!-- banner -->
    @include('layouts.banner')
    <!--content-->
    @yield('content')


    <!-- thanh cac dich vu :mien phi giao hang, qua tang mien phi ........ -->
    <section class="abovefooter text-white" style="background-color: #00008B;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="dichvu d-flex align-items-center">
                        <img src="{{asset('public/frontend/images/icon-books.png')}}" alt="icon-books">
                        <div class="noidung">
                            <h3 class="tieude font-weight-bold">Sản phẩm hấp dẫn</h3>
                            <p class="detail">Tuyển chọn bởi WDONGHO</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="dichvu d-flex align-items-center">
                        <img src="{{asset('public/frontend/images/icon-ship.png')}}" alt="icon-ship">
                        <div class="noidung">
                            <h3 class="tieude font-weight-bold">MIỄN PHÍ GIAO HÀNG</h3>
                            <p class="detail">Từ 150.000đ ở TP.HCM</p>
                            <p class="detail">Từ 300.000đ ở tỉnh thành khác</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="dichvu d-flex align-items-center">
                        <img src="{{asset('public/frontend/images/icon-gift.png')}}" alt="icon-gift">
                        <div class="noidung">
                            <h3 class="tieude font-weight-bold">QUÀ TẶNG MIỄN PHÍ</h3>
                            <p class="detail">Quà tặng hấp dẫn</p>
                            <p class="detail">Nhiều ưu đãi khác</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="dichvu d-flex align-items-center">
                        <img src="{{asset('public/frontend/images/icon-return.png')}}" alt="icon-return">
                        <div class="noidung">
                            <h3 class="tieude font-weight-bold">ĐỔI TRẢ NHANH CHÓNG</h3>
                            <p class="detail">Hàng bị lỗi được đổi trả nhanh chóng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer  -->
    <footer>
        <div class="container py-4">
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="gioithieu">
                        <h3 class="header text-uppercase font-weight-bold">Về WDONGHO</h3>
                        <a href="#">Giới thiệu về WDONGHO</a>
                        <a href="#">Tuyển dụng</a>
                        <div class="fb-like" data-href="https://www.facebook.com/DealBook-110745443947730/"
                            data-width="300px" data-layout="button" data-action="like" data-size="small"
                            data-share="true"></div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="hotrokh">
                        <h3 class="header text-uppercase font-weight-bold">HỖ TRỢ KHÁCH HÀNG</h3>
                        <a href="#">Hướng dẫn đặt hàng</a>
                        <a href="#">Phương thức thanh toán</a>
                        <a href="#">Phương thức vận chuyển</a>
                        <a href="#">Chính sách đổi trả</a>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="lienket">
                        <h3 class="header text-uppercase font-weight-bold">HỢP TÁC VÀ LIÊN KẾT</h3>
                        <!--<img src="images/dang-ky-bo-cong-thuong.png" alt="dang-ky-bo-cong-thuong">-->
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="ptthanhtoan">
                        <h3 class="header text-uppercase font-weight-bold">Phương thức thanh toán</h3>
                        <!--<img src="{{asset('public/fontend/images/visa-payment.jpg')}}" alt="visa-payment">
                        <img src="{{asset('public/fontend/images/master-card-payment.jpg')}}" alt="master-card-payment">
                        <img src="{{asset('public/fontend/images/jcb-payment.jpg')}}" alt="jcb-payment">
                        <img src="{{asset('public/fontend/images/atm-payment.jpg')}}" alt="atm-payment">
                        <img src="{{asset('public/fontend/images/cod-payment.jpg')}}" alt="cod-payment">
                        <img src="{{asset('public/fontend/images/payoo-payment.jpg')}}" alt="payoo-payment">-->
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- nut cuon len dau trang -->
    <div class="fixed-bottom">
        <div class="btn btn-warning float-right rounded-circle nutcuonlen" id="backtotop" href="#"
            style="background:#CF111A;"><i class="fa fa-chevron-up text-white"></i></div>
    </div>
<!-- ./wrapper -->

<!-- jQuery -->
    <script src="{{asset('public/frontend/js/jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="{{asset('public/frontend/slick/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/frontend/js/main6.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/frontend/js/showcart.js')}}"></script>
    
<!-- AdminLTE App -->

<script>
    function addTocart(event){
        event.preventDefault();
        let urlAdd = $(this).data('url');
        
        $.ajax({
            type: "GET",
            url: urlAdd,
            dataType: 'json',
            success: function(data){
                if(data.code === 200){
                    alert('Thêm giỏ hàng thành công');
                    location.reload();
                }
                
            },
            error: function(){

            }
        });
    }
    $(function(){
        $('.add-to-cart').on('click', addTocart);
    });

    $(document).on('input', '.cart_qty_update', function(event){
        
        var soluong = $(this).val();
        var id = $(this).data('id');
        var _token = $('input[name="_token"]').val();
        
        $.ajax({
            url: "{{route('updateCart')}}",
            type: "POST",
            data: {id:id, soluong:soluong, _token:_token},
            success: function(data){
            if(data.code === 200){
                $('.cart_wrapper').html(data.cart_content);
                location.reload();
            }
            },
            error: function(){

            }
        }); 
    });

    $(document).on('click', '.delete_cart', function(event){
        event.preventDefault();
        let urlDel = $(this).data('url');
        var id = $(this).data('id');

        $.ajax({
            type: "GET",
            url: urlDel,
            data: {id:id},
            success: function(data){
            if(data.code === 200){
                $('.cart_wrapper').html(data.cart_content);  
                location.reload();          
            }
            },
            error: function(){

            }
        });  
    })
</script>
<script>
    $(document).ready(function(){
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
                url: "{{route('diachinhanhang')}}",
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

<script>
    $('.xacnhandiachi').click(function(){
        var thanhpho = $('.thanhpho').val();
        var quanhuyen = $('.quanhuyen').val();
        var xaphuong = $('.xaphuong').val();
        var sonha = $('.sonha').val();
        var _token = $('input[name="_token"]').val();
        
        if(thanhpho && quanhuyen && xaphuong && sonha){
            $.ajax({
                url: "{{route('xacnhandiachi')}}",
                method: 'POST',
                data: {
                thanhpho: thanhpho,
                quanhuyen: quanhuyen,
                xaphuong: xaphuong,
                sonha: sonha,
                _token: _token
                },
                success: function(){
                    alert('Xác nhận thành công');
                    location.reload();
                }
            });
            
        }else{
            alert('Vui lòng điền đầy đủ thông tin');
        }
    });
</script>

</body>
</html>