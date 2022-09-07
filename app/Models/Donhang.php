<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donhang extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_donhang';
    protected $primaryKey = 'donhang_id';

    protected $fillable = [
        'khachhang_id', 'diachi_nhanhang', 'donhang_ma', 'donhang_gia', 'donhang_trangthai'
    ] ;

    public function khachhang(){
        return $this->belongsTo('App\Models\Khachhang','khachhang_id');
    }

    public function chitietdonhang(){
        return $this->hasMany('App\Models\Donhangchitiet');
    }
}

