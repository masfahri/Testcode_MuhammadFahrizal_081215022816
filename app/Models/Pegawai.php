<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 't_pegawais';
    protected $fillable = [
        'nama_pegawai',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'kode_kelurahan',
        'kode_kecamatan',
        'kode_provinsi',
    ];

    /**
     * Get the Kelurahan associated with the Pegawai
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Kelurahan(): HasOne
    {
        return $this->hasOne(Kelurahan::class, 'kode_kelurahan', 'kode');
    }

    /**
     * Get the Provinsi associated with the Pegawai
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Provinsi(): HasOne
    {
        return $this->hasOne(Provinsi::class, 'kode_provinsi', 'kode');
    }
}
