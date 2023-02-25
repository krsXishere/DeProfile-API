<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $table = 'desas';
    protected $fillable = [
        'kode',
        'desa',
        'kecamatan_id',
    ];

    protected $hidden = [];

    public function sekolah() {
        return $this->hasMany(Sekolah::class);
    }
}
