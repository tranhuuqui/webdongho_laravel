@extends('index_layout')
@section('content')
  <section class="breadcrumbbar">
        <div class="container">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active"><a>Giỏ hàng của bạn</a></li>
            </ol>
            <br>
            <hr>
        </div>
  </section>
  <section class="content my-4">
    <div class="cart_wrapper">
      @include('layouts.cart_content')
    </div>
  </section>
@endsection