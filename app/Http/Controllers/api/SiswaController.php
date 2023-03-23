<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Helpers\APIFormatter;

class SiswaController extends Controller
{
    public function index() {
        $siswa = Siswa::all();

        if($siswa) {
            return APIFormatter::createAPI(200, 'Success', $siswa);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function show($id) {
        // where('id', '=', $id)->
        $data = Siswa::orWhere('nisn','LIKE','%'.$id.'%')->orWhere('nama','LIKE','%'.$id.'%')->get();

        if ($data) {
            return APIFormatter::createAPI(200, 'Success', $data);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'nisn' => 'required',
                'nama' => 'required',
                'jenis_kelamin' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'pendidikan' => 'required',
                'alamat' => 'required',
                'no_telpon' => 'required',
                'email' => 'required',
                'jurusan_id' => 'required',
            ]);

            $siswa = Siswa::create([
                'nisn' => $request->nisn,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'pendidikan' => $request->pendidikan,
                'alamat' => $request->alamat,
                'no_telpon' => $request->no_telpon,
                'email' => $request->email,
                'jurusan_id' => $request->jurusan_id,
            ]);

            $data = Siswa::where('id', '=', $siswa->id)->get();

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
                'nisn' => 'required',
                'nama' => 'required',
                'jenis_kelamin' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'pendidikan' => 'required',
                'alamat' => 'required',
                'no_telpon' => 'required',
                'email' => 'required',
            ]);

            $siswa = Siswa::find($id);

            $siswa->update($request->all());

            $data = Siswa::where('id', '=', $siswa->id)->get();

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
            $siswa = Siswa::findOrFail($id);
            $data = $siswa->delete();

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
