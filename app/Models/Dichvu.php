<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dichvu extends Model
{
    use HasFactory;

    protected $table = "dichvu";

    protected $fillable = [
        'ten',
        'hinh',
        'giadv',
        'giacong',
        'baohanh',
        'mota',
        'trangthai',
        'madanhmuc'
    ];

    public function phieu()
    {
        return $this->belongsToMany(Phieu::class, 'phieu_dichvu', 'madv', 'maphieu');
    }

    public function danhmuc()
    {
        return $this->belongsTo(Danhmuc::class, 'madanhmuc', 'id');
    }
}
