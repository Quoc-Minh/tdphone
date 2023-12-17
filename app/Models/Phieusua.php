<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phieusua extends Model
{
    use HasFactory;

    protected $table = 'phieusua';

    public $timestamps = false;

    protected $fillable = [
        'maphieunhan',
        'trangthai',
        'thoigianbatdau',
        'thoigiantra',
        'nguoisua'
    ];

    public function nhanvien()
    {
        return $this->belongsTo(Nhanvien::class, 'nguoisua');
    }

    public function phieunhan()
    {
        return $this->belongsTo(Phieunhan::class, 'maphieunhan');
    }

    public function linhkien()
    {
        return $this->belongsToMany(Linhkien::class, 'phieusua_linhkien', 'maphieu', 'malk')->withPivot('soluong');
    }
}
