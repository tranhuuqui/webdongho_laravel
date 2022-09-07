<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phivanchuyen extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_phivanchuyen';
    protected $primaryKey = 'phivanchuyen_id';

    protected $fillable = [
        'phivanchuyen_matp', 'phivanchuyen_maqh', 'phivanchuyen_xaid', 'phivanchuyen_gia'
    ] ;

    public function TinhThanhpho(){
        return $this->belongsTo('App\Models\TinhThanhpho','phivanchuyen_matp');
    }
    public function QuanHuyen(){
        return $this->belongsTo('App\Models\QuanHuyen','phivanchuyen_maqh');
    }
    public function XaPhuong(){
        return $this->belongsTo('App\Models\XaPhuong','phivanchuyen_xaid');
    }
}
