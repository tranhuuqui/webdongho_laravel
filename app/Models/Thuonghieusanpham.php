<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Thuonghieusanpham extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_thuonghieu';
    protected $primaryKey = 'thuonghieu_id';

    protected $fillable = [
        'thuonghieu_ten', 'thuonghieu_trangthai'
    ] ;

    public function sanpham(){
        return $this->hasMany('App\Models\Sanpham');
    }
   
}