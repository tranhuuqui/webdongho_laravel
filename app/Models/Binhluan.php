<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Binhluan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_binhluan';
    protected $primaryKey = 'binhluan_id';

    protected $fillable = [
        'sanpham_id','khachhang_id','binhluan_noidung','binhluan_trangthai','binhluan_traloi'
    ] ;

    public function sanpham(){
        return $this->belongsTo('App\Models\Sanpham','sanpham_id');
    }
}
