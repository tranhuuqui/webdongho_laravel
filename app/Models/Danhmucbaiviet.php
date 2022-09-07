<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhmucbaiviet extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_danhmucbaiviet';
    protected $primaryKey = 'danhmucbaiviet_id';

    protected $fillable = [
        'danhmucbaiviet_ten', 'danhmucbaiviet_trangthai'
    ] ;

    public function baiviet(){
        return $this->hasMany('App\Models\Baiviet');
    }
}
