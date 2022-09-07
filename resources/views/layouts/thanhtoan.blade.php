@extends('index_layout')
@section('content')
<section class="content my-4">
    <div class="container">
        <h2 style="color: red; text-align:center;">Đặt hàng thành công</h2>
        <h3 style="color: blue; text-align:center;">Cảm ơn bạn đã mua sủa phẩm của chúng tôi!!!</h3>
        <div style="text-align: center;"><a href="{{URL::to('/')}}"><button class="btn btn-info">Tiếp tục mua hàng</button></a></div>
    </div>
</section>
@endsection