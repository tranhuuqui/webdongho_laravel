@extends('index_layout')
@section('content')
<section class="breadcrumbbar">
        <div class="container">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">{{$sanpham_chitiet->danhmucsanpham['danhmuc_ten']}}</a></li>
                <li class="breadcrumb-item active"><a href="#">{{$sanpham_chitiet->sanpham_ten}}</a></li>
            </ol>
            <br>
            <hr>
        </div>
    </section>

    <!-- nội dung của trang  -->
    <section class="product-page mb-4">
        <div class="container">
            <!-- chi tiết 1 sản phẩm -->
            <div class="product-detail bg-white p-4">
                <div class="row">
                    <!-- ảnh  -->
                    <div class="col-md-6 khoianh">
                        <div class="anhto mb-4">
                            <a class="active" href="#" data-fancybox="thumb-img">
                                <img class="product-image" src="{{URL::to('uploads/'.$sanpham_chitiet->sanpham_hinhanh)}}" alt="" style="width: 100%;">
                            </a>
                        </div>
                        <div class="list-anhchitiet d-flex mb-4" style="margin-left: 2rem;">
                            <img class="thumb-img thumb1 mr-3" src="{{URL::to('uploads/'.$sanpham_chitiet->sanpham_hinhanh)}}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <!-- thông tin sản phẩm: tên, giá bìa giá bán tiết kiệm, các khuyến mãi, nút chọn mua.... -->
                    <div class="col-md-6 khoithongtin">
                        <div class="row">
                            <div class="col-md-12 header">
                                <h4 class="ten">{{$sanpham_chitiet->sanpham_ten}}</h4>
                                <!--<div class="rate">
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star "></i>
                                </div>
                                <hr>-->
                            </div>
                            <form action="{{URL::to('/giohang')}}" method="POST">
                             @csrf
                                <div class="col-md-7">
                                    <div class="gia">
                                        <div style="color: red; font-size:30px; font-weight:bold;">{{number_format($sanpham_chitiet->sanpham_gia).' vnđ'}}</div>
                                        <div class="giabia">Thương hiệu: <b>{{$sanpham_chitiet->thuonghieusanpham['thuonghieu_ten']}}</b></div>
                                        <?php
                                            if($sanpham_chitiet->sanpham_soluong > 0){
                                        ?>
                                        <div class="tietkiem">Tình trạng: <b>Còn hàng</b> </div>
                                        <?php
                                            }else{
                                        ?>
                                        <div class="tietkiem">Tình trạng: <b style="color: red;">Tạm hết hàng</b> </div>
                                        <?php 
                                            }
                                        ?>
                                    </div>
                                    <div class="uudai my-3">
                                        <h6 class="header font-weight-bold">Khuyến mãi & Ưu đãi tại Q-STORE:</h6>
                                        <ul>
                                            <li><b>Miễn phí giao hàng </b>cho đơn hàng từ 150.000đ ở TP.HCM và 300.000đ ở
                                                Tỉnh/Thành khác <a href="#">>> Chi tiết</a></li>
                                            <li><b>Combo HOT - GIẢM 25% </b><a href="#">>>Xem ngay</a></li>
                                            <li>Tặng usb 8GB cho mỗi đơn hàng</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <label class="font-weight-bold">Số lượng: </label>
                                        <input name="soluong" type="number" min="1" max="{{$sanpham_chitiet->sanpham_soluong}}" style="width: 60px; height:30px" value="1" />
                                        <span style="color: red; font-size:15px; margin: 10px 10px" ><i>(số lượng còn: {{$sanpham_chitiet->sanpham_soluong}})</i></span>
                                        <input name="sanpham_id_hidden" type="hidden" value="{{$sanpham_chitiet->sanpham_id}}" />
                                        </div>
                                    </div>
                                    <div style="padding-left: 20px;">
                                        <br>
                                        <button type="submit" class="btn btn-primary" style="width:200px">Thêm giỏ hàng</button>
                                    </div>
                                </div>
                            </form>    
                        </div>
                    </div>
                    <!-- decripstion của 1 sản phẩm: giới thiệu , đánh giá   -->
                    <div class="row">
                        <div class="col-md-7" style="padding-top: 40px;">
                        <h4>Giới thiệu</h4>
                        {!!$sanpham_chitiet->sanpham_mota!!}
                        <button class="xemthem" data-toggle="modal" data-target="#exampleModal"> Xem thêm <i class="fa fa-caret-right" style="padding-left: 5px;"></i> </button>
                        
                        <div class="modal fade bs-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Chi tiết sản phẩm</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css">
                                            img {
                                                vertical-align: middle;
                                                border-style: none;
                                                width: 100%;
                                            }
                                        </style>
                                        {!!$sanpham_chitiet->sanpham_noidung!!}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <h4 style="padding-top: 50px;">Đánh giá</h4>
                        <div class="row" >
                                        <div class="col-md-3 text-center">
                                            <p class="tieude">Đánh giá trung bình</p>
                                            <div class="diem">0/5</div>
                                            <div class="sao">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p class="sonhanxet text-muted">(0 nhận xét)</p>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="tiledanhgia text-center">
                                                <div class="motthanh d-flex align-items-center">5 <i class="fa fa-star"></i>
                                                    <div class="progress mx-2">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div> 0%
                                                </div>
                                                <div class="motthanh d-flex align-items-center">4 <i class="fa fa-star"></i>
                                                    <div class="progress mx-2">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div> 0%
                                                </div>
                                                <div class="motthanh d-flex align-items-center">3 <i class="fa fa-star"></i>
                                                    <div class="progress mx-2">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div> 0%
                                                </div>
                                                <div class="motthanh d-flex align-items-center">2 <i class="fa fa-star"></i>
                                                    <div class="progress mx-2">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div> 0%
                                                </div>
                                                <div class="motthanh d-flex align-items-center">1 <i class="fa fa-star"></i>
                                                    <div class="progress mx-2">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div> 0%
                                                </div>
                                                <div class="btn vietdanhgia mt-3">Viết đánh giá của bạn</div>
                                            </div>
                                            
                                            <div class="formdanhgia">
                                                <h6 class="tieude text-uppercase">GỬI ĐÁNH GIÁ CỦA BẠN</h6>
                                                <span class="danhgiacuaban">Đánh giá của bạn về sản phẩm này:</span>
                                                <div class="rating d-flex flex-row-reverse align-items-center justify-content-end">
                                                    <input type="radio" name="star" id="star1"><label for="star1"></label>
                                                    <input type="radio" name="star" id="star2"><label for="star2"></label>
                                                    <input type="radio" name="star" id="star3"><label for="star3"></label>
                                                    <input type="radio" name="star" id="star4"><label for="star4"></label>
                                                    <input type="radio" name="star" id="star5"><label for="star5"></label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="txtFullname w-100" placeholder="Mời bạn nhập tên(Bắt buộc)">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="txtEmail w-100" placeholder="Mời bạn nhập email(Bắt buộc)">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="txtComment w-100" placeholder="Đánh giá của bạn về sản phẩm này">
                                                </div>
                                                <div class="btn nutguibl">Gửi bình luận</div>
                                            </div>
                                        </div>
                                    </div> -->
                        </div>
                        <!-- Thong so ky thuat -->
                        <div class="col-md-5" style="padding-top: 50px; padding-left:40px">
                            <h4>Cấu hình {{$sanpham_chitiet->sanpham_ten}}</h4>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td style="font-size: 14px;"><b>Màn hình:</b></td>
                                        <td style="font-size: 14px;">{{$sanpham_chitiet->man_hinh}}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 14px;"><b>Thời lượng pin:</b></td>
                                        <td style="font-size: 14px;">{{$sanpham_chitiet->thoi_luong_pin}}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 14px;"><b>Kết nối với hệ điều hành:</b></td>
                                        <td style="font-size: 14px;">{{$sanpham_chitiet->ket_noi}}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 14px;"><b>Mặt:</b></td>
                                        <td style="font-size: 14px;">{{$sanpham_chitiet->mat}}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 14px;"><b>Tính năng cho sức khỏe:</b></td>
                                        <td style="font-size: 14px;">{{$sanpham_chitiet->tinh_nang_suc_khoe}}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 14px;"><b>Hãng:</b></td>
                                        <td style="font-size: 14px;">{{$sanpham_chitiet->thuonghieusanpham['thuonghieu_ten']}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div>
                                <button class="xemthem"> Xem thêm <i class="fa fa-caret-right" style="padding-left: 5px;"></i> </button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="binhluansanpham">
                        <?php
                            $khachhang_id=session('khachhang_id');
                            $khachhang_ten=session('khachhang_ten');
                        ?>
                            <h4>Bình luận sản phẩm</h4>
                            <?php 
                                if($khachhang_id){
                            ?>
                                <form action="{{URL::to('luu-binhluan')}}" method="POST">
                                    @csrf
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
                                    <div class="form-group">
                                        <textarea  class="form-control"  name="binhluan_noidung" required="" placeholder="Viết nội dung bình luận..." ></textarea>	
                                    </div>
                                    <input type="hidden" name="sanpham_id_binhluan" value="{{$sanpham_chitiet->sanpham_id}}">
                                    <input type="hidden" name="khachhang_id_binhluan" value="{{$khachhang_id}}">
                                    <input type="hidden" name="khachhang_ten_binhluan" value="{{$khachhang_ten}}">
                                    <input type="submit" name="gui" value="Gửi" class="btn btn-primary">
                                </form>
                            <?php 
                                } 
                            ?>
                        <br>
                        @foreach($binhluan as $data_binhluan)
                            <?php 
                                if($data_binhluan->sanpham_id==$sanpham_chitiet->sanpham_id){
                            ?>

                                <div class="row">
                                    <div class="col-md-1"><img src="{{URL::to('public/frontend/images/avatar.png')}}"></div>
                                    <div class="col-md-11">
                                        <b>{{$data_binhluan->khachhang_ten}}</b>
                                        <i>{{$data_binhluan->created_at}}</i><br>
                                        <p>{{$data_binhluan->binhluan_noidung}}</p>
                                    </div>
                                    
                                </div>
                                <p></p>
                                <br>
                            
                            <?php
                                }
                            ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- khối sản phẩm tương tự -->
    <section class="_1khoi">
        <div class="container">
            <div class="noidung bg-white" style=" width: 100%;">
                <div class="row">
                    <!--header-->
                    <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-light pt-4">
                        <h5 class="header text-uppercase" style="font-weight: 400;">Có thể bạn đã xem</h5>
                        <a href="{{URL::to('/sanpham-all')}}" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                    </div>
                </div>
                <div class="khoisanpham" style="padding-bottom: 2rem;">
                    <!-- 1 sp -->
                    @foreach($all_sanpham as $all)
                    <div class="card">
                        <a href="{{URL::to('/sanpham-chitiet/'.$all->sanpham_id)}}" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip"
                            data-placement="bottom">
                            <img class="card-img-top anh" src="{{URL::to('uploads/'.$all->sanpham_hinhanh)}}">
                            <div class="card-body noidungsp mt-3">
                                <h6 class="card-title ten">{{$all->sanpham_ten}}</h6>
                                <div class="gia d-flex align-items-baseline">
                                    <div class="giamoi">{{number_format($all->sanpham_gia)}} VNĐ</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection