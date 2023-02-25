<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakulikuler extends Model
{
    use HasFactory;

    protected $table = 'ekstrakulikulers';
    protected $fillable = [
        'jenis',
        'nama',
        'sekolah_id',
    ];

    protected $hidden = [];
}
