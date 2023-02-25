<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Helpers\APIFormatter;

class JurusanController extends Controller
{
    public function index() {
        $jurusan = Jurusan::all();

        if($jurusan) {
            return APIFormatter::createAPI(200, 'Success', $jurusan);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function show($id) {
        $data = Jurusan::where('id', '=', $id)->orWhere('jurusan','LIKE','%'.$id.'%')->orWhere('akreditasi','LIKE','%'.$id.'%')->first();

        if ($data) {
            return APIFormatter::createAPI(200, 'Success', $data);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'jurusan' => 'required',
                'keterangan' => 'required',
                'tahun' => 'required',
                'kurikulum_id' => 'required',
                'sekolah_id' => 'required',
                'akreditasi' => 'required',
            ]);

            $jurusan = Jurusan::create([
                'jurusan' => $request->jurusan,
                'keterangan' => $request->keterangan,
                'tahun' => $request->tahun,
                'kurikulum_id' => $request->kurikulum_id,
                'sekolah_id' => $request->sekolah_id,
                'akreditasi' => $request->akreditasi,
            ]);

            $data = Jurusan::where('id', '=', $jurusan->id)->get();

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
                'jurusan' => 'required',
                'keterangan' => 'required',
                'tahun' => 'required',
                'akreditasi' => 'required',
            ]);

            $jurusan = Jurusan::find($id);

            $jurusan->update($request->all());

            $data = Jurusan::where('id', '=', $jurusan->id)->get();

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
            $jurusan = Jurusan::findOrFail($id);
            $data = $jurusan->delete();

            if ($data) {
                return APIFormatter::createAPI(200, 'Success');
            } else {
                return APIFormatter::createAPI(400, 'Failed');
            }
        } catch (Exception $error) {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function siswa($id) {
        $siswa = Jurusan::with('siswa')->where('id', $id)->first();

        if($siswa) {
            return APIFormatter::createAPI(200, 'Success', $siswa);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }
}
