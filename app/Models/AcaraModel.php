<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcaraModel extends Model
{
    use HasFactory;
    protected $table = 'acara';
    protected $fillable = [
        'tanggal',
        'waktu',
        'tempat',
        'alamat',
        'maps',
        'longlat',
        'flag',
    ];
}
