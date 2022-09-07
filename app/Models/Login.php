<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Login extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_admin';
    protected $primaryKey = 'admin_id';

    protected $fillable = [
        'admin_email', 'admin_password','admin_name','admin_phone'
    ] ;

    //public function sanpham(){
       // return $this->hasMany('App\Sanpham');
   // }
   
}