<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use App\Helpers\APIFormatter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SekolahController extends Controller
{
    public function index() {
        $sekolah = Sekolah::all();

        if($sekolah) {
            return APIFormatter::createAPI(200, 'Success', $sekolah);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function show($id) {
        $data = Sekolah::where('id', '=', $id)->orWhere('nama','LIKE','%'.$id.'%')->first();

        if ($data) {
            return APIFormatter::createAPI(200, 'Success', $data);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function search($value) {
        $data = Sekolah::where('nama','LIKE','%'.$value.'%')->orWhere('npsn','LIKE','%'.$value.'%')->orWhere('nss','LIKE','%'.$value.'%')->get();

        if ($data) {
            return APIFormatter::createAPI(200, 'Success', $data);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'nss' => 'required',
                'npsn' => 'required',
                'nama' => 'required',
                'alamat' => 'required',
                'desa_id' => 'required',
                'rw' => 'required',
                'rt' => 'required',
                'no_telpon' => 'required',
                'no_fax' => 'required',
                'lat_long' => 'required',
                'email' => 'required',
                'kepala_sekolah' => 'required',
            ]);

            $sekolah = Sekolah::create([
                'nss' => $request->nss,
                'npsn' => $request->npsn,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'desa_id' => $request->desa_id,
                'rw' => $request->rw,
                'rt' => $request->rt,
                'no_telpon' => $request->no_telpon,
                'no_fax' => $request->no_fax,
                'lat_long' => $request->lat_long,
                'image' => "",
                'email' => $request->email,
                'kepala_sekolah' => $request->kepala_sekolah,
            ]);

            $data = Sekolah::where('id', '=', $sekolah->id)->get();

            if ($data) {
                return APIFormatter::createAPI(200, 'Success', $data);
            } else {
                return APIFormatter::createAPI(400, 'Failed');
            }
        } catch (Exception $error) {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function fotoProfilSekolah(Request $request, $id) {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5048',
            ]);

            $image_path = $request->file('image')->store('sekolah', 'public');

            $sekolah = Sekolah::find($id);
            $sekolah->image = $image_path;
            $sekolah->save();

            $data = Sekolah::where('id', '=', $sekolah->id)->get();

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
                'nss' => 'required',
                'npsn' => 'required',
                'nama' => 'required',
                'alamat' => 'required',
                'desa_id' => 'required',
                'rw' => 'required',
                'rt' => 'required',
                'no_telpon' => 'required',
                'no_fax' => 'required',
                'lat_long' => 'required',
                'email' => 'required',
                'kepala_sekolah' => 'required',
            ]);

            $sekolah = Sekolah::find($id);

            $sekolah->update($request->all());
            // Provinsi::withTrashed()->find($id)->restore();

            $data = Sekolah::where('id', '=', $sekolah->id)->get();

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
            $sekolah = Sekolah::findOrFail($id);
            $image_path = public_path().'/storage'.'/'.$sekolah->image;
            if(file_exists($image_path)) {
                unlink($image_path);
            }
            // dd($image_path);
            $data = $sekolah->delete();

            if ($data) {
                return APIFormatter::createAPI(200, 'Success');
            } else {
                return APIFormatter::createAPI(400, 'Failed');
            }
        } catch (Exception $error) {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function countSiswa($id) {
        $jumlahSiswa = DB::select("select count(siswas.id) as jumlah from siswas, sekolahs, jurusans where siswas.jurusan_id = jurusans.id and jurusans.sekolah_id = sekolahs.id and sekolahs.id = '" .$id. "'");

        if($jumlahSiswa) {
            return APIFormatter::createAPI(200, 'Success', $jumlahSiswa[0]);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function countGuru($id) {
        $jumlahGuru = DB::select("select count(gurus.id) as jumlah from gurus, sekolahs where gurus.sekolah_id = sekolahs.id and sekolahs.id = '" .$id. "'");

        if($jumlahGuru) {
            return APIFormatter::createAPI(200, 'Success', $jumlahGuru[0]);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function guru($id) {
        $guru = Sekolah::with('guru')->where('id', $id)->first();

        if($guru) {
            return APIFormatter::createAPI(200, 'Success', $guru);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function fasilitas($id) {
        $fasilitas = Sekolah::with('fasilitas')->where('id', $id)->first();

        if($fasilitas) {
            return APIFormatter::createAPI(200, 'Success', $fasilitas);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function ekstrakulikuler($id) {
        $ekstrakulikuler = Sekolah::with('ekstrakulikuler')->where('id', $id)->first();

        if($ekstrakulikuler) {
            return APIFormatter::createAPI(200, 'Success', $ekstrakulikuler);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function prestasi($id) {
        $prestasi = Sekolah::with('prestasi')->where('id', $id)->first();

        if($prestasi) {
            return APIFormatter::createAPI(200, 'Success', $prestasi);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function jurusan($id) {
        $jurusan = Sekolah::with('jurusan')->where('id', $id)->first();

        if($jurusan) {
            return APIFormatter::createAPI(200, 'Success', $jurusan);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function galeri($id) {
        $galeri = Sekolah::with('galeri')->where('id', $id)->first();

        if($galeri) {
            return APIFormatter::createAPI(200, 'Success', $galeri);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }
}
