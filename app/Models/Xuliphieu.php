<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xuliphieu extends Model
{
    use HasFactory;

    protected $table = 'xuliphieu';

    public function nhanvien()
    {
        return $this->belongsTo(Nhanvien::class, 'manv', 'id');
    }
}
