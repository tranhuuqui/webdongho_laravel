<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donhangchitiet extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_donhangchitiet';
    protected $primaryKey = 'donhangchitiet_id';

    protected $fillable = [
        'donhang_ma', 'sanpham_id', 'sanpham_ten', 'sanpham_gia', 'sanpham_soluong_mua', 'phivanchuyen', 'magiamgia'
    ] ;

    public function donhang(){
        return $this->belongsTo('App\Models\Donhang','donhang_ma');
    }
}
