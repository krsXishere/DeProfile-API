<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekstrakulikuler;
use App\Models\Sekolah;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EkstrakulikulerWEBController extends Controller
{
    public function index() {
        $ekstrakulikulers = DB::select("select ekstrakulikulers.id, ekstrakulikulers.nama, ekstrakulikulers.jenis, sekolahs.nama as nama_sekolah from sekolahs, ekstrakulikulers where ekstrakulikulers.sekolah_id = sekolahs.id");

        return view('admin.ekstrakulikuler.ekstrakulikuler', [
            'title' => 'De\'Profile Ekstrakulikuler',
            'ekstrakulikuler' => $ekstrakulikulers,
        ]);
    }
    
    public function store(Request $request) {
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
        
        return redirect()->route('ekstrakulikuler');
    }

    public function create() {
        $sekolahs = Sekolah::all();
        return view('admin.ekstrakulikuler.add_ekstrakulikuler', [
            'title' => 'De\'Profile Tambah Ekstrakulikuler',
            'sekolah' => $sekolahs,
        ]);
    }

    public function edit(Request $request, $id) {
        $ekstrakulikuler = DB::select("select * from ekstrakulikulers where id = '" .$id. "'");
        
        return view('admin.ekstrakulikuler.edit_ekstrakulikuler', [
            'title' => 'De\'Profile Edit Ekstrakulikuler',
            'ekstrakulikuler' => $ekstrakulikuler,
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'jenis' => 'required',
            'nama' => 'required',
        ]);

        $ekstrakulikuler = Ekstrakulikuler::find($id);

        $ekstrakulikuler->update([
            'jenis' => $request->jenis,
            'nama' => $request->nama,
        ]);
        
        return redirect()->route('ekstrakulikuler');
    }

    public function destroy($id) {
        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);
        $data = $ekstrakulikuler->delete();

        return redirect()->route('ekstrakulikuler');
    }

    public function search(Request $request) {
        $request->validate([
            'search' => 'required',
        ]);

        $ekstrakulikulers = DB::select("select ekstrakulikulers.id, ekstrakulikulers.nama, ekstrakulikulers.jenis, sekolahs.nama as nama_sekolah from sekolahs, ekstrakulikulers where ekstrakulikulers.sekolah_id = sekolahs.id and (ekstrakulikulers.nama like '%" .$request->search. "%' or ekstrakulikulers.jenis like '%" .$request->search. "%')");

        return view('admin.ekstrakulikuler.ekstrakulikuler', [
            'title' => 'De\'Profile Ekstrakulikuler',
            'ekstrakulikuler' => $ekstrakulikulers,
        ]);
    }

    public function admin_sekolah_index() {
        $user = Auth::user();
        $ekstrakulikulers = DB::select("select ekstrakulikulers.id, ekstrakulikulers.nama, ekstrakulikulers.jenis, sekolahs.nama as nama_sekolah from sekolahs, users, ekstrakulikulers where ekstrakulikulers.sekolah_id = sekolahs.id and users.id = sekolahs.user_id and (users.id = '".$user->id."')");

        return view('admin_sekolah.ekstrakulikuler.ekstrakulikuler', [
            'title' => 'De\'Profile Ekstrakulikuler',
            'ekstrakulikuler' => $ekstrakulikulers,
        ]);
    }
    
    public function admin_sekolah_store(Request $request) {
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
        
        return redirect()->route('admin_sekolah_ekstrakulikuler');
    }

    public function admin_sekolah_create() {
        $sekolahs = Sekolah::all();
        return view('admin_sekolah.ekstrakulikuler.add_ekstrakulikuler', [
            'title' => 'De\'Profile Tambah Ekstrakulikuler',
            'sekolah' => $sekolahs,
        ]);
    }

    public function admin_sekolah_edit(Request $request, $id) {
        $ekstrakulikuler = DB::select("select * from ekstrakulikulers where id = '" .$id. "'");
        
        return view('admin_sekolah.ekstrakulikuler.edit_ekstrakulikuler', [
            'title' => 'De\'Profile Edit Ekstrakulikuler',
            'ekstrakulikuler' => $ekstrakulikuler,
        ]);
    }

    public function admin_sekolah_update(Request $request, $id) {
        $request->validate([
            'jenis' => 'required',
            'nama' => 'required',
        ]);

        $ekstrakulikuler = Ekstrakulikuler::find($id);

        $ekstrakulikuler->update([
            'jenis' => $request->jenis,
            'nama' => $request->nama,
        ]);
        
        return redirect()->route('admin_sekolah_ekstrakulikuler');
    }

    public function admin_sekolah_destroy($id) {
        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);
        $data = $ekstrakulikuler->delete();

        return redirect()->route('admin_sekolah_ekstrakulikuler');
    }

    public function admin_sekolah_search(Request $request) {
        $request->validate([
            'search' => 'required',
        ]);

        $user = Auth::user();
        $ekstrakulikulers = DB::select("select ekstrakulikulers.id, ekstrakulikulers.nama, ekstrakulikulers.jenis, sekolahs.nama as nama_sekolah from sekolahs, users, ekstrakulikulers where ekstrakulikulers.sekolah_id = sekolahs.id and users.id = sekolahs.user_id and users.id = '".$user->id."' and (ekstrakulikulers.nama like '%" .$request->search. "%' or ekstrakulikulers.jenis like '%" .$request->search. "%')");

        return view('admin_sekolah.ekstrakulikuler.ekstrakulikuler', [
            'title' => 'De\'Profile Ekstrakulikuler',
            'ekstrakulikuler' => $ekstrakulikulers,
        ]);
    }
}
