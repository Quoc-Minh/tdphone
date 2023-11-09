<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linhkien extends Model
{
    use HasFactory;

    protected $table = "linhkien";

    protected $fillable = [
        'ten',
        'soluong',
        'gia',
        'mota'
    ];
}
