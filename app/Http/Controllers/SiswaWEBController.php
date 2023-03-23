<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Jurusan;
use App\Models\Sekolah;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Excel;
use App\Imports\SiswaImport;
use Illuminate\Support\Facades\Auth;

class SiswaWEBController extends Controller
{
    public function index($id) {
        $siswas = DB::select("select siswas.id, siswas.nama, siswas.nisn, siswas.jenis_kelamin, siswas.tempat_lahir, siswas.tanggal_lahir, siswas.pendidikan, siswas.alamat, siswas.no_telpon, siswas.email, jurusans.jurusan, sekolahs.nama as nama_sekolah, sekolahs.id as id_sekolah from sekolahs, siswas, jurusans, kurikulums where jurusans.kurikulum_id = kurikulums.id and jurusans.sekolah_id = sekolahs.id and siswas.jurusan_id = jurusans.id and sekolahs.id = '" .$id. "'");
        $sekolah = '';
        $id_sekolah = '';

        foreach($siswas as $row) {
            $id_sekolah = $row->id_sekolah;
            $sekolah = $row->nama_sekolah;
        }

        return view('admin.siswa.siswa', [
            'title' => 'De\'Profile Siswa',
            'siswa' => $siswas,
            'sekolah' => $sekolah,
            'id_sekolah' => $id_sekolah,
        ]);
    }

    public function create($id) {
        $jurusans = Jurusan::where('sekolah_id', $id)->get();
        $nama_sekolah_db = Sekolah::where('id', $id)->get();
        $nama_sekolah = '';

        foreach($nama_sekolah_db as $row) {
            $nama_sekolah = $row->nama;
        }

        return view('admin.siswa.add_siswa', [
            'title' => 'De\'Profile Siswa',
            'jurusan' => $jurusans,
            'nama_sekolah' => $nama_sekolah,
            'id_sekolah' => $id,
        ]);
    }
    
    public function store(Request $request) {
        $request->validate([
            'nisn' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'pendidikan' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
            'email' => 'required',
            'jurusan_id' => 'required',
        ]);

        $siswa = Siswa::create($request->all());
        
        return redirect()->route('siswa', $request->id_sekolah);
    }

    public function edit(Request $request) {
        $siswas = DB::select("select * from siswas where id = '" .$request->id. "'");
        $nama_sekolah_db = Sekolah::where('id', $request->id_sekolah)->get();
        $nama_sekolah = '';

        foreach($nama_sekolah_db as $row) {
            $nama_sekolah = $row->nama;
        }
        
        return view('admin.siswa.edit_siswa', [
            'title' => 'De\'Profile Edit Siswa',
            'siswa' => $siswas,
            'nama_sekolah' => $nama_sekolah,
            'id_sekolah' => $request->id_sekolah,
        ]);
    }

    public function update(Request $request) {
        $request->validate([
            'nisn' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'pendidikan' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
            'email' => 'required',
        ]);

        $siswa = Siswa::find($request->id);

        $siswa->update($request->all());
        
        return redirect()->route('siswa', $request->id_sekolah);
    }

    public function destroy(Request $request) {
        $siswa = Siswa::findOrFail($request->id);
        $data = $siswa->delete();

        return redirect()->route('siswa', $request->id_sekolah);
    }

    public function sekolah() {
        $sekolahs = DB::select("select sekolahs.id, sekolahs.nss,sekolahs.npsn, sekolahs.nama, sekolahs.alamat, sekolahs.rw, sekolahs.rt, sekolahs.no_telpon, sekolahs.no_fax, sekolahs.lat_long, sekolahs.image, sekolahs.email, sekolahs.kepala_sekolah, desas.desa from sekolahs, desas where sekolahs.desa_id = desas.id order by sekolahs.nama asc");

        return view('admin.siswa.index_siswa', [
            'title' => 'De\'Profile Sekolah',
            'sekolah' => $sekolahs,
        ]);
    }

    public function createUploadBulkSiswa(Request $request) {
        return view("admin.siswa.add_siswa_bulk", [
            'title' => 'De\'Profile Bulk Siswa',
            'id_sekolah' => $request->id_sekolah,
        ]);
    }

    public function uploadBulkSiswa(Request $request) {
        Excel::import(new SiswaImport, $request->file);

        return redirect()->route('siswa', $request->id_sekolah);
    }

    public function search(Request $request) {
        $request->validate([
            'search' => 'required',
        ]);

        $siswas = DB::select("select siswas.id, siswas.nama, siswas.nisn, siswas.jenis_kelamin, siswas.tempat_lahir, siswas.tanggal_lahir, siswas.pendidikan, siswas.alamat, siswas.no_telpon, siswas.email, jurusans.jurusan, sekolahs.nama as nama_sekolah, sekolahs.id as id_sekolah from sekolahs, siswas, jurusans, kurikulums where jurusans.kurikulum_id = kurikulums.id and jurusans.sekolah_id = sekolahs.id and siswas.jurusan_id = jurusans.id and sekolahs.id = '" .$request->id_sekolah. "' and (siswas.nisn like '%" .$request->search. "%' or siswas.nama like '%" .$request->search. "%')");
        $sekolah = '';
        $id_sekolah = '';

        foreach($siswas as $row) {
            $id_sekolah = $row->id_sekolah;
            $sekolah = $row->nama_sekolah;
        }

        return view('admin.siswa.siswa', [
            'title' => 'De\'Profile Siswa',
            'siswa' => $siswas,
            'sekolah' => $sekolah,
            'id_sekolah' => $id_sekolah,
        ]);
    }

    public function admin_sekolah_index() {
        $user = Auth::user();
        $siswas = DB::select("select siswas.id, siswas.nama, siswas.nisn, siswas.jenis_kelamin, siswas.tempat_lahir, siswas.tanggal_lahir, siswas.pendidikan, siswas.alamat, siswas.no_telpon, siswas.email, jurusans.jurusan, sekolahs.nama as nama_sekolah, sekolahs.id as id_sekolah from users, sekolahs, siswas, jurusans, kurikulums where users.id = sekolahs.user_id and jurusans.kurikulum_id = kurikulums.id and jurusans.sekolah_id = sekolahs.id and siswas.jurusan_id = jurusans.id and users.id = '" .$user->id. "'");
        $sekolah = '';
        $id_sekolah = '';

        foreach($siswas as $row) {
            $id_sekolah = $row->id_sekolah;
            $sekolah = $row->nama_sekolah;
        }

        return view('admin_sekolah.siswa.siswa', [
            'title' => 'De\'Profile Siswa',
            'siswa' => $siswas,
            'sekolah' => $sekolah,
            'id_sekolah' => $id_sekolah,
        ]);
    }

    public function admin_sekolah_create($id) {
        $jurusans = Jurusan::where('sekolah_id', $id)->get();
        $nama_sekolah_db = Sekolah::where('id', $id)->get();
        $nama_sekolah = '';

        foreach($nama_sekolah_db as $row) {
            $nama_sekolah = $row->nama;
        }

        return view('admin_sekolah.siswa.add_siswa', [
            'title' => 'De\'Profile Siswa',
            'jurusan' => $jurusans,
            'nama_sekolah' => $nama_sekolah,
            'id_sekolah' => $id,
        ]);
    }
    
    public function admin_sekolah_store(Request $request) {
        $request->validate([
            'nisn' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'pendidikan' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
            'email' => 'required',
            'jurusan_id' => 'required',
        ]);

        $siswa = Siswa::create($request->all());
        
        return redirect()->route('admin_sekolah_siswa', $request->id_sekolah);
    }

    public function admin_sekolah_edit(Request $request) {
        $siswas = DB::select("select * from siswas where id = '" .$request->id. "'");
        $nama_sekolah_db = Sekolah::where('id', $request->id_sekolah)->get();
        $nama_sekolah = '';

        foreach($nama_sekolah_db as $row) {
            $nama_sekolah = $row->nama;
        }
        
        return view('admin_sekolah.siswa.edit_siswa', [
            'title' => 'De\'Profile Edit Siswa',
            'siswa' => $siswas,
            'nama_sekolah' => $nama_sekolah,
            'id_sekolah' => $request->id_sekolah,
        ]);
    }

    public function admin_sekolah_update(Request $request) {
        $request->validate([
            'nisn' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'pendidikan' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
            'email' => 'required',
        ]);

        $siswa = Siswa::find($request->id);

        $siswa->update($request->all());
        
        return redirect()->route('admin_sekolah_siswa', $request->id_sekolah);
    }

    public function admin_sekolah_destroy(Request $request) {
        $siswa = Siswa::findOrFail($request->id);
        $data = $siswa->delete();

        return redirect()->route('admin_sekolah_siswa', $request->id_sekolah);
    }

    public function admin_sekolah_sekolah() {
        $sekolahs = DB::select("select sekolahs.id, sekolahs.nss,sekolahs.npsn, sekolahs.nama, sekolahs.alamat, sekolahs.rw, sekolahs.rt, sekolahs.no_telpon, sekolahs.no_fax, sekolahs.lat_long, sekolahs.image, sekolahs.email, sekolahs.kepala_sekolah, desas.desa from sekolahs, desas where sekolahs.desa_id = desas.id order by sekolahs.nama asc");

        return view('admin_sekolah.siswa.index_siswa', [
            'title' => 'De\'Profile Sekolah',
            'sekolah' => $sekolahs,
        ]);
    }

    public function admin_sekolah_createUploadBulkSiswa(Request $request) {
        return view("admin_sekolah.siswa.add_siswa_bulk", [
            'title' => 'De\'Profile Bulk Siswa',
            'id_sekolah' => $request->id_sekolah,
        ]);
    }

    public function admin_sekolah_uploadBulkSiswa(Request $request) {
        Excel::import(new SiswaImport, $request->file);

        return redirect()->route('admin_sekolah_siswa', $request->id_sekolah);
    }

    public function admin_sekolah_search(Request $request) {
        $request->validate([
            'search' => 'required',
        ]);

        $user = Auth::user();
        $siswas = DB::select("select siswas.id, siswas.nama, siswas.nisn, siswas.jenis_kelamin, siswas.tempat_lahir, siswas.tanggal_lahir, siswas.pendidikan, siswas.alamat, siswas.no_telpon, siswas.email, jurusans.jurusan, sekolahs.nama as nama_sekolah, sekolahs.id as id_sekolah from users, sekolahs, siswas, jurusans, kurikulums where users.id = sekolahs.user_id and jurusans.kurikulum_id = kurikulums.id and jurusans.sekolah_id = sekolahs.id and siswas.jurusan_id = jurusans.id and users.id = '" .$user->id. "' and (siswas.nisn like '%".$request->search."%' or siswas.nama like '%".$request->search."%')");
        $sekolah = '';
        $id_sekolah = '';

        foreach($siswas as $row) {
            $id_sekolah = $row->id_sekolah;
            $sekolah = $row->nama_sekolah;
        }

        return view('admin_sekolah.siswa.siswa', [
            'title' => 'De\'Profile Siswa',
            'siswa' => $siswas,
            'sekolah' => $sekolah,
            'id_sekolah' => $id_sekolah,
        ]);
    }
}
