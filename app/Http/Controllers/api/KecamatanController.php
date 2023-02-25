<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Helpers\APIFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class KecamatanController extends Controller
{
    public function index() {
        $desa = Kecamatan::all();

        if($desa) {
            return APIFormatter::createAPI(200, 'Success', $desa);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function show($id) {
        $data = Kecamatan::where('id', '=', $id)->orWhere('kecamatan','LIKE','%'.$id.'%')->get();

        if ($data) {
            return APIFormatter::createAPI(200, 'Success', $data);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'kecamatan' => 'required',
                'kabupaten_id' => 'required',
            ]);

            $kode = Str::random(20);

            $kecamatan = Kecamatan::create([
                'kode' => $kode,
                'kecamatan' => $request->kecamatan,
                'kabupaten_id' => $request->kabupaten_id,
            ]);

            $data = Kecamatan::where('id', '=', $kecamatan->id)->get();

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
                'kecamatan' => 'required',
                'kabupaten_id' => 'required',
            ]);

            $kecamatan = Kecamatan::find($id);

            $kecamatan->update($request->all());
            // Provinsi::withTrashed()->find($id)->restore();

            $data = Kecamatan::where('id', '=', $kecamatan->id)->get();

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
            $kecamatan = Kecamatan::findOrFail($id);
            $data = $kecamatan->delete();

            if ($data) {
                return APIFormatter::createAPI(200, 'Success');
            } else {
                return APIFormatter::createAPI(400, 'Failed');
            }
        } catch (Exception $error) {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function desa($id) {
        $desa = Kecamatan::with('desa')->where('id', $id)->first();

        if($desa) {
            return APIFormatter::createAPI(200, 'Success', $desa);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }
}
