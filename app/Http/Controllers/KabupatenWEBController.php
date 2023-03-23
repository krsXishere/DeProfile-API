<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class KabupatenWEBController extends Controller
{
    public function index() {
        $kabupatens = DB::select("select kabupatens.id, kabupatens.kode as kode_kabupaten, provinsi, kabupaten from kabupatens, provinsis where provinsis.id = kabupatens.provinsi_id");

        return view('admin.kabupaten.kabupaten', [
            'title' => 'De\'Profile Kabupaten',
            'kabupaten' => $kabupatens,
        ]); 
    }

    public function store(Request $request) {
        $request->validate([
            'kabupaten' => 'required',
            'provinsi_id' => 'required'
        ]);

        $kode = Str::random(6);

        $kabupaten = Kabupaten::create([
            'kode' => $kode,
            'kabupaten' => $request->kabupaten,
            'provinsi_id' => $request->provinsi_id,
        ]);
        
        return redirect()->route('kabupaten');
    }

    public function create() {
        $provinsis = Provinsi::all();

        return view('admin.kabupaten.add_kabupaten', [
            'title' => 'De\'Profile Tambah Kabupaten',
            'provinsi' => $provinsis,
        ]);
    }

    public function edit(Request $request, $id) {
        $kabupaten = DB::select("select * from kabupatens where id = '" .$id. "'");
        
        return view('admin.kabupaten.edit_kabupaten', [
            'title' => 'De\'Profile Edit Kabupaten',
            'kabupaten' => $kabupaten,
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'kabupaten' => 'required',
        ]);

        $kabupaten = Kabupaten::find($id);

        $kabupaten->update([
            'kabupaten' => $request->kabupaten,
        ]);
        
        return redirect()->route('kabupaten');
    }

    public function destroy($id) {
        $kabupaten = kabupaten::findOrFail($id);
        $data = $kabupaten->delete();

        return redirect()->route('kabupaten');
    }

    public function search(Request $request) {
        $request->validate([
            'search' => 'required',
        ]);

        $kabupatens = DB::select("select kabupatens.id, kabupatens.kode as kode_kabupaten, provinsi, kabupaten from kabupatens, provinsis where provinsis.id = kabupatens.provinsi_id and kabupaten like '%" .$request->search. "%'");

        return view('admin.kabupaten.kabupaten', [
            'title' => 'De\'Profile Kabupaten',
            'kabupaten' => $kabupatens,
        ]);
    }
}
