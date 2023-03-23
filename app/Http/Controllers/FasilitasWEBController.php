<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;
use App\Models\Sekolah;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FasilitasWEBController extends Controller
{
    public function index() {
        $fasilitas = DB::select("select fasilitas.id, fasilitas.nama, fasilitas.jenis, fasilitas.keterangan, sekolahs.nama as nama_sekolah from sekolahs, fasilitas where fasilitas.sekolah_id = sekolahs.id");

        return view('admin.fasilitas.fasilitas', [
            'title' => 'De\'Profile Fasilitas',
            'fasilitas' => $fasilitas,
        ]);
    }
    
    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'keterangan' => 'required',
            'sekolah_id' => 'required',
        ]);

        $fasilitas = Fasilitas::create($request->all());
        
        return redirect()->route('fasilitas');
    }

    public function create() {
        $sekolahs = Sekolah::all();

        return view('admin.fasilitas.add_fasilitas', [
            'title' => 'De\'Profile Tambah Fasilitas',
            'sekolah' => $sekolahs,
        ]);
    }

    public function edit(Request $request, $id) {
        $fasilitas = DB::select("select * from fasilitas where id = '" .$id. "'");
        
        return view('admin.fasilitas.edit_fasilitas', [
            'title' => 'De\'Profile Edit Fasilitas',
            'fasilitas' => $fasilitas,
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'keterangan' => 'required',
        ]);

        $fasilitas = Fasilitas::find($id);

        $fasilitas->update($request->all());
        
        return redirect()->route('fasilitas');
    }

    public function destroy($id) {
        $fasilitas = Fasilitas::findOrFail($id);
        $data = $fasilitas->delete();

        return redirect()->route('fasilitas');
    }

    public function search(Request $request) {
        $request->validate([
            'search' => 'required',
        ]);

        $fasilitas = DB::select("select fasilitas.id, fasilitas.nama, fasilitas.jenis, fasilitas.keterangan, sekolahs.nama as nama_sekolah from sekolahs, fasilitas where fasilitas.sekolah_id = sekolahs.id and (fasilitas.nama like '%" .$request->search. "%' or fasilitas.jenis like '%" .$request->search. "%')");

        return view('admin.fasilitas.fasilitas', [
            'title' => 'De\'Profile Fasilitas',
            'fasilitas' => $fasilitas,
        ]);
    }

    public function admin_sekolah_index() {
        $user = Auth::user();
        $fasilitas = DB::select("select fasilitas.id, fasilitas.nama, fasilitas.jenis, fasilitas.keterangan, sekolahs.nama as nama_sekolah from sekolahs, users, fasilitas where users.id = sekolahs.user_id and fasilitas.sekolah_id = sekolahs.id and users.id = '".$user->id."'");

        return view('admin_sekolah.fasilitas.fasilitas', [
            'title' => 'De\'Profile Fasilitas',
            'fasilitas' => $fasilitas,
        ]);
    }
    
    public function admin_sekolah_store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'keterangan' => 'required',
            'sekolah_id' => 'required',
        ]);

        $fasilitas = Fasilitas::create($request->all());
        
        return redirect()->route('admin_sekolah_fasilitas');
    }

    public function admin_sekolah_create() {
        $sekolahs = Sekolah::all();

        return view('admin_sekolah.fasilitas.add_fasilitas', [
            'title' => 'De\'Profile Tambah Fasilitas',
            'sekolah' => $sekolahs,
        ]);
    }

    public function admin_sekolah_edit(Request $request, $id) {
        $fasilitas = DB::select("select * from fasilitas where id = '" .$id. "'");
        
        return view('admin_sekolah.fasilitas.edit_fasilitas', [
            'title' => 'De\'Profile Edit Fasilitas',
            'fasilitas' => $fasilitas,
        ]);
    }

    public function admin_sekolah_update(Request $request, $id) {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'keterangan' => 'required',
        ]);

        $fasilitas = Fasilitas::find($id);

        $fasilitas->update($request->all());
        
        return redirect()->route('admin_sekolah_fasilitas');
    }

    public function admin_sekolah_destroy($id) {
        $fasilitas = Fasilitas::findOrFail($id);
        $data = $fasilitas->delete();

        return redirect()->route('admin_sekolah_fasilitas');
    }

    public function admin_sekolah_search(Request $request) {
        $request->validate([
            'search' => 'required',
        ]);

        $user = Auth::user();
        $fasilitas = DB::select("select fasilitas.id, fasilitas.nama, fasilitas.jenis, fasilitas.keterangan, sekolahs.nama as nama_sekolah from sekolahs, users, fasilitas where users.id = sekolahs.user_id and fasilitas.sekolah_id = sekolahs.id and users.id = '".$user->id."' and (fasilitas.nama like '%" .$request->search. "%' or fasilitas.jenis like '%" .$request->search. "%')");

        return view('admin_sekolah.fasilitas.fasilitas', [
            'title' => 'De\'Profile Fasilitas',
            'fasilitas' => $fasilitas,
        ]);
    }
}
