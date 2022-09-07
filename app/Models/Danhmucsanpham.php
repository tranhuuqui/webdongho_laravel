<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Danhmucsanpham extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_danhmucsanpham';
    protected $primaryKey = 'danhmuc_id';

    protected $fillable = [
        'danhmuc_ten', 'danhmuc_trangthai'
    ] ;

    public function sanpham(){
        return $this->hasMany('App\Models\Sanpham');
    }
   
}

