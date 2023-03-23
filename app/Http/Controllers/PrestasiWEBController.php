<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestasi;
use App\Models\Sekolah;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PrestasiWEBController extends Controller
{
    public function index() {
        $prestasis = DB::select("select prestasis.id, prestasis.nama, prestasis.jenis_prestasi, prestasis.tingkat, prestasis.keterangan, sekolahs.nama as nama_sekolah from sekolahs, prestasis where prestasis.sekolah_id = sekolahs.id");

        return view('admin.prestasi.prestasi', [
            'title' => 'De\'Profile prestasi',
            'prestasi' => $prestasis,
        ]);
    }
    
    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'jenis_prestasi' => 'required',
            'tingkat' => 'required',
            'keterangan' => 'required',
            'sekolah_id' => 'required',
        ]);

        $prestasi = Prestasi::create($request->all());
        
        return redirect()->route('prestasi');
    }

    public function create() {
        $sekolahs = Sekolah::all();

        return view('admin.prestasi.add_prestasi', [
            'title' => 'De\'Profile Tambah Prestasi',
            'sekolah' => $sekolahs,
        ]);
    }

    public function edit(Request $request, $id) {
        $prestasis = DB::select("select * from prestasis where id = '" .$id. "'");
        
        return view('admin.prestasi.edit_prestasi', [
            'title' => 'De\'Profile Edit Prestasi',
            'prestasi' => $prestasis,
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama' => 'required',
            'jenis_prestasi' => 'required',
            'tingkat' => 'required',
            'keterangan' => 'required',
        ]);

        $prestasi = Prestasi::find($id);

        $prestasi->update($request->all());
        
        return redirect()->route('prestasi');
    }

    public function destroy($id) {
        $prestasi = Prestasi::findOrFail($id);
        $data = $prestasi->delete();

        return redirect()->route('prestasi');
    }

    public function search(Request $request) {
        $request->validate([
            'search' => 'required',
        ]);

        $prestasis = DB::select("select prestasis.id, prestasis.nama, prestasis.jenis_prestasi, prestasis.tingkat, prestasis.keterangan, sekolahs.nama as nama_sekolah from sekolahs, prestasis where prestasis.sekolah_id = sekolahs.id and (prestasis.nama like '%" .$request->search. "%' or prestasis.jenis_prestasi like '%" .$request->search. "%' or prestasis.tingkat like '%" .$request->search. "%')");

        return view('admin.prestasi.prestasi', [
            'title' => 'De\'Profile prestasi',
            'prestasi' => $prestasis,
        ]);
    }

    public function admin_sekolah_index() {
        $user = Auth::user();
        $prestasis = DB::select("select prestasis.id, prestasis.nama, prestasis.jenis_prestasi, prestasis.tingkat, prestasis.keterangan, sekolahs.nama as nama_sekolah from sekolahs, users, prestasis where prestasis.sekolah_id = sekolahs.id and users.id = sekolahs.user_id and users.id = '".$user->id."'");

        return view('admin_sekolah.prestasi.prestasi', [
            'title' => 'De\'Profile prestasi',
            'prestasi' => $prestasis,
        ]);
    }
    
    public function admin_sekolah_store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'jenis_prestasi' => 'required',
            'tingkat' => 'required',
            'keterangan' => 'required',
            'sekolah_id' => 'required',
        ]);

        $prestasi = Prestasi::create($request->all());
        
        return redirect()->route('admin_sekolah_prestasi');
    }

    public function admin_sekolah_create() {
        $sekolahs = Sekolah::all();

        return view('admin_sekolah.prestasi.add_prestasi', [
            'title' => 'De\'Profile Tambah Prestasi',
            'sekolah' => $sekolahs,
        ]);
    }

    public function admin_sekolah_edit(Request $request, $id) {
        $prestasis = DB::select("select * from prestasis where id = '" .$id. "'");
        
        return view('admin_sekolah.prestasi.edit_prestasi', [
            'title' => 'De\'Profile Edit Prestasi',
            'prestasi' => $prestasis,
        ]);
    }

    public function admin_sekolah_update(Request $request, $id) {
        $request->validate([
            'nama' => 'required',
            'jenis_prestasi' => 'required',
            'tingkat' => 'required',
            'keterangan' => 'required',
        ]);

        $prestasi = Prestasi::find($id);

        $prestasi->update($request->all());
        
        return redirect()->route('admin_sekolah_prestasi');
    }

    public function admin_sekolah_destroy($id) {
        $prestasi = Prestasi::findOrFail($id);
        $data = $prestasi->delete();

        return redirect()->route('admin_sekolah_prestasi');
    }

    public function admin_sekolah_search(Request $request) {
        $request->validate([
            'search' => 'required',
        ]);
        
        $user = Auth::user();
        $prestasis = DB::select("select prestasis.id, prestasis.nama, prestasis.jenis_prestasi, prestasis.tingkat, prestasis.keterangan, sekolahs.nama as nama_sekolah from sekolahs, prestasis, users where users.id = sekolahs.user_id and prestasis.sekolah_id = sekolahs.id and users.id = '".$user->id."' and (prestasis.nama like '%" .$request->search. "%' or prestasis.jenis_prestasi like '%" .$request->search. "%' or prestasis.tingkat like '%" .$request->search. "%')");

        return view('admin_sekolah.prestasi.prestasi', [
            'title' => 'De\'Profile prestasi',
            'prestasi' => $prestasis,
        ]);
    }
}
