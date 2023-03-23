<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Excel;
use App\Imports\ProvinsiImport;

class ProvinsiWEBController extends Controller
{
    public function index() {
        $provinsis = Provinsi::all();

        return view('admin.provinsi.provinsi', [
            'title' => 'De\'Profile Provinsi',
            'provinsi' => $provinsis,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'provinsi' => 'required',
        ]);

        $kode = Str::random(6);

        $provinsi = Provinsi::create([
            'kode' => $kode,
            'provinsi' => $request->provinsi,
        ]);
        
        return redirect()->route('provinsi');
    }

    public function create() {
        return view('admin.provinsi.add_provinsi', [
            'title' => 'De\'Profile Tambah Provinsi',
        ]);
    }

    public function edit(Request $request, $id) {
        $provinsi = DB::select("select * from provinsis where id = '" .$id. "'");
        
        return view('admin.provinsi.edit_provinsi', [
            'title' => 'De\'Profile Edit Provinsi',
            'provinsi' => $provinsi,
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'provinsi' => 'required',
        ]);

        $provinsi = Provinsi::find($id);

        $provinsi->update([
            'provinsi' => $request->provinsi,
        ]);
        
        return redirect()->route('provinsi');
    }

    public function destroy($id) {
        $provinsi = Provinsi::findOrFail($id);
        $data = $provinsi->delete();

        return redirect()->route('provinsi');
    }

    public function createUploadBulkProvinsi() {
        return view("admin.provinsi.add_provinsi_bulk", [
            'title' => 'De\'Profile Bulk Provinsi',
        ]);
    }

    public function uploadBulkProvinsi(Request $request) {
        Excel::import(new ProvinsiImport, $request->file);

        return redirect()->route('provinsi');
    }

    public function search(Request $request) {
        $request->validate([
            'search' => 'required',
        ]);

        $provinsis = DB::select("select * from provinsis where provinsi like '%" .$request->search. "%'");

        return view('admin.provinsi.provinsi', [
            'title' => 'De\'Profile Provinsi',
            'provinsi' => $provinsis,
        ]);
    }
}
