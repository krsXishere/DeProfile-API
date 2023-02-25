<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\Kabupaten;
use App\Helpers\APIFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class KabupatenController extends Controller
{
    public function index() {
        $kecamatan = Kabupaten::all();

        if($kecamatan) {
            return APIFormatter::createAPI(200, 'Success', $kecamatan);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function show($id) {
        $data = Kabupaten::where('id', '=', $id)->orWhere('kabupaten','LIKE','%'.$id.'%')->get();

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
                'kabupaten' => 'required',
                'provinsi_id' => 'required',
            ]);

            $kode = Str::random(20);

            $kabupaten = Kabupaten::create([
                'kode' => $kode,
                'kabupaten' => $request->kabupaten,
                'provinsi_id' => $request->provinsi_id,
            ]);

            $data = Kabupaten::where('id', '=', $kabupaten->id)->get();

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
                'kabupaten' => 'required',
                'provinsi_id' => 'required',
            ]);

            $kabupaten = Kabupaten::find($id);

            $kabupaten->update($request->all());
            // Provinsi::withTrashed()->find($id)->restore();

            $data = Kabupaten::where('id', '=', $kabupaten->id)->get();

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
            $kabupaten = Kabupaten::findOrFail($id);
            $data = $kabupaten->delete();

            if ($data) {
                return APIFormatter::createAPI(200, 'Success');
            } else {
                return APIFormatter::createAPI(400, 'Failed');
            }
        } catch (Exception $error) {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function kecamatan($id) {
        $kecamatan = Kabupaten::with('kecamatan')->where('id', $id)->first();

        if($kecamatan) {
            return APIFormatter::createAPI(200, 'Success', $kecamatan);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }
}
