@extends('index_layout')
@section('content')
    <section class="breadcrumbbar">
        <div class="container">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active"><a href="#">Kết quả tìm kiếm</a></li>
            </ol>
            <br>
            <hr>
        </div>
    </section>

    <!-- các sản phẩm  -->
    <section class="content my-4">
        <div class="container">
            <div class="noidung bg-white" style=" width: 100%;">
                <div class="items">
                    <div class="row">
                    @foreach($sanpham_timkiem as $sp_all)
                        <div class="col-lg-3 col-md-4 col-xs-6">
                            <!-- 1 sản phẩm  -->
                            <div class="card">
                                <a href="{{URL::to('/sanpham-chitiet/'.$sp_all->sanpham_id)}}" class="motsanpham"
                                    style="text-decoration: none; color: black;" data-toggle="tooltip"
                                    data-placement="bottom">
                                    <img class="card-img-top anh" src="{{URL::to('uploads/'.$sp_all->sanpham_hinhanh)}}" alt="">
                                    <div class="card-body noidungsp mt-3">
                                        <h6 class="card-title ten">{{$sp_all->sanpham_ten}}</h6>
                                        <small class="tacgia text-muted">Brian Finch</small>
                                        <div class="gia d-flex align-items-baseline">
                                            <div class="giamoi">{{number_format($sp_all->sanpham_gia).' vnđ'}}</div>
                                            <!--<div class="giacu text-muted">139.000 ₫</div>-->
                                        </div>
                                        <!--<div class="danhgia">
                                            <ul class="d-flex" style="list-style: none;">
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <span class="text-muted">0 nhận xét</span>
                                            </ul>
                                        </div>-->
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!--het khoi san pham-->
            </div>
            <!--het div noidung-->
        </div>
        <!--het container-->
    </section>
    
@endsection