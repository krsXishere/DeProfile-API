<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $table = 'prestasis';
    protected $fillable = [
        'nama',
        'jenis_prestasi',
        'tingkat',
        'keterangan',
        'sekolah_id',
    ];

    public function sekolah() {
        return $this->belongsTo(Sekolah::class);
    }

    protected $hidden = [];
}
