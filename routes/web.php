<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DanhmucsanphamController;
use App\Http\Controllers\ThuonghieusanphamController;
use App\Http\Controllers\SanphamController;
use App\Http\Controllers\ThuoctinhController;
use App\Http\Controllers\ThongsokythuatController;
use App\Http\Controllers\GiohangController;
use App\Http\Controllers\MagiamgiaController;
use App\Http\Controllers\PhivanchuyenController;
use App\Http\Controllers\KhachhangController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DonhangController;
use App\Http\Controllers\BinhluanController;
use App\Http\Controllers\DanhmucbaivietController;
use App\Http\Controllers\BaivietController;
use App\Http\Controllers\LienheController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Trangchu
    //frontend
        Route::get('/', [HomeController::class, 'index_layout']);
        Route::post('/timkiem', [HomeController::class, 'timkiem']);
    //backend
        Route::get('/admin', [AdminController::class, 'index']);
        Route::get('/admin_home', [AdminController::class, 'show_dashboard']);
        Route::get('/logout', [AdminController::class, 'logout']);
        Route::post('/admin-login', [AdminController::class, 'login']);

//sanpham
    //frontend
        //San pham theo danh muc
        Route::get('/sanpham-danhmuc/{id}', [DanhmucsanphamController::class, 'sanpham_danhmuc']);
        //San pham theo thuong hieu
        Route::get('/sanpham-thuonghieu/{id}', [ThuonghieusanphamController::class, 'sanpham_thuonghieu']);
        //San pham
        Route::get('/sanpham-all', [SanphamController::class, 'sanpham_all']);
        //Chi tiet san pham
        Route::get('/sanpham-chitiet/{id}', [SanphamController::class, 'sanpham_chitiet']);

    //backend
        Route::get('/lietke-sanpham', [SanphamController::class, 'index']);
        Route::get('/them-sanpham', [SanphamController::class, 'create']);
        Route::post('/luu-sanpham', [SanphamController::class, 'store']);
        Route::get('/capnhat-sanpham/{id}', [SanphamController::class, 'edit']);
        Route::post('/luucapnhat-sanpham/{id}', [SanphamController::class, 'update']);
        Route::get('/xoa-sanpham/{id}', [SanphamController::class, 'destroy']);
        Route::get('/unactive-sanpham/{id}', [SanphamController::class, 'unactive']);
        Route::get('/active-sanpham/{id}', [SanphamController::class, 'active']);
        Route::post('/timkiem_sanpham', [SanphamController::class, 'search']);


//Gio hang
    Route::get('/add-to-cart/{id}', [GiohangController::class, 'addTocart'])->name('addToCart');
    Route::get('/show-cart', [GiohangController::class, 'showCart'])->name('showCart');
    Route::post('/update-cart', [GiohangController::class, 'updateCart'])->name('updateCart');
    Route::get('/delete-cart/{id}', [GiohangController::class, 'deleteCart'])->name('deleteCart');
    Route::post('/giohang', [GiohangController::class, 'create_giohang']);//Thêm từ chi tiết
    Route::post('/thanhtoan-giohang', [CheckoutController::class, 'thanhtoan_giohang']);

//Danh muc san pham
    Route::get('/lietke-danhmucsanpham', [DanhmucsanphamController::class, 'index']);
    Route::get('/them-danhmucsanpham', [DanhmucsanphamController::class, 'create']);
    Route::post('/luu-danhmucsanpham', [DanhmucsanphamController::class, 'store']);
    Route::get('/capnhat-danhmucsanpham/{id}', [DanhmucsanphamController::class, 'edit']);
    Route::post('/luucapnhat-danhmucsanpham/{id}', [DanhmucsanphamController::class, 'update']);
    Route::get('/xoa-danhmucsanpham/{id}', [DanhmucsanphamController::class, 'destroy']);
    Route::get('/unactive-danhmuc/{id}', [DanhmucsanphamController::class, 'unactive']);
    Route::get('/active-danhmuc/{id}', [DanhmucsanphamController::class, 'active']);
    Route::post('/timkiem_danhmucsanpham', [DanhmucsanphamController::class, 'search']);

//Thương hieu san pham
    Route::get('/lietke-thuonghieusanpham', [ThuonghieusanphamController::class, 'index']);
    Route::get('/them-thuonghieusanpham', [ThuonghieusanphamController::class, 'create']);
    Route::post('/luu-thuonghieusanpham', [THuonghieusanphamController::class, 'store']);
    Route::get('/capnhat-thuonghieusanpham/{id}', [ThuonghieusanphamController::class, 'edit']);
    Route::post('/luucapnhat-thuonghieusanpham/{id}', [ThuonghieusanphamController::class, 'update']);
    Route::get('/xoa-thuonghieusanpham/{id}', [ThuonghieusanphamController::class, 'destroy']);
    Route::get('/unactive-thuonghieu/{id}', [ThuonghieusanphamController::class, 'unactive']);
    Route::get('/active-thuonghieu/{id}', [ThuonghieusanphamController::class, 'active']);
    Route::post('/timkiem_thuonghieusanpham', [ThuonghieusanphamController::class, 'search']);

//Danh muc bai viet
    //backend
        Route::get('/lietke-danhmucbaiviet', [DanhmucbaivietController::class, 'index']);
        Route::get('/them-danhmucbaiviet', [DanhmucbaivietController::class, 'create']);
        Route::post('/luu-danhmucbaiviet', [DanhmucbaivietController::class, 'store']);
        Route::get('/capnhat-danhmucbaiviet/{id}', [DanhmucbaivietController::class, 'edit']);
        Route::post('/luucapnhat-danhmucbaiviet/{id}', [DanhmucbaivietController::class, 'update']);
        Route::get('/xoa-danhmucbaiviet/{id}', [DanhmucbaivietController::class, 'destroy']);
        Route::get('/unactive-danhmuc/{id}', [DanhmucbaivietController::class, 'unactive']);
        Route::get('/active-danhmuc/{id}', [DanhmucbaivietController::class, 'active']);
    //frontend
        Route::get('/danhmucbaiviet/{id}', [DanhmucbaivietController::class, 'show_danhmuc']);

//Bai viet
    //frontend
        Route::get('/lietke-baiviet', [BaivietController::class, 'index']);
        Route::get('/them-baiviet', [BaivietController::class, 'create']);
        Route::post('/luu-baiviet', [BaivietController::class, 'store']);
        Route::get('/capnhat-baiviet/{id}', [BaivietController::class, 'edit']);
        Route::post('/luucapnhat-baiviet/{id}', [BaivietController::class, 'update']);
        Route::get('/xoa-baiviet/{id}', [BaivietController::class, 'destroy']);
        Route::get('/unactive-baiviet/{id}', [BaivietController::class, 'unactive']);
        Route::get('/active-baiviet/{id}', [BaivietController::class, 'active']);
    //backend
        Route::get('/baiviet/{id}', [BaivietController::class, 'show_baiviet']);


//Thuoc tinh san pham
    Route::get('/them-thuoctinh/{id}', [ThuoctinhController::class, 'create']);
    Route::post('/luu-thuoctinh/{id}', [ThuoctinhController::class, 'store']);
    Route::get('/xoa-thuoctinh/{id}', [ThuoctinhController::class, 'destroy']);

//Thong so ky thuat
    Route::get('/them-thongsokythuat/{id}', [ThongsokythuatController::class, 'edit']);
    Route::post('/luu-thongsokythuat/{id}', [ThongsokythuatController::class, 'update']);

//Ma giam gia
    //back-end
        Route::get('/lietke-magiamgia', [MagiamgiaController::class, 'index']);
        Route::get('/them-magiamgia', [MagiamgiaController::class, 'create']);
        Route::post('/luu-magiamgia', [MagiamgiaController::class, 'store']);
        Route::get('/xoa-magiamgia/{id}', [MagiamgiaController::class, 'destroy']);
    //front-end
        Route::post('/check-coupon', [GiohangController::class, 'check_coupon']);
        Route::get('/del-magiamgia', [MagiamgiaController::class, 'del_magiamgia']);

//Phi van chuyen
    //back-end
        Route::get('/lietke-phivanchuyen', [PhivanchuyenController::class, 'index']);
        Route::post('/chon-khuvuc', [PhivanchuyenController::class, 'chon_khuvuc'])->name('chonKhuvuc');//load tinh huyen xa
        Route::post('/them-phivanchuyen', [PhivanchuyenController::class, 'them_phivanchuyen'])->name('themPhivanchuyen');
        Route::post('/select-phivanchuyen', [PhivanchuyenController::class, 'select_phivanchuyen'])->name('selectPhivanchuyen');
        Route::post('/capnhat-phivanchuyen', [PhivanchuyenController::class, 'capnhat_phivanchuyen'])->name('capnhatPhivanchuyen');
//Khach hang
    //fontend
        Route::post('/them-khachhang', [KhachhangController::class, 'them_khachhang']);
        Route::post('/dangnhap-khachhang', [KhachhangController::class, 'dangnhap_khachhang']);
        Route::get('/logout-khachhang', [KhachhangController::class, 'logout_khachhang']);
    //backend
        Route::get('/lietke-khachhang', [KhachhangController::class, 'lietke_khachhang']);
        Route::get('/xoa-khachhang/{id}', [KhachhangController::class, 'destroy']);

//Checkout
    Route::post('/checkout', [CheckoutController::class, 'checkout']);
    Route::post('/diachinhanhang', [CheckoutController::class, 'diachinhanhang'])->name('diachinhanhang');//load tinh huyen xa
    Route::post('/xacnhandiachi', [CheckoutController::class, 'xacnhandiachi'])->name('xacnhandiachi');

//Don hang
    //backend
        Route::get('/quanlydonhang', [DonhangController::class, 'quanlydonhang']);
        Route::get('/chitietdonhang/{donhang_ma}', [DonhangController::class, 'chitietdonhang']);
        Route::get('/xoa-donhang/{donhang_ma}', [DonhangController::class, 'destroy']);
        Route::get('/duyet-donhang/{id}', [DonhangController::class, 'duyet_donhang']);
        Route::get('/indonhang/{checkout_code}', [DonhangController::class, 'indonhang']);
    //frontend
        Route::get('/xem-donhang/{khachhang_id}', [DonhangController::class, 'xem_donhang']);
        Route::get('/chitiet-donhang/{donhang_ma}', [DonhangController::class, 'chitiet_donhang']);
        Route::get('/huy-donhang/{id}', [DonhangController::class, 'huy_donhang']);

//Binh luan
    //frontend
        Route::post('/luu-binhluan', [BinhluanController::class, 'luu_binhluan']);

    // Bachend
        Route::get('/quanly-binhluan', [BinhluanController::class, 'quanly_binhluan']);
        Route::get('/unactive-binhluan/{binhluan_id}', [BinhluanController::class, 'unactive']);
        Route::get('/active-binhluan/{binhluan_id}', [BinhluanController::class, 'active']);
        Route::post('/traloi-binhluan', [BinhluanController::class, 'traloi_binhluan']);
        Route::get('/xoa-binhluan/{id}', [BinhluanController::class, 'destroy']);

//Lien he
Route::get('/show-lienhe', [LienheController::class, 'show_lienhe']);