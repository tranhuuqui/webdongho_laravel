<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thuoctinh extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_thuoctinh';
    protected $primaryKey = 'thuoctinh_id';

    protected $fillable = [
        'sanpham_id', 'sku', 'gia', 'size', 'stock'
    ] ;

    public function sanpham(){
        return $this->hasMany('App\Models\Sanpham');
    }
}
