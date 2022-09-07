<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baiviet extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_baiviet';
    protected $primaryKey = 'baiviet_id';

    protected $fillable = [
        'danhmucbaiviet_id','baiviet_tieude','baiviet_mota','baiviet_noidung','baiviet_hinhanh','baiviet_trangthai'
    ] ;

    public function danhmucbaiviet(){
        return $this->belongsTo('App\Models\Danhmucbaiviet','danhmucbaiviet_id');
    }
}
