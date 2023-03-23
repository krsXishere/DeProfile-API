<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    use HasFactory;

    protected $table = 'kurikulums';
    protected $fillable = [
        'kurikulumser',
        'keterangan',
    ];

    protected $hidden = [];

    public function jurusan() {
        return $this->hasMany(Jurusan::class);
    }
}
