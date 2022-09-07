<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Indonhang</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    body{
      margin: 0;
      padding: 0;
      font-family: Dejavu Sans; 
    }
  </style>
</head>
<body>
  <h3 style="text-align: center;">CUA HANG DONG HO THONG MINH Q-STORE</h3>
  <p style="text-align: center;">----------------------------------</p>
<section class="content">
            <div class="card-header">
                <h4>Customer information</h4>
              </div>
            
            <div class="card-body"> 
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th style="text-align: center;">Tên khách hàng</th>
                    <th style="text-align: center;">Số điện thoại</th>
                    <th style="text-align: center;">Email</th>
                  </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td style="text-align: center;">{{$khachhang->khachhang_ten}}</td>
                      <td style="text-align: center;">{{$khachhang->khachhang_sdt}}</td>
                      <td style="text-align: center;">{{$khachhang->khachhang_email}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
    </section>

    <section class="content">
            <div class="card-header">
                <h4>Order</h4>
              </div>
            
            <div class="card-body"> 
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th style="text-align: center;">Sản phẩm tên</th>
                    <th style="text-align: center;">Sản phẩm giá</th>
                    <th style="text-align: center;">Số lượng</th>
                    <th style="text-align: center;">Tổng giá</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                        $tong=0;
                      ?>
                    @foreach($donhang_chitiet as $dhct)
                    <tr>
                      <td style="text-align: center;">{{$dhct->sanpham_ten}}</td>
                      <td style="text-align: center;">{{number_format($dhct->sanpham_gia)}} VNĐ</td>
                      <td style="text-align: center;">{{$dhct->sanpham_soluong_mua}}</td>
                      <?php
                        $tonggia = $dhct->sanpham_gia * $dhct->sanpham_soluong_mua;
                        $tong += $tonggia;   
                        $phivanchuyen = $dhct->phivanchuyen;   
                      ?>
                      <td style="text-align: center;">{{number_format($tonggia)}} VNĐ</td>
                    </tr>
                    @endforeach
                    @if($magiamgia)
                    <tr>
                    <td colspan="6">
                        <?php
                          $mgg = $magiamgia->magiamgia_giagiam;
                          $mgg_tn = $magiamgia->magiamgia_tinhnang;
                          $tonggiam = 0;
                        ?>
                        @if($mgg_tn==1)
                          <?php
                            $tonggiam = ($tong * $mgg)/100;
                            echo 'Giảm:-'.$mgg.'%';
                          ?><br>
                          Phí vận chuyển: {{number_format($phivanchuyen)}} VNĐ
                          <br>
                        @else
                          <?php
                            $tonggiam = $mgg;
                            echo 'Giảm:-'.number_format($mgg).'VND';
                          ?>
                          <br>
                          Phí vận chuyển: {{number_format($phivanchuyen)}} VNĐ
                          <br>
                        @endif

                        <b>Thanh toán: {{number_format($tong - $tonggiam + $phivanchuyen)}} VNĐ</b></td>
                    </tr>
                    @else
                      <tr>
                        
                        <td colspan="6">
                          Phí vận chuyển:{{number_format($phivanchuyen)}} VNĐ <br>
                          <b>Thanh toán: {{number_format($tong + $phivanchuyen)}} VNĐ </b></td>
                      </tr>
                    @endif
                  </tbody>
                </table>
                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <td>
                        <b style="padding-left:30px">Người nhận</b> <br>
                        <i>(Ký và ghi rõ họ tên)</i></td></td>
                      <td style="text-align: right;">
                        <b style="padding-right:30px">Người nhận</b> <br>
                        <i>(Ký và ghi rõ họ tên)</i></td>
                    </tr>
                  </thead>
                </table>
              </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
