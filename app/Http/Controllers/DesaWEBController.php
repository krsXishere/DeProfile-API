<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use App\Models\Kecamatan;
use App\Models\Desa;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DesaWEBController extends Controller
{
    public function index() {
        $desas = DB::select("select desas.id, desas.kode as kode_desa, provinsi, kabupaten, desa, kecamatan from kecamatans, kabupatens, desas, provinsis where kecamatans.id = desas.kecamatan_id and provinsis.id = kabupatens.provinsi_id and kecamatans.kabupaten_id = kabupatens.id");

        return view('admin.desa.desa', [
            'title' => 'De\'Profile desa',
            'desa' => $desas,
        ]); 
    }

    public function store(Request $request) {
        $request->validate([
            'desa' => 'required',
            'kecamatan_id' => 'required'
        ]);

        $kode = Str::random(6);

        $desa = desa::create([
            'kode' => $kode,
            'desa' => $request->desa,
            'kecamatan_id' => $request->kecamatan_id,
        ]);
        
        return redirect()->route('desa');
    }

    public function create() {
        $kecamatans = Kecamatan::all();

        return view('admin.desa.add_desa', [
            'title' => 'De\'Profile Tambah Desa',
            'kecamatan' => $kecamatans,
        ]);
    }

    public function edit(Request $request, $id) {
        $desa = DB::select("select * from desas where id = '" .$id. "'");
        
        return view('admin.desa.edit_desa', [
            'title' => 'De\'Profile Edit Desa',
            'desa' => $desa,
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'desa' => 'required',
        ]);

        $desa = Desa::find($id);

        $desa->update([
            'desa' => $request->desa,
        ]);
        
        return redirect()->route('desa');
    }

    public function destroy($id) {
        $desa = desa::findOrFail($id);
        $data = $desa->delete();

        return redirect()->route('desa');
    }

    public function search(Request $request) {
        $request->validate([
            'search' => 'required',
        ]);

        $desas = DB::select("select desas.id, desas.kode as kode_desa, provinsi, kabupaten, desa, kecamatan from kecamatans, kabupatens, desas, provinsis where kecamatans.id = desas.kecamatan_id and provinsis.id = kabupatens.provinsi_id and kecamatans.kabupaten_id = kabupatens.id and desa like '%" .$request->search. "%'");

        return view('admin.desa.desa', [
            'title' => 'De\'Profile desa',
            'desa' => $desas,
        ]); 
    }
}
