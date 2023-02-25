<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use App\Helpers\APIFormatter;

class PrestasiController extends Controller
{
    public function index() {
        $prestasi = Prestasi::all();

        if($prestasi) {
            return APIFormatter::createAPI(200, 'Success', $prestasi);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function show($id) {
        $data = Prestasi::where('id', '=', $id)->orWhere('jenis_prestasi','LIKE','%'.$id.'%')->orWhere('nama','LIKE','%'.$id.'%')->first();

        if ($data) {
            return APIFormatter::createAPI(200, 'Success', $data);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'nama' => 'required',
                'jenis_prestasi' => 'required',
                'tingkat' => 'required',
                'keterangan' => 'required',
                'sekolah_id' => 'required',
            ]);

            $prestasi = Prestasi::create([
                'nama' => $request->nama,
                'jenis_prestasi' => $request->jenis_prestasi,
                'tingkat' => $request->tingkat,
                'keterangan' => $request->keterangan,
                'sekolah_id' => $request->sekolah_id,
            ]);

            $data = Prestasi::where('id', '=', $prestasi->id)->get();

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
                'nama' => 'required',
                'jenis_prestasi' => 'required',
                'tingkat' => 'required',
                'keterangan' => 'required',
            ]);

            $prestasi = Prestasi::find($id);

            $prestasi->update($request->all());

            $data = Prestasi::where('id', '=', $prestasi->id)->get();

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
            $prestasi = Prestasi::findOrFail($id);
            $data = $prestasi->delete();

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
