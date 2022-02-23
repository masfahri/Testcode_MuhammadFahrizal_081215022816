<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kelurahan extends Model
{
    use HasFactory;
    protected $table = 't_kelurahans';
    protected $fillable = [
        'kode',
        'kode_kecamatan',
        'nama',
        'flag'
    ];

    /**
     * Get the Kecamatan that owns the Kelurahan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Kecamatan(): HasOne
    {
        return $this->hasOne(Kecamatan::class, 'kode', 'kode_kecamatan');
    }
}
