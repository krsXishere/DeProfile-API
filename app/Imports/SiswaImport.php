<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            'nisn' => $row[0],
            'nama' => $row[1],
            'jenis_kelamin' => $row[2],
            'tempat_lahir' => $row[3],
            'tanggal_lahir' => $row[4],
            'pendidikan' => $row[5],
            'alamat' => $row[6],
            'no_telpon' => $row[7],
            'email' => $row[8],
            'jurusan_id' => $row[9],
        ]);
    }
}
