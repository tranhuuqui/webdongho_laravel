<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khachhang extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_khachhang';
    protected $primaryKey = 'khachhang_id';

    protected $fillable = [
        'khachhang_ten', 'khachhang_email', 'khachhang_password', 'khachhang_sdt', 'khachhang_diachi'
    ] ;

    public function donhang(){
        return $this->hasMany('App\Models\Donhang');
    }
}
