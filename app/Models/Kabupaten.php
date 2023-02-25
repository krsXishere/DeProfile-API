<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;

    protected $table = 'kabupatens';
    protected $fillable = [
        'kode',
        'kabupaten',
        'provinsi_id',
    ];

    protected $hidden = [];

    public function kecamatan() {
        return $this->hasMany(Kecamatan::class);
    }
}
