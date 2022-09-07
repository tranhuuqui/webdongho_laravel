<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XaPhuong extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_xaphuongthitran';
    protected $primaryKey = 'xaid';

    protected $fillable = [
        'name_xaphuong', 'type', 'maqh'
    ] ;
}
