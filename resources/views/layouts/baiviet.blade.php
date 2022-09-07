@extends('index_layout')
@section('content')
    <section class="breadcrumbbar">
        <div class="container">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{url('/danhmucbaiviet/'.$danhmuc_title->danhmucbaiviet_id)}}">{{$danhmuc_title->danhmucbaiviet_ten}}</a></li>
                <li class="breadcrumb-item active"><a href="#">
                    @foreach($baiviet as $data_baiviet) 
                        {{$data_baiviet->baiviet_tieude}}
                    @endforeach
                </a></li>
            </ol>
            <br>
            <hr>
        </div>
    </section>

   <section class="content my-4">
        <div class="container">
            <div class="noidung bg-white" style=" width: 100%;">

            <div class="product-image-wrapper">
            @foreach($baiviet as $data_baiviet)
                <p>{!!$data_baiviet->baiviet_noidung!!}</p>
            @endforeach 
            </div>

            </div>
            <!--het div noidung-->
        </div>
        <!--het container-->
    </section>
    
@endsection