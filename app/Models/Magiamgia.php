<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magiamgia extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_magiamgia';
    protected $primaryKey = 'magiamgia_id';

    protected $fillable = [
        'magiamgia_ten', 'magiamgia_ma', 'magiamgia_soluong', 'magiamgia_tinhnang', 'magiamgia_giagiam'
    ] ;

}
