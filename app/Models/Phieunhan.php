<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phieunhan extends Model
{
    use HasFactory;

    protected $table = 'phieunhan';

    public $timestamps = false;

    protected $fillable = [
        'tenkhachhang',
        'sdtkhachhang',
        'diachi',
        'loaimay',
        'imei',
        'ghichu',
        'tinhtrangmay',
        'thoigianhentra',
        'nguoinhan'
    ];

    public function nhanvien()
    {
        return $this->belongsTo(Nhanvien::class, 'nguoinhan');
    }

    public function dichvu()
    {
        return $this->belongsToMany(Dichvu::class, 'phieunhan_dichvu', 'maphieu', 'madv');
    }

    public function phieusua()
    {
        return $this->hasOne(Phieusua::class, 'maphieunhan', 'id');
    }
}
