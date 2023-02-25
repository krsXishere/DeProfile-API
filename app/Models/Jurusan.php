<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusans';
    protected $fillable = [
        'jurusan',
        'keterangan',
        'tahun',
        'kurikulum_id',
        'sekolah_id',
        'akreditasi',
    ];

    protected $hidden = [];

    public function siswa() {
        return $this->hasMany(Siswa::class);
    }
}
