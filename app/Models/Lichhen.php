<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lichhen extends Model
{
    use HasFactory;

    protected $table = 'lichhen';

    protected $fillable = [
        'tenkhachhang',
        'sodienthoai',
        'email',
        'ngayhen',
        'thoigianhen',
        'ghichu',
        'trangthai'
    ];
}
