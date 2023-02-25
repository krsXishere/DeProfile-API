<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use App\Helpers\APIFormatter;

class FasilitasController extends Controller
{
    public function index() {
        $fasilitas = Fasilitas::all();

        if($fasilitas) {
            return APIFormatter::createAPI(200, 'Success', $fasilitas);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function show($id) {
        $data = Fasilitas::where('id', '=', $id)->orWhere('nama','LIKE','%'.$id.'%')->first();

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
                'jenis' => 'required',
                'keterangan' => 'required',
                'sekolah_id' => 'required',
            ]);

            $fasilitas = Fasilitas::create([
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'keterangan' => $request->keterangan,
                'sekolah_id' => $request->sekolah_id,
            ]);

            $data = Fasilitas::where('id', '=', $fasilitas->id)->get();

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
                'jenis' => 'required',
                'keterangan' => 'required',
            ]);

            $fasilitas = Fasilitas::find($id);

            $fasilitas->update($request->all());
            // Provinsi::withTrashed()->find($id)->restore();

            $data = Fasilitas::where('id', '=', $fasilitas->id)->get();

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
            $fasilitas = Fasilitas::findOrFail($id);
            $data = $fasilitas->delete();

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
