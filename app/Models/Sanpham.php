<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_sanpham';
    protected $primaryKey = 'sanpham_id';

    protected $fillable = [
        'danhmuc_id','thuonghieu_id','sanpham_ten', 'sanpham_gia', 'sanpham_hinhanh', 'sanpham_soluong', 'sanpham_mota', 'sanpham_noidung', 'sanpham_sku', 'sanpham_trangthai',
        'man_hinh', 'thoi_luong_pin', 'ket_noi', 'mat', 'tinh_nang_suc_khoe'
    ] ;



    public function danhmucsanpham(){
        return $this->belongsTo('App\Models\Danhmucsanpham','danhmuc_id');
    }

    public function thuonghieusanpham(){
        return $this->belongsTo('App\Models\Thuonghieusanpham','thuonghieu_id');
    }

    public function thuoctinh(){
        return $this->hasMany('App\Models\Thuoctinh','sanpham_id');  
    }
    public function binhluan(){
        return $this->hasMany('App\Models\Binhluan','sanpham_id');  
    }
}
