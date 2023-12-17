<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoadon extends Model
{
    use HasFactory;

    protected $table = 'hoadon';

    protected $fillable = [
        'tenkhachhang',
        'sdtkhachhang',
        'diachi',
        'loaimay',
        'imei',
        'dichvu',
    ];
}
