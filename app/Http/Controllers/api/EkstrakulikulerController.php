<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ekstrakulikuler;
use App\Helpers\APIFormatter;

class EkstrakulikulerController extends Controller
{
    public function index() {
        $ekstrakulikuler = Ekstrakulikuler::all();

        if($ekstrakulikuler) {
            return APIFormatter::createAPI(200, 'Success', $ekstrakulikuler);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function show($id) {
        $data = Ekstrakulikuler::where('id', '=', $id)->orWhere('jenis','LIKE','%'.$id.'%')->orWhere('nama','LIKE','%'.$id.'%')->get();

        if ($data) {
            return APIFormatter::createAPI(200, 'Success', $data);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'jenis' => 'required',
                'nama' => 'required',
                'sekolah_id' => 'required',
            ]);

            $ekstrakulikuler = Ekstrakulikuler::create([
                'jenis' => $request->jenis,
                'nama' => $request->nama,
                'sekolah_id' => $request->sekolah_id,
            ]);

            $data = Ekstrakulikuler::where('id', '=', $ekstrakulikuler->id)->get();

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
                'jenis' => 'required',
                'nama' => 'required',
            ]);

            $ekstrakulikuler = Ekstrakulikuler::find($id);

            $ekstrakulikuler->update($request->all());

            $data = Ekstrakulikuler::where('id', '=', $ekstrakulikuler->id)->get();

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
            $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);
            $data = $ekstrakulikuler->delete();

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
