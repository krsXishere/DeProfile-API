<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sekolah extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'sekolahs';
    protected $fillable = [
        'nss',
        'npsn', 
        'nama',
        'alamat',
        'desa_id',
        'rw',
        'rt',
        'no_telpon',
        'no_fax',
        'lat_long',
        'image',
        'email',
        'kepala_sekolah',
    ];

    protected $hidden = [];

    public function guru() {
        return $this->hasMany(Guru::class);
    }

    public function fasilitas() {
        return $this->hasMany(Fasilitas::class);
    }

    public function ekstrakulikuler() {
        return $this->hasMany(Ekstrakulikuler::class);
    }

    public function prestasi() {
        return $this->hasMany(Prestasi::class);
    }

    public function galeri() {
        return $this->hasMany(Galeri::class);
    }

    public function jurusan() {
        return $this->hasMany(Jurusan::class);
    }
}
