<?php

namespace App\Imports;

use App\Models\Provinsi;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;

class ProvinsiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $kode = Str::random(6);
        return new Provinsi([
            'kode' => $kode,
            'provinsi' => $row[0],
        ]);
    }
}
