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
        'gia',
        'mota'
    ];
}