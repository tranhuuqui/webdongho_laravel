    <div class="container">
      @if(session('cart'))
        <form>
          @csrf
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Tổng giá</th>
                <th scope="col">Quản lý</th>
              </tr>
            </thead>
            <tbody>
                <?php 
                  $stt = 0;
                  $tong = 0;
                ?>
                @foreach($carts as $cart)
                    <?php 
                        $stt++;
                        $tong += $cart['gia'] * $cart['soluong'];
                    ?>
                    <tr>
                        <th scope="row">{{$stt}}</th>
                        <td>{{$cart['ten']}}</td>
                        <td><img src="{{URL::to('uploads/'.$cart['hinhanh'])}}" alt="" width="100px" height="80px"></td>
                        <td>{{number_format($cart['gia'])}} VNĐ</td> 
                        <td>
                          <input type="number" class="cart_qty_update" data-id="{{$cart['id']}}" value="{{$cart['soluong']}}" min="1" style="width: 65px;">
                        </td>
                        <td>{{number_format($cart['gia'] * $cart['soluong'])}} VNĐ</td>
                        <td style="text-align: center;"><a href="#" class="delete_cart" data-id="{{$cart['id']}}"  data-url="{{route('deleteCart',['id'=>$cart['id']])}}"><i class="fa fa-times"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
          </table>
          @endif
          @if(!session('cart'))
            <div style="text-align: center;">Hiện không có sản phẩm trong giỏ hàng <a href="{{url('/')}}">Thêm sản phẩm</a></div>
          @endif
          </form>
          <br>
          <hr>
          @if(session('cart'))
           <!-- Địa chi nhận hàng -->
                  <div>
                    <h4 style="color: blue;">Địa chỉ nhận hàng</h4>
                    <br>
                    <form>
                      @csrf
                        <div class="form-group row">
                          <div class="col-md-2">
                              <label style="padding-left: 20px;">Tỉnh/thành phố:</label>
                          </div>
                          <div class="col-md-8">
                              <select name="thanhpho" id="thanhpho" class="form-control choose thanhpho">
                                  <option value="1">---Chọn tỉnh/thành phố---</option>
                                  @foreach($thanhpho as $tp)
                                      <option value="{{$tp->matp}}">{{$tp->name_tinhthanhpho}}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-2">
                              <label style="padding-left: 20px;">Quận/huyện:</label>
                          </div>
                          <div class="col-md-8">
                              <select name="quanhuyen" id="quanhuyen" class="form-control choose quanhuyen">
                                  <option value="">---Chọn quận/huyện---</option>
                                  
                              </select>
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-2">
                              <label style="padding-left: 20px;">Xã/phường/thị trấn:</label>
                          </div>
                          <div class="col-md-8">
                              <select name="xaphuong" id="xaphuong" class="form-control xaphuong">
                                  <option value="">---Chọn xã/phường/thị trấn---</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-2">
                              <label style="padding-left: 20px;">Số nhà,tên đường:</label>
                          </div>
                          <div class="col-md-8">
                              <input type="text" class="form-control sonha" name="sonha" require>
                          </div>
                      </div> 
                      <div style="padding-left: 400px;">
                        <button type="button"  class="btn btn-primary xacnhandiachi">Xác nhận</button>
                      </div>         
                    </form> 
                </div>
                <br>
                <hr>
              <!---->
              @endif
          @if(session('cart'))
            <form action="{{url('/check-coupon')}}" method="POST">
              {{csrf_field()}}
              @if(session('message'))
                <div class="alert alert-success">
                  {{session('message')}}
                </div>
              @endif
              @if(session('error'))
                <div class="alert alert-danger">
                  {{session('error')}}
                </div>
              @endif
              <h4 style="color: blue;">Thanh toán giỏ hàng</h4> 
              <br>
              <div class="row">
                <div class="col-md-2">
                  <input type="text" class="form-control" name="magiamgia" placeholder="nhập mã giảm giá" style="width: 180px;">
                </div>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-info check_coupon">OK</button>
                  @if(session('magiamgia'))
                    <a href="{{url('/del-magiamgia')}}" class="btn btn-sm btn-info">Xóa mã khuyến mãi</a>
                  @endif
                </div> 
              </div>
            </form>
            <?php
              $magiamgia = session('magiamgia');
            ?>
            @if($magiamgia)
                <?php
                  if($magiamgia['magiamgia_tinhnang']==1){
                    $tong_giamgia = ($tong*$magiamgia['magiamgia_giagiam'])/100;
                ?>
                  <br>
                  <h5>Tổng giá: {{number_format($tong)}} VNĐ</h5>
                  <p>Giá giảm: - {{number_format($tong_giamgia)}} VNĐ (-{{$magiamgia['magiamgia_giagiam']}}%)</p>
                  <p>Phí vận chuyển: {{number_format(session('phivanchuyen'))}} VNĐ </p>
                  <h4 style="color:red;">Tổng cần thanh toán: {{number_format($tong - $tong_giamgia + session('phivanchuyen'))}} VNĐ</h4>
                <?php
                  }elseif($magiamgia['magiamgia_tinhnang']==2){
                ?>
                  <br>
                  <h5>Tổng giá: {{number_format($tong)}} VNĐ</h5>
                  <p>Giá giảm: - {{number_format($magiamgia['magiamgia_giagiam'])}} VNĐ</p>
                  <p>Phí vận chuyển: {{number_format(session('phivanchuyen'))}} VNĐ </p>
                  <h4 style="color:red;">Tổng cần thanh toán: {{number_format($tong-$magiamgia['magiamgia_giagiam'] + session('phivanchuyen'))}} VNĐ</h4>
                <?php
                  }
                ?>
            @endif
            @if(!$magiamgia)
              <br>
              <p>Tổng giá: {{number_format($tong)}} VNĐ</p>
              <p>Phí vận chuyên: {{number_format(session('phivanchuyen'))}} VNĐ </p>
              <h4 style="color:red;">Tổng cần thanh toán: {{number_format($tong + session('phivanchuyen'))}} VNĐ</h4>
            @endif
            <form action="{{URL::to('/checkout')}}" method="POST">
              @csrf
              <?php 
                $khachhang_id=session('khachhang_id');
                if($khachhang_id != NULL){
                  if(session('phivanchuyen')){
              ?>
                <button type="submit" class="btn btn-primary">Đặt hàng</button>
                <?php 
                  }else{
                ?>
                <p style="color: red;">Vui lòng xác nhận địa chỉ nhận hàng để đặt hàng</p>
                <?php
                  }
                ?>
              </form>
              <?php 
                }else{
              ?>
                <a class="btn btn-primary text-center" href="#" data-toggle="modal" data-target="#formdangnhap">Đặt hàng</a>
              <?php
                }
              ?>
          @endif
      </div>