<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Helpers\APIFormatter;

class GaleriController extends Controller
{
    public function index() {
        $galeri = Galeri::all();

        if($galeri) {
            return APIFormatter::createAPI(200, 'Success', $galeri);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function show($id) {
        $data = Galeri::where('id', '=', $id)->orWhere('judul','LIKE','%'.$id.'%')->first();

        if ($data) {
            return APIFormatter::createAPI(200, 'Success', $data);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'judul' => 'required',
                'deskripsi' => 'required',
                // 'image' => 'required',
                'sekolah_id' => 'required',
            ]);

            $galeri = Galeri::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'image' => "",
                'sekolah_id' => $request->sekolah_id,
            ]);

            $data = Galeri::where('id', '=', $galeri->id)->get();

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
                'judul' => 'required',
                'deskripsi' => 'required',
                // 'image' => 'required',
            ]);

            $galeri = Galeri::find($id);

            $galeri->update($request->all());

            $data = Galeri::where('id', '=', $galeri->id)->get();

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

    public function fotoGaleri(Request $request, $id) {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $image_path = $request->file('image')->store('galeri', 'public');

            $galeri = Galeri::find($id);
            $galeri->image = $image_path;
            $galeri->save();

            $data = Galeri::where('id', '=', $galeri->id)->get();

            if ($data) {
                return APIFormatter::createAPI(200, 'Success', $data);
            } else {
                return APIFormatter::createAPI(400, 'Failed');
            }
        } catch (Exception $error) {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function destroy($id)
    {
        try {
            $galeri = Galeri::findOrFail($id);
            $image_path = public_path().'/storage'.'/'.$galeri->image;
            unlink($image_path);
            $data = $galeri->delete();

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
