<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Helpers\APIFormatter;
use Illuminate\Support\Str;

class ProvinsiController extends Controller
{
    public function index() {
        $provinsi = Provinsi::all();

        if($provinsi) {
            return APIFormatter::createAPI(200, 'Success', $provinsi);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function show($id) {
        $data = Provinsi::where('id', '=', $id)->orWhere('provinsi','LIKE','%'.$id.'%')->get();

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
                'provinsi' => 'required',
            ]);

            $kode = Str::random(20);

            $provinsi = Provinsi::create([
                'kode' => $kode,
                'provinsi' => $request->provinsi,
            ]);

            $data = Provinsi::where('id', '=', $provinsi->id)->get();

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
                'provinsi' => 'required',
            ]);

            $provinsi = Provinsi::find($id);

            $provinsi->update($request->all());
            // Provinsi::withTrashed()->find($id)->restore();

            $data = Provinsi::where('id', '=', $provinsi->id)->get();

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
            $provinsi = Provinsi::findOrFail($id);
            $data = $provinsi->delete();

            if ($data) {
                return APIFormatter::createAPI(200, 'Success');
            } else {
                return APIFormatter::createAPI(400, 'Failed');
            }
        } catch (Exception $error) {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function kabupaten($id) {
        $kabupaten = Provinsi::with('kabupaten')->where('id', $id)->first();

        if($kabupaten) {
            return APIFormatter::createAPI(200, 'Success', $kabupaten);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }
}
