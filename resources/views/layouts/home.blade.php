@extends('index_layout')
@section('content')
    <section class="content my-4">
        <div class="container">
            <div class="noidung bg-white" style=" width: 100%;">
                <div class="row">
                    <!--header-->
                    <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-transparent pt-4">
                        <h3 class="header text-uppercase" style="font-weight: 400;">SẢN PHẨM MỚI</h3>
                        <a href="{{URL::to('/sanpham-all')}}" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                    </div>
                </div>
                
                <div class="khoisanpham" style="padding-bottom: 2rem;">
                    <!-- 1 san pham -->
                    @foreach($all_sanpham as $all_sp)
                    <div class="card">
                                <a href="{{URL::to('/sanpham-chitiet/'.$all_sp->sanpham_id)}}" class="motsanpham"
                                    style="text-decoration: none; color: black;">
                                    <img class="card-img-top anh" src="{{URL::to('uploads/'.$all_sp->sanpham_hinhanh)}}">
                                    <div class="card-body noidungsp mt-3">
                                        <h3 class="ten" style="font-size: 15px;">{{$all_sp->sanpham_ten}}</h3>
                                        <div class="gia d-flex align-items-baseline">
                                            <div class="giamoi">{{number_format($all_sp->sanpham_gia).' vnđ'}}</div>
                                        </div>
                                    </div>
                                </a>
                                <div style="padding-left: 10px; padding-top:10px">
                                <button class="btn btn-primary add-to-cart" data-url="{{route('addToCart',['id'=>$all_sp->sanpham_id])}}"> <i class="fa fa-cart-plus"></i> Thêm và giỏ hàng</button>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @foreach($all_danhmuc as $all_dm)
    <section class="content my-4">
        <div class="container">
            <div class="noidung bg-white" style=" width: 100%;">
                <div class="row">
                    <!--header-->
                    <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-transparent pt-4">
                        <h3 class="header text-uppercase" style="font-weight: 400;">{{$all_dm->danhmuc_ten}}</h3>
                        <a href="{{URL::to('/sanpham-danhmuc/'.$all_dm->danhmuc_id)}}" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                    </div>
                </div>
                
                <div class="khoisanpham" style="padding-bottom: 2rem;">
                    @foreach($all_sanpham as $all)
                        @if($all->danhmuc_id == $all_dm->danhmuc_id)
                            <div class="card">
                                <a href="{{URL::to('/sanpham-chitiet/'.$all->sanpham_id)}}" class="motsanpham"
                                    style="text-decoration: none; color: black;">
                                    <img class="card-img-top anh" src="{{URL::to('uploads/'.$all->sanpham_hinhanh)}}">
                                    <div class="card-body noidungsp mt-3">
                                        <h3 class="ten" style="font-size: 15px;">{{$all->sanpham_ten}}</h3>
                                        <div class="gia d-flex align-items-baseline">
                                            <div class="giamoi">{{number_format($all->sanpham_gia).' vnđ'}}</div>
                                            <!--<div class="giacu text-muted">139.000 ₫</div>-->
                                        </div>
                                    </div>
                                </a>
                                <div style="padding-left: 10px; padding-top:10px">
                                <button class="btn btn-primary add-to-cart" data-url="{{route('addToCart',['id'=>$all->sanpham_id])}}"> <i class="fa fa-cart-plus"></i> Thêm và giỏ hàng</button>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endforeach

@endsection