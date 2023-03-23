<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Sekolah;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Excel;
use App\Imports\GuruImport;
use Illuminate\Support\Facades\Auth;

class GuruWEBController extends Controller
{
    public function index($id) {
        $gurus = DB::select("select gurus.id, gurus.nama, gurus.nip, gurus.jenis_kelamin, gurus.tempat_lahir, gurus.tanggal_lahir, gurus.pendidikan, gurus.jurusan, gurus.alamat, gurus.no_telpon, gurus.email, sekolahs.nama as nama_sekolah, sekolahs.id as id_sekolah from sekolahs, gurus where gurus.sekolah_id = sekolahs.id and sekolahs.id = '" .$id. "'");
        $sekolah = '';
        $id_sekolah = '';

        foreach($gurus as $row) {
            $id_sekolah = $row->id_sekolah;
            $sekolah = $row->nama_sekolah;
        }

        return view('admin.guru.guru', [
            'title' => 'De\'Profile Guru',
            'guru' => $gurus,
            'sekolah' => $sekolah,
            'id_sekolah' => $id_sekolah,
        ]);
    }

    public function create($id) {
        $nama_sekolah_db = Sekolah::where('id', $id)->get();
        $nama_sekolah = '';

        foreach($nama_sekolah_db as $row) {
            $nama_sekolah = $row->nama;
        }

        return view('admin.guru.add_guru', [
            'title' => 'De\'Profile Guru',
            'nama_sekolah' => $nama_sekolah,
            'id_sekolah' => $id,
        ]);
    }
    
    public function store(Request $request) {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'pendidikan' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
            'email' => 'required',
        ]);

        $guru = Guru::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pendidikan' => $request->pendidikan,
            'jurusan' => $request->jurusan,
            'alamat' => $request->alamat,
            'no_telpon' => $request->no_telpon,
            'email' => $request->email,
            'sekolah_id' => $request->id_sekolah,
        ]);
        
        return redirect()->route('guru', $request->id_sekolah);
    }

    public function edit(Request $request) {
        $gurus = DB::select("select * from gurus where id = '" .$request->id. "'");
        $nama_sekolah_db = Sekolah::where('id', $request->id_sekolah)->get();
        $nama_sekolah = '';

        foreach($nama_sekolah_db as $row) {
            $nama_sekolah = $row->nama;
        }
        
        return view('admin.guru.edit_guru', [
            'title' => 'De\'Profile Edit Guru',
            'guru' => $gurus,
            'nama_sekolah' => $nama_sekolah,
            'id_sekolah' => $request->id_sekolah,
        ]);
    }

    public function update(Request $request) {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'pendidikan' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
            'email' => 'required',
        ]);

        $guru = Guru::find($request->id);

        $guru->update($request->all());
        
        return redirect()->route('guru', $request->id_sekolah);
    }

    public function destroy(Request $request) {
        $guru = Guru::findOrFail($request->id);
        $data = $guru->delete();

        return redirect()->route('guru', $request->id_sekolah);
    }

    public function sekolah() {
        $sekolahs = DB::select("select sekolahs.id, sekolahs.nss,sekolahs.npsn, sekolahs.nama, sekolahs.alamat, sekolahs.rw, sekolahs.rt, sekolahs.no_telpon, sekolahs.no_fax, sekolahs.lat_long, sekolahs.image, sekolahs.email, sekolahs.kepala_sekolah, desas.desa from sekolahs, desas where sekolahs.desa_id = desas.id order by sekolahs.nama asc");

        return view('admin.guru.index_guru', [
            'title' => 'De\'Profile Sekolah',
            'sekolah' => $sekolahs,
        ]);
    }

    public function createUploadBulkGuru(Request $request) {
        return view("admin.guru.add_guru_bulk", [
            'title' => 'De\'Profile Bulk Guru',
            'id_sekolah' => $request->id_sekolah,
        ]);
    }

    public function uploadBulkGuru(Request $request) {
        Excel::import(new guruImport, $request->file);

        return redirect()->route('guru', $request->id_sekolah);
    }

    public function search(Request $request) {
        $request->validate([
            'search' => 'required',
        ]);

        $gurus = DB::select("select gurus.id, gurus.nama, gurus.nip, gurus.jenis_kelamin, gurus.tempat_lahir, gurus.tanggal_lahir, gurus.pendidikan, gurus.jurusan, gurus.alamat, gurus.no_telpon, gurus.email, sekolahs.nama as nama_sekolah, sekolahs.id as id_sekolah from sekolahs, gurus where gurus.sekolah_id = sekolahs.id and sekolahs.id = '" .$request->id_sekolah. "' and (gurus.nip like '%" .$request->search. "%' or gurus.nama like '%" .$request->search. "%')");
        $sekolah = '';
        $id_sekolah = '';

        foreach($gurus as $row) {
            $id_sekolah = $row->id_sekolah;
            $sekolah = $row->nama_sekolah;
        }

        return view('admin.guru.guru', [
            'title' => 'De\'Profile Guru',
            'guru' => $gurus,
            'sekolah' => $sekolah,
            'id_sekolah' => $id_sekolah,
        ]);
    }

    public function admin_sekolah_index() {
        $user = Auth::user();
        $gurus = DB::select("select gurus.id, gurus.nama, gurus.nip, gurus.jenis_kelamin, gurus.tempat_lahir, gurus.tanggal_lahir, gurus.pendidikan, gurus.jurusan, gurus.alamat, gurus.no_telpon, gurus.email, sekolahs.nama as nama_sekolah, sekolahs.id as id_sekolah from sekolahs, users, gurus where gurus.sekolah_id = sekolahs.id and sekolahs.user_id = users.id and users.id = '" .$user->id. "'");
        $sekolah = '';
        $id_sekolah = '';

        foreach($gurus as $row) {
            $id_sekolah = $row->id_sekolah;
            $sekolah = $row->nama_sekolah;
        }

        return view('admin_sekolah.guru.guru', [
            'title' => 'De\'Profile Guru',
            'guru' => $gurus,
            'sekolah' => $sekolah,
            'id_sekolah' => $id_sekolah,
        ]);
    }

    public function admin_sekolah_create($id) {
        $nama_sekolah_db = Sekolah::where('id', $id)->get();
        $nama_sekolah = '';

        foreach($nama_sekolah_db as $row) {
            $nama_sekolah = $row->nama;
        }

        return view('admin_sekolah.guru.add_guru', [
            'title' => 'De\'Profile Guru',
            'nama_sekolah' => $nama_sekolah,
            'id_sekolah' => $id,
        ]);
    }
    
    public function admin_sekolah_store(Request $request) {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'pendidikan' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
            'email' => 'required',
        ]);

        $guru = Guru::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pendidikan' => $request->pendidikan,
            'jurusan' => $request->jurusan,
            'alamat' => $request->alamat,
            'no_telpon' => $request->no_telpon,
            'email' => $request->email,
            'sekolah_id' => $request->id_sekolah,
        ]);
        
        return redirect()->route('admin_sekolah_guru', $request->id_sekolah);
    }

    public function admin_sekolah_edit(Request $request) {
        $gurus = DB::select("select * from gurus where id = '" .$request->id. "'");
        $nama_sekolah_db = Sekolah::where('id', $request->id_sekolah)->get();
        $nama_sekolah = '';

        foreach($nama_sekolah_db as $row) {
            $nama_sekolah = $row->nama;
        }
        
        return view('admin_sekolah.guru.edit_guru', [
            'title' => 'De\'Profile Edit Guru',
            'guru' => $gurus,
            'nama_sekolah' => $nama_sekolah,
            'id_sekolah' => $request->id_sekolah,
        ]);
    }

    public function admin_sekolah_update(Request $request) {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'pendidikan' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
            'email' => 'required',
        ]);

        $guru = Guru::find($request->id);

        $guru->update($request->all());
        
        return redirect()->route('admin_sekolah_guru', $request->id_sekolah);
    }

    public function admin_sekolah_destroy(Request $request) {
        $guru = Guru::findOrFail($request->id);
        $data = $guru->delete();

        return redirect()->route('admin_sekolah_guru', $request->id_sekolah);
    }

    public function admin_sekolah_sekolah() {
        $sekolahs = DB::select("select sekolahs.id, sekolahs.nss,sekolahs.npsn, sekolahs.nama, sekolahs.alamat, sekolahs.rw, sekolahs.rt, sekolahs.no_telpon, sekolahs.no_fax, sekolahs.lat_long, sekolahs.image, sekolahs.email, sekolahs.kepala_sekolah, desas.desa from sekolahs, desas where sekolahs.desa_id = desas.id order by sekolahs.nama asc");

        return view('admin_sekolah.guru.index_guru', [
            'title' => 'De\'Profile Sekolah',
            'sekolah' => $sekolahs,
        ]);
    }

    public function admin_sekolah_createUploadBulkGuru(Request $request) {
        return view("admin_sekolah.guru.add_guru_bulk", [
            'title' => 'De\'Profile Bulk Guru',
            'id_sekolah' => $request->id_sekolah,
        ]);
    }

    public function admin_sekolah_uploadBulkGuru(Request $request) {
        Excel::import(new guruImport, $request->file);

        return redirect()->route('admin_sekolah_guru', $request->id_sekolah);
    }

    public function admin_sekolah_search(Request $request) {
        $request->validate([
            'search' => 'required',
        ]);

        $user = Auth::user();
        $gurus = DB::select("select gurus.id, gurus.nama, gurus.nip, gurus.jenis_kelamin, gurus.tempat_lahir, gurus.tanggal_lahir, gurus.pendidikan, gurus.jurusan, gurus.alamat, gurus.no_telpon, gurus.email, sekolahs.nama as nama_sekolah, sekolahs.id as id_sekolah from sekolahs, users, gurus where gurus.sekolah_id = sekolahs.id and sekolahs.user_id = users.id and users.id = '" .$user->id. "' and (gurus.nip like '%" .$request->search. "%' or gurus.nama like '%" .$request->search. "%')");
        $sekolah = '';
        $id_sekolah = '';

        foreach($gurus as $row) {
            $id_sekolah = $row->id_sekolah;
            $sekolah = $row->nama_sekolah;
        }

        return view('admin_sekolah.guru.guru', [
            'title' => 'De\'Profile Guru',
            'guru' => $gurus,
            'sekolah' => $sekolah,
            'id_sekolah' => $id_sekolah,
        ]);
    }
}
