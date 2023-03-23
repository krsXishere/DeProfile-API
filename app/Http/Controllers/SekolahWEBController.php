<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekolah;
use App\Models\Desa;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use PDF;

class SekolahWEBController extends Controller
{
    public function index() {
        $sekolahs = DB::select("select sekolahs.id, sekolahs.nss,sekolahs.npsn, sekolahs.nama, sekolahs.alamat, sekolahs.rw, sekolahs.rt, sekolahs.no_telpon, sekolahs.no_fax, sekolahs.lat_long, sekolahs.image, sekolahs.email, sekolahs.kepala_sekolah, desas.desa from sekolahs, desas where sekolahs.desa_id = desas.id order by sekolahs.nama asc");

        return view('admin.sekolah.sekolah', [
            'title' => 'De\'Profile Sekolah',
            'sekolah' => $sekolahs,
        ]);
    }
    
    public function store(Request $request) {
        $request->validate([
            'nss' => 'required',
            'npsn' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'desa_id' => 'required',
            'rw' => 'required',
            'rt' => 'required',
            'no_telpon' => 'required',
            'no_fax' => 'required',
            'lat_long' => 'required',
            'email' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'kepala_sekolah' => 'required',
            'user_id' => 'required',
        ]);

        $image_path = $request->file('image')->store('sekolah', 'public');
        $image = $request->file('image');
        $image->move(public_path('storage/sekolah'), $image_path);

        $sekolah = Sekolah::create([
            'nss' => $request->nss,
            'npsn' => $request->npsn,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'desa_id' => $request->desa_id,
            'rw' => $request->rw,
            'rt' => $request->rt,
            'no_telpon' => $request->no_telpon,
            'no_fax' => $request->no_fax,
            'lat_long' => $request->lat_long,
            'image' => $image_path,
            'email' => $request->email,
            'kepala_sekolah' => $request->kepala_sekolah,
            'user_id' => $request->user_id,
        ]);
        
        return redirect()->route('sekolah');
    }

    public function create() {
        $desas = Desa::all();
        $users = DB::select("select users.id, users.name from users, levels where levels.id = users.level_id and (users.status_akun = 'Belum digunakan')");

        return view('admin.sekolah.add_sekolah', [
            'title' => 'De\'Profile Tambah sekolah',
            'desa' => $desas,
            'user' => $users,
        ]);
    }

    public function edit(Request $request, $id) {
        $sekolahs = DB::select("select * from sekolahs where id = '" .$id. "'");
        
        return view('admin.sekolah.edit_sekolah', [
            'title' => 'De\'Profile Edit Sekolah',
            'sekolah' => $sekolahs,
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nss' => 'required',
            'npsn' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'rw' => 'required',
            'rt' => 'required',
            'no_telpon' => 'required',
            'no_fax' => 'required',
            'lat_long' => 'required',
            'email' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'kepala_sekolah' => 'required',
        ]);

        $sekolah = Sekolah::find($id);

        $old_image_path = public_path().'/storage'.'/'.$sekolah->image;
        $image_path = $request->file('image')->store('sekolah', 'public');
        $image = $request->file('image');

        if(!$old_image_path) {
            if(file_exist($old_image_path)) {
                unlink($old_image_path);
                $image->move(public_path('storage/sekolah'), $image_path);
                $sekolah->image = $image_path;
                $sekolah->save();
            } else {
                $image->move(public_path('storage/sekolah'), $image_path);
                $sekolah->image = $image_path;
                $sekolah->save();
            }
        } else {
            $image->move(public_path('storage/sekolah'), $image_path);
            $sekolah->image = $image_path;
            $sekolah->save();
        }

        $sekolah->update([
            'nss' => $request->nss,
            'npsn' => $request->npsn,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'rw' => $request->rw,
            'rt' => $request->rt,
            'no_telpon' => $request->no_telpon,
            'no_fax' => $request->no_fax,
            'lat_long' => $request->lat_long,
            'image' => $image_path,
            'email' => $request->email,
            'kepala_sekolah' => $request->kepala_sekolah,
        ]);
        
        return redirect()->route('sekolah');
    }

    public function destroy($id) {
        $sekolah = Sekolah::find($id);
        $old_image_path = public_path().'/storage'.'/'.$sekolah->image;
        if(file_exists($old_image_path)) {
            unlink($old_image_path);
            $data = $sekolah->delete();
        }
        $data = $sekolah->delete();

        return redirect()->route('sekolah');
    }

    public function generatePDF() {
        $sekolahs = DB::select("select sekolahs.id, sekolahs.nss,sekolahs.npsn, sekolahs.nama, sekolahs.alamat, sekolahs.rw, sekolahs.rt, sekolahs.no_telpon, sekolahs.no_fax, sekolahs.lat_long, sekolahs.email, sekolahs.kepala_sekolah, desas.desa from sekolahs, desas where sekolahs.desa_id = desas.id order by sekolahs.nama asc");

        $data = [
            'sekolah' => $sekolahs,
        ];

        $pdf = PDF::loadView("admin.report.report_sekolah", $data)->setPaper('a4', 'landscape');

        return $pdf->stream("report-deprofile.pdf");
    }

    public function search(Request $request) {
        $request->validate([
            'search' => 'required',
        ]);

        $sekolahs = DB::select("select sekolahs.id, sekolahs.nss,sekolahs.npsn, sekolahs.nama, sekolahs.alamat, sekolahs.rw, sekolahs.rt, sekolahs.no_telpon, sekolahs.no_fax, sekolahs.lat_long, sekolahs.image, sekolahs.email, sekolahs.kepala_sekolah, desas.desa from sekolahs, desas, kecamatans, kabupatens, provinsis where desas.kecamatan_id  = kecamatans.id and kecamatans.kabupaten_id = kabupatens.id and kabupatens.provinsi_id = provinsis.id and sekolahs.desa_id = desas.id and (sekolahs.nss like '%" .$request->search. "%' or sekolahs.npsn like '%" .$request->search. "%' or sekolahs.nama like '%" .$request->search. "%')");

        return view('admin.sekolah.sekolah', [
            'title' => 'De\'Profile Sekolah',
            'sekolah' => $sekolahs,
        ]); 
    }
}
