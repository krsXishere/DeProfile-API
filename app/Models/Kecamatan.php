<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'kecamatans';
    protected $fillable = [
        'kode',
        'kecamatan',
        'kabupaten_id',
    ];

    protected $hidden = [];

    public function desa() {
        return $this->hasMany(Desa::class);
    }
}
