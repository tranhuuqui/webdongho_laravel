                        <form>
                            {{csrf_field()}}
                                <input type="hidden" value="{{$all_sp->sanpham_id}}" class="cart_sanpham_id_{{$all_sp->sanpham_id}}">
                                <input type="hidden" value="{{$all_sp->sanpham_ten}}" class="cart_sanpham_ten_{{$all_sp->sanpham_id}}">
                                <input type="hidden" value="{{$all_sp->sanpham_hinhanh}}" class="cart_sanpham_hinhanh_{{$all_sp->sanpham_id}}">
                                <input type="hidden" value="{{$all_sp->sanpham_gia}}" class="cart_sanpham_gia_{{$all_sp->sanpham_id}}">
                                <input type="hidden" value="1" class="cart_sanpham_soluong_{{$all_sp->sanpham_id}}">

                                <a href="{{URL::to('/sanpham-chitiet/'.$all_sp->sanpham_id)}}" class="motsanpham" style="text-decoration: none; color: black;" >
                                    <img class="card-img-top anh" src="{{URL::to('public/storage/'.$all_sp->sanpham_hinhanh)}}">
                                    <div class="card-body noidungsp mt-3">
                                        <h3 class="ten" style="font-size: 15px;">{{$all_sp->sanpham_ten}}</h3>
                                        <div class="gia d-flex align-items-baseline">
                                            <div class="giamoi">{{number_format($all_sp->sanpham_gia).' vnđ'}}</div>
                                            <div class="giacu text-muted">139.000 ₫</div>
                                        </div>
                                    </div>
                                </a>
                                <div class="danhgia" style="padding-left: 10px;">
                                    <ul class="d-flex" style="list-style: none;">
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><span class="text-muted">0 nhận xét</span></li>
                                    </ul>
                                </div>
                                <div style="padding-left: 10px; padding-top:10px">
                                    <button type="submit" class="btn btn-primary add-to-cart" data-id_sanpham="{{$all_sp->sanpham_id}}"> <i class="fa fa-cart-plus"></i> Thêm và giỏ hàng</button>
                                </div>
                            </form>


            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['sanpham_id']==$data['cart_sanpham_id']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                    'session_id' => $session_id,
                    'sanpham_ten' => $data['cart_sanpham_ten'],
                    'sanpham_id' => $data['cart_sanpham_id'],
                    'sanpham_hinhanh' => $data['cart_sanpham_hinhanh'],
                    'sanpham_soluong' => $data['cart_sanpham_soluong'],
                    'sanpham_gia' => $data['cart_sanpham_gia'],
    
                );
                Session::put('cart', $cart);
            }


<script>
       function AddCart(id){
        $.ajax({
            url: 'Add-Cart/'+id,
            type: 'GET',
        }).done(function(data){
            swal("Hello world!");
        });
       }
    </script>

    <script>
        $(document).ready(function(){
            $('.add-to-cart').click(function(){
                var id = $(this).data('id_sanpham');
                var cart_sanpham_id = $('.cart_sanpham_id_' + id).val();
                var cart_sanpham_ten = $('.cart_sanpham_ten_' + id).val();
                var cart_sanpham_hinhanh = $('.cart_sanpham_hinhanh_' + id).val();
                var cart_sanpham_gia = $('.cart_sanpham_gia_' + id).val();
                var cart_sanpham_soluong = $('.cart_sanpham_soluong_' + id).val();
                $.ajax({
                    url: "{{route('cart.add')}}",
                    method: "POST",
                    success:function(data){
                        alert('thanhcong');
                    }
                });
            });
        });
</script>

                var cart_sanpham_id = $('.cart_sanpham_id_' + id).val();
                var cart_sanpham_ten = $('.cart_sanpham_ten_' + id).val();
                var cart_sanpham_hinhanh = $('.cart_sanpham_hinhanh_' + id).val();
                var cart_sanpham_gia = $('.cart_sanpham_gia_' + id).val();
                var cart_sanpham_soluong = $('.cart_sanpham_soluong_' + id).val(); 

                src="{{URL::to('uploads/'.$all_sp->sanpham_hinhanh)}}"

            @if(session('magiamgia'))
              @foreach(session('magiamgia') as $key => $cou)
                @if($cou['magiamgia_tinhnang']==1)
                  <p>Mã giảm: -{{$cou['magiamgia_giagiam']}}%</p>
                  <p>
                    @php
                     $tong_giamgia = ($tong*$cou['magiamgia_giagiam'])/100;
                     echo '<p>Tổng giảm:' .number_format($tong_giamgia).'VNĐ</p>'
                    @endphp
                  </p>
                  <p>{{number_format($tong-$tong_giamgia)}} VNĐ</p>
                @endif
                @if($cou['magiamgia_tinhnang']==2)
                  Mã giảm: -{{number_format($cou['magiamgia_giagiam'])}} VNĐ
                  <p>{{number_format($tong-$cou['magiamgia_giagiam'])}} VNĐ</p>
                @endif
              @endforeach
            @endif