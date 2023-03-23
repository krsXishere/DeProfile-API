<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\Sekolah;
use App\Models\Kurikulum;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class JurusanWEBController extends Controller
{
    public function index() {
        $jurusans = DB::select("select jurusans.id, jurusans.jurusan, jurusans.keterangan, jurusans.tahun, kurikulums.kurikulum, sekolahs.nama from kurikulums, sekolahs, jurusans where jurusans.sekolah_id = sekolahs.id and kurikulums.id = jurusans.kurikulum_id");

        return view('admin.jurusan.jurusan', [
            'title' => 'De\'Profile Jurusan',
            'jurusan' => $jurusans,
        ]);
    }
    
    public function store(Request $request) {
        $request->validate([
            'jurusan' => 'required',
            'keterangan' => 'required',
            'tahun' => 'required',
            'akreditasi' => 'required',
            'kurikulum_id' => 'required',
            'sekolah_id' => 'required',
        ]);

        $jurusan = Jurusan::create($request->all());
        
        return redirect()->route('jurusan');
    }

    public function create() {
        $sekolahs = Sekolah::all();
        $kurikulums = Kurikulum::all();

        return view('admin.jurusan.add_jurusan', [
            'title' => 'De\'Profile Tambah Jurusan',
            'sekolah' => $sekolahs,
            'kurikulum' => $kurikulums,
        ]);
    }

    public function edit(Request $request, $id) {
        $jurusans = DB::select("select * from jurusans where id = '" .$id. "'");
        
        return view('admin.jurusan.edit_jurusan', [
            'title' => 'De\'Profile Edit Jurusan',
            'jurusan' => $jurusans,
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'jurusan' => 'required',
            'keterangan' => 'required',
            'tahun' => 'required',
            'akreditasi' => 'required',
        ]);

        $jurusan = Jurusan::find($id);

        $jurusan->update($request->all());
        
        return redirect()->route('jurusan');
    }

    public function destroy($id) {
        $jurusan = jurusan::findOrFail($id);
        $data = $jurusan->delete();

        return redirect()->route('jurusan');
    }

    public function search(Request $request) {
        $request->validate([
            'search' => 'required',
        ]);

        $jurusans = DB::select("select jurusans.id, jurusans.jurusan, jurusans.keterangan, jurusans.tahun, kurikulums.kurikulum, sekolahs.nama from kurikulums, sekolahs, jurusans where jurusans.sekolah_id = sekolahs.id and kurikulums.id = jurusans.kurikulum_id and (jurusans.jurusan like '%" .$request->search. "%')");

        return view('admin.jurusan.jurusan', [
            'title' => 'De\'Profile Jurusan',
            'jurusan' => $jurusans,
        ]);
    }

    public function admin_sekolah_index() {
        $user = Auth::user();
        $jurusans = DB::select("select jurusans.id, jurusans.jurusan, jurusans.keterangan, jurusans.tahun, kurikulums.kurikulum, sekolahs.nama from kurikulums, sekolahs, jurusans, users where users.id = sekolahs.user_id and jurusans.sekolah_id = sekolahs.id and kurikulums.id = jurusans.kurikulum_id and users.id = '".$user->id."'");

        return view('admin_sekolah.jurusan.jurusan', [
            'title' => 'De\'Profile Jurusan',
            'jurusan' => $jurusans,
        ]);
    }
    
    public function admin_sekolah_store(Request $request) {
        $request->validate([
            'jurusan' => 'required',
            'keterangan' => 'required',
            'tahun' => 'required',
            'akreditasi' => 'required',
            'kurikulum_id' => 'required',
            'sekolah_id' => 'required',
        ]);

        $jurusan = Jurusan::create($request->all());
        
        return redirect()->route('admin_sekolah_jurusan');
    }

    public function admin_sekolah_create() {
        $sekolahs = Sekolah::all();
        $kurikulums = Kurikulum::all();

        return view('admin_sekolah.jurusan.add_jurusan', [
            'title' => 'De\'Profile Tambah Jurusan',
            'sekolah' => $sekolahs,
            'kurikulum' => $kurikulums,
        ]);
    }

    public function admin_sekolah_edit(Request $request, $id) {
        $jurusans = DB::select("select * from jurusans where id = '" .$id. "'");
        
        return view('admin_sekolah.jurusan.edit_jurusan', [
            'title' => 'De\'Profile Edit Jurusan',
            'jurusan' => $jurusans,
        ]);
    }

    public function admin_sekolah_update(Request $request, $id) {
        $request->validate([
            'jurusan' => 'required',
            'keterangan' => 'required',
            'tahun' => 'required',
            'akreditasi' => 'required',
        ]);

        $jurusan = Jurusan::find($id);

        $jurusan->update($request->all());
        
        return redirect()->route('admin_sekolah_jurusan');
    }

    public function admin_sekolah_destroy($id) {
        $jurusan = jurusan::findOrFail($id);
        $data = $jurusan->delete();

        return redirect()->route('admin_sekolah_jurusan');
    }

    public function admin_sekolah_search(Request $request) {
        $request->validate([
            'search' => 'required',
        ]);

        $user = Auth::user();
        $jurusans = DB::select("select jurusans.id, jurusans.jurusan, jurusans.keterangan, jurusans.tahun, kurikulums.kurikulum, sekolahs.nama from kurikulums, sekolahs, jurusans, users where jurusans.sekolah_id = sekolahs.id and kurikulums.id = jurusans.kurikulum_id and users.id = sekolahs.user_id and users.id = '".$user->id."' and (jurusans.jurusan like '%" .$request->search. "%')");

        return view('admin_sekolah.jurusan.jurusan', [
            'title' => 'De\'Profile Jurusan',
            'jurusan' => $jurusans,
        ]);
    }
}
