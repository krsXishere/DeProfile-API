<?php

namespace App\Imports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\ToModel;

class GuruImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Guru([
            'nip' => $row[0],
            'nama' => $row[1],
            'jenis_kelamin' => $row[2],
            'tempat_lahir' => $row[3],
            'tanggal_lahir' => $row[4],
            'pendidikan' => $row[5],
            'jurusan' => $row[6],
            'alamat' => $row[7],
            'no_telpon' => $row[8],
            'email' => $row[9],
            'sekolah_id' => $row[10],
        ]);
    }
}
