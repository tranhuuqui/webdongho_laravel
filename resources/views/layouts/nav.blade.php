<div class="nav-bg">
    <nav class="container">
        <ul class="main-menu">
            <li><a href="{{url('/')}}">Trang chủ</a></li>
            <li><a href="{{URL::to('/sanpham-all')}}">Sản phẩm</a></li>
            <li><a href="#">Danh mục <i class="fa fa-caret-down fa-css"></i></a>
                <ul class="sub-menu">
                    @foreach($all_danhmuc as $all_dm)
                        <li><a href="{{URL::to('/sanpham-danhmuc/'.$all_dm->danhmuc_id)}}">{{$all_dm->danhmuc_ten}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="#">Thương hiệu <i class="fa fa-caret-down fa-css"></i></a>
                <ul class="sub-menu">
                    @foreach($all_thuonghieu as $all_th)
                        <li><a href="{{URL::to('/sanpham-thuonghieu/'.$all_th->thuonghieu_id)}}">{{$all_th->thuonghieu_ten}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="#">Tin tức <i class="fa fa-caret-down fa-css"></i></a>
                <ul class="sub-menu">
                    @foreach($all_danhmucbaiviet as $all_dmbv)
                        <li><a href="{{URL::to('/danhmucbaiviet/'.$all_dmbv->danhmucbaiviet_id)}}">{{$all_dmbv->danhmucbaiviet_ten}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="{{url('/show-lienhe')}}">Liên hệ</a></li>
        </ul>
    </nav>
</div>