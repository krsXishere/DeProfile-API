<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekolah;
use App\Models\Galeri;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class GaleriWEBController extends Controller
{
    public function index() {
        $galeris = DB::select("select galeris.id, judul, deskripsi, galeris.image, nama from galeris, sekolahs where galeris.sekolah_id = sekolahs.id");

        return view('admin.galeri.galeri', [
            'title' => 'De\'Profile Galeri',
            'galeri' => $galeris,
        ]);
    }
    
    public function store(Request $request) {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'sekolah_id' => 'required',
        ]);

        $image_path = $request->file('image')->store('galeri', 'public');

        $galeri = Galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image' => $image_path,
            'sekolah_id' => $request->sekolah_id,
        ]);
        
        return redirect()->route('galeri');
    }

    public function create() {
        $sekolahs = Sekolah::all();

        return view('admin.galeri.add_galeri', [
            'title' => 'De\'Profile Tambah Galeri',
            'sekolah' => $sekolahs,
        ]);
    }

    public function edit(Request $request, $id) {
        $galeri = DB::select("select * from galeris where id = '" .$id. "'");
        
        return view('admin.galeri.edit_galeri', [
            'title' => 'De\'Profile Edit Galeri',
            'galeri' => $galeri,
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        $galeri = Galeri::find($id);

        $old_image_path = public_path().'/storage'.'/'.$galeri->image;
        // dd($old_image_path);

        $image_path = '';

        if(!$old_image_path) {
            if(file_exists($old_image_path)) {
                unlink($old_image_path);
                $image_path = $request->file('image')->store('galeri', 'public');
            } else {
                $image_path = $request->file('image')->store('galeri', 'public');
            }
        } else {
            $image_path = $request->file('image')->store('galeri', 'public');
        }

        $galeri->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image' => $image_path,
        ]);
        
        return redirect()->route('galeri');
    }

    public function destroy($id) {
        $galeri = galeri::find($id);
        $old_image_path = public_path().'/storage'.'/'.$galeri->image;
        if(!$old_image_path) {
            if(file_exists($old_image_path)) {
                unlink($old_image_path);
            }
        }
        $galeri->delete();

        return redirect()->route('galeri');
    }

    public function search(Request $request) {
        $request->validate([
            'search' => 'required',
        ]);

        $galeris = DB::select("select galeris.id, judul, deskripsi, galeris.image, nama from galeris, sekolahs where galeris.sekolah_id = sekolahs.id and (galeris.judul like '%" .$request->search. "%')");

        return view('admin.galeri.galeri', [
            'title' => 'De\'Profile Galeri',
            'galeri' => $galeris,
        ]);
    }

    public function admin_sekolah_index() {
        $user = Auth::user();
        $galeris = DB::select("select galeris.id, judul, deskripsi, galeris.image, nama from galeris, users, sekolahs where sekolahs.user_id = users.id and galeris.sekolah_id = sekolahs.id and users.id = '".$user->id."'");

        return view('admin_sekolah.galeri.galeri', [
            'title' => 'De\'Profile Galeri',
            'galeri' => $galeris,
        ]);
    }
    
    public function admin_sekolah_store(Request $request) {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'sekolah_id' => 'required',
        ]);

        $image_path = $request->file('image')->store('galeri', 'public');

        $galeri = Galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image' => $image_path,
            'sekolah_id' => $request->sekolah_id,
        ]);
        
        return redirect()->route('admin_sekolah_galeri');
    }

    public function admin_sekolah_create() {
        $sekolahs = Sekolah::all();

        return view('admin_sekolah.galeri.add_galeri', [
            'title' => 'De\'Profile Tambah Galeri',
            'sekolah' => $sekolahs,
        ]);
    }

    public function admin_sekolah_edit(Request $request, $id) {
        $galeri = DB::select("select * from galeris where id = '" .$id. "'");
        
        return view('admin_sekolah.galeri.edit_galeri', [
            'title' => 'De\'Profile Edit Galeri',
            'galeri' => $galeri,
        ]);
    }

    public function admin_sekolah_update(Request $request, $id) {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        $galeri = Galeri::find($id);

        $old_image_path = public_path().'/storage'.'/'.$galeri->image;
        // dd($old_image_path);

        $image_path = '';

        if(!$old_image_path) {
            if(file_exists($old_image_path)) {
                unlink($old_image_path);
                $image_path = $request->file('image')->store('galeri', 'public');
            } else {
                $image_path = $request->file('image')->store('galeri', 'public');
            }
        } else {
            $image_path = $request->file('image')->store('galeri', 'public');
        }

        $galeri->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image' => $image_path,
        ]);
        
        return redirect()->route('admin_sekolah_galeri');
    }

    public function admin_sekolah_destroy($id) {
        $galeri = galeri::find($id);
        $old_image_path = public_path().'/storage'.'/'.$galeri->image;
        if(!$old_image_path) {
            if(file_exists($old_image_path)) {
                unlink($old_image_path);
            }
        }
        $galeri->delete();

        return redirect()->route('admin_sekolah_galeri');
    }

    public function admin_sekolah_search(Request $request) {
        $request->validate([
            'search' => 'required',
        ]);

        $user = Auth::user();
        $galeris = DB::select("select galeris.id, judul, deskripsi, galeris.image, nama from galeris, sekolahs, users where users.id = sekolahs.user_id and galeris.sekolah_id = sekolahs.id and users.id = '".$user->id."' and (galeris.judul like '%" .$request->search. "%')");

        return view('admin_sekolah.galeri.galeri', [
            'title' => 'De\'Profile Galeri',
            'galeri' => $galeris,
        ]);
    }
}
