<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Desa;
use App\Helpers\APIFormatter;
use Illuminate\Support\Str;

class DesaController extends Controller
{
    public function index() {
        $desa = Desa::all();

        if($desa) {
            return APIFormatter::createAPI(200, 'Success', $desa);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function show($id) {
        $data = Desa::where('id', '=', $id)->orWhere('desa','LIKE','%'.$id.'%')->get();

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
                'desa' => 'required',
                'kecamatan_id' => 'required',
            ]);

            $kode = Str::random(20);

            $desa = Desa::create([
                'kode' => $kode,
                'desa' => $request->desa,
                'kecamatan_id' => $request->kecamatan_id,
            ]);

            $data = Desa::where('id', '=', $desa->id)->get();

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
                'desa' => 'required',
                'kecamatan_id' => 'required',
            ]);

            $desa = Desa::find($id);

            $desa->update($request->all());
            // Provinsi::withTrashed()->find($id)->restore();

            $data = Desa::where('id', '=', $desa->id)->get();

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
            $desa = Desa::findOrFail($id);
            $data = $desa->delete();

            if ($data) {
                return APIFormatter::createAPI(200, 'Success');
            } else {
                return APIFormatter::createAPI(400, 'Failed');
            }
        } catch (Exception $error) {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function sekolah($id) {
        $sekolah = Desa::with('sekolah')->where('id', $id)->first();

        if($sekolah) {
            return APIFormatter::createAPI(200, 'Success', $sekolah);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }
}
