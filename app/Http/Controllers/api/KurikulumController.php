<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kurikulum;
use App\Helpers\APIFormatter;

class KurikulumController extends Controller
{
    public function index() {
        $kurikulum = Kurikulum::all();

        if($kurikulum) {
            return APIFormatter::createAPI(200, 'Success', $kurikulum);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function show($id) {
        $data = Kurikulum::where('id', '=', $id)->orWhere('kurikulum','LIKE','%'.$id.'%')->first();

        if ($data) {
            return APIFormatter::createAPI(200, 'Success', $data);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'kurikulum' => 'required',
                'keterangan' => 'required',
            ]);

            $kurikulum = Kurikulum::create([
                'kurikulum' => $request->kurikulum,
                'keterangan' => $request->keterangan,
            ]);

            $data = Kurikulum::where('id', '=', $kurikulum->id)->get();

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
                'kurikulum' => 'required',
                'keterangan' => 'required',
            ]);

            $kurikulum = Kurikulum::find($id);

            $kurikulum->update($request->all());
            // Provinsi::withTrashed()->find($id)->restore();

            $data = Kurikulum::where('id', '=', $kurikulum->id)->get();

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
            $kurikulum = Kurikulum::findOrFail($id);
            $data = $kurikulum->delete();

            if ($data) {
                return APIFormatter::createAPI(200, 'Success');
            } else {
                return APIFormatter::createAPI(400, 'Failed');
            }
        } catch (Exception $error) {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function jurusan($id) {
        $jurusan = Kurikulum::with('jurusan')->where('id', $id)->first();

        if($jurusan) {
            return APIFormatter::createAPI(200, 'Success', $jurusan);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }
}
