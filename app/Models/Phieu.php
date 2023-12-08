<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phieu extends Model
{
    use HasFactory;

    protected $table = 'phieu';

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
    ];

    public function nhanvien()
    {
        return $this->belongsToMany(Nhanvien::class, 'xuliphieu', 'maphieu', 'manv')->as('xlphieu')->withPivot(['ghichu', 'trangthai', 'updated_at']);
    }

    public function dichvu()
    {
        return $this->belongsToMany(Dichvu::class, 'phieu_dichvu', 'maphieu', 'madv');
    }

    public function xlphieu()
    {
        return $this->hasMany(Xuliphieu::class, 'maphieu', 'id');
    }
}
