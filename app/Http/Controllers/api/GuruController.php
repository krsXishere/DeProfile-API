<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Helpers\APIFormatter;

class GuruController extends Controller
{
    public function index() {
        $guru = Guru::all();

        if($guru) {
            return APIFormatter::createAPI(200, 'Success', $guru);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function show($id) {
        $data = Guru::where('id', '=', $id)->orWhere('nip','LIKE','%'.$id.'%')->orWhere('nama','LIKE','%'.$id.'%')->get();

        if ($data) {
            return APIFormatter::createAPI(200, 'Success', $data);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'nip' => 'required',
                'nama' => 'required',
                'jenis_kelamin' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'pendidikan' => 'required',
                'jurusan' => 'required',
                'alamat' => 'required',
                'no_telpon' => 'required',
                'email' => 'required',
                'sekolah_id' => 'required',
            ]);

            $guru = Guru::create([
                'nip' => $request->nip,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'pendidikan' => $request->pendidikan,
                'jurusan' => $request->jurusan,
                'alamat' => $request->alamat,
                'no_telpon' => $request->no_telpon,
                'email' => $request->email,
                'sekolah_id' => $request->sekolah_id,
            ]);

            $data = Guru::where('id', '=', $guru->id)->get();

            if ($data) {
                return APIFormatter::createAPI(200, 'Success', $data);
            } else {
                return APIFormatter::createAPI(400, 'Failed');
            }
        } catch (Exception $error) {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function update(Request $request, $id)
    {
        try {
             $request->validate([
                'nip' => 'required',
                'nama' => 'required',
                'jenis_kelamin' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'pendidikan' => 'required',
                'jurusan' => 'required',
                'alamat' => 'required',
                'no_telpon' => 'required',
                'email' => 'required',
            ]);

            $guru = Guru::find($id);

            $guru->update($request->all());

            $data = Guru::where('id', '=', $guru->id)->get();

            if ($data) {
                return APIFormatter::createAPI(200, 'Success', $data);
            } else {
                return APIFormatter::createAPI(400, 'Failed');
            }
        } catch (Exception $error) {
            echo $error;
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function destroy($id)
    {
        try {
            $guru = Guru::findOrFail($id);
            $data = $guru->delete();

            if ($data) {
                return APIFormatter::createAPI(200, 'Success');
            } else {
                return APIFormatter::createAPI(400, 'Failed');
            }
        } catch (Exception $error) {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }
}
