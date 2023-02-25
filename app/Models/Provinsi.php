<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $table = 'provinsis';
    protected $fillable = [
        'kode',
        'provinsi',
    ];

    protected $hidden = [];

    public function kabupaten() {
        return $this->hasMany(Kabupaten::class);
    }
}
