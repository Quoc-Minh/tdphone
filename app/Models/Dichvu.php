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
        'trangthai'
    ];

    public function phieu()
    {
        return $this->belongsToMany(Phieu::class, 'phieu_dichvu', 'madv', 'maphieu');
    }
}
