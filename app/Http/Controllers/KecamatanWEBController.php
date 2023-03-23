<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use App\Models\Kecamatan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class KecamatanWEBController extends Controller
{
    public function index() {
        $kecamatans = DB::select("select kecamatans.id, kecamatans.kode as kode_kecamatan, provinsi, kecamatan, kabupaten from kecamatans, kabupatens, provinsis where kecamatans.kabupaten_id = kabupatens.id and kabupatens.provinsi_id = provinsis.id");

        return view('admin.kecamatan.kecamatan', [
            'title' => 'De\'Profile kecamatan',
            'kecamatan' => $kecamatans,
        ]); 
    }

    public function store(Request $request) {
        $request->validate([
            'kecamatan' => 'required',
            'kabupaten_id' => 'required'
        ]);

        $kode = Str::random(6);

        $kecamatan = Kecamatan::create([
            'kode' => $kode,
            'kecamatan' => $request->kecamatan,
            'kabupaten_id' => $request->kabupaten_id,
        ]);
        
        return redirect()->route('kecamatan');
    }

    public function create() {
        $kabupatens = Kabupaten::all();

        return view('admin.kecamatan.add_kecamatan', [
            'title' => 'De\'Profile Tambah Kecamatan',
            'kabupaten' => $kabupatens,
        ]);
    }

    public function edit(Request $request, $id) {
        $kecamatan = DB::select("select * from kecamatans where id = '" .$id. "'");
        
        return view('admin.kecamatan.edit_kecamatan', [
            'title' => 'De\'Profile Edit Kecamatan',
            'kecamatan' => $kecamatan,
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'kecamatan' => 'required',
        ]);

        $kecamatan = Kecamatan::find($id);

        $kecamatan->update([
            'kecamatan' => $request->kecamatan,
        ]);
        
        return redirect()->route('kecamatan');
    }

    public function destroy($id) {
        $kecamatan = kecamatan::findOrFail($id);
        $data = $kecamatan->delete();

        return redirect()->route('kecamatan');
    }

    public function search(Request $request) {
        $request->validate([
            'search' => 'required',
        ]);

        $kecamatans = DB::select("select kecamatans.id, kecamatans.kode as kode_kecamatan, provinsi, kecamatan, kabupaten from kecamatans, kabupatens, provinsis where kecamatans.kabupaten_id = kabupatens.id and kabupatens.provinsi_id = provinsis.id and kecamatan like '%" .$request->search. "%'");

        return view('admin.kecamatan.kecamatan', [
            'title' => 'De\'Profile kecamatan',
            'kecamatan' => $kecamatans,
        ]); 
    }
}
