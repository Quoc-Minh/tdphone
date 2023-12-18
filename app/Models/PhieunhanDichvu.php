<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PhieunhanDichvu extends Pivot
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'phieunhan_dichvu';

    protected $fillable = [
        'maphieu',
        'madv'
    ];
}
