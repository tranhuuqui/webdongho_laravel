@extends('index_layout')
@section('content')
    <section class="breadcrumbbar">
        <div class="container">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active"><a href="#">{{$danhmuc_title->danhmucbaiviet_ten}}</a></li>
            </ol>
            <br>
            <hr>
        </div>
    </section>

    <!-- các sản phẩm  -->
    <section class="content my-4">
        <div class="container">
            <div class="noidung bg-white" style=" width: 100%;">

            <div class="product-image-wrapper">
                @foreach($baiviet_danhmuc as $data_baiviet)
                <div class="productinfo row">
                    <a href="{{URL('/baiviet/'.$data_baiviet->baiviet_id)}}">
                    <div class="col-sm-3">
                        <img style="float: left; height:130px; width:220px; padding:5px" src="{{URL::to('uploads/baiviet/'.$data_baiviet->baiviet_hinhanh)}}" alt="" />
                    </div>
                    <div class="col-sm-9">
                        <h4 style="color:black;">{{$data_baiviet->baiviet_tieude}}</h4>
                        <p>{{$data_baiviet->baiviet_mota}}</p>
                    </div>
                    </a>
                </div>
                @endforeach
            </div>

                <!--het khoi san pham-->
            </div>
            <!--het div noidung-->
        </div>
        <!--het container-->
    </section>
    
@endsection