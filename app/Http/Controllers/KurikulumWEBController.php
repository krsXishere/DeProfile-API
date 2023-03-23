<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kurikulum;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class KurikulumWEBController extends Controller
{
    public function index() {
        $kurikulums = Kurikulum::all();

        return view('admin.kurikulum.kurikulum', [
            'title' => 'De\'Profile Kurikulum',
            'kurikulum' => $kurikulums,
        ]);
    }
    
    public function store(Request $request) {
        $request->validate([
            'kurikulum' => 'required',
            'keterangan' => 'required',
        ]);

        $kurikulum = Kurikulum::create([
            'kurikulum' => $request->kurikulum,
            'keterangan' => $request->keterangan,
        ]);
        
        return redirect()->route('kurikulum');
    }

    public function create() {
        return view('admin.kurikulum.add_kurikulum', [
            'title' => 'De\'Profile Tambah Kurikulum',
        ]);
    }

    public function edit(Request $request, $id) {
        $kurikulum = DB::select("select * from kurikulums where id = '" .$id. "'");
        
        return view('admin.kurikulum.edit_kurikulum', [
            'title' => 'De\'Profile Edit Kurikulum',
            'kurikulum' => $kurikulum,
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'kurikulum' => 'required',
            'keterangan' => 'required',
        ]);

        $kurikulum = Kurikulum::find($id);

        $kurikulum->update([
            'kurikulum' => $request->kurikulum,
            'keterangan' => $request->keterangan,
        ]);
        
        return redirect()->route('kurikulum');
    }

    public function destroy($id) {
        $kurikulum = Kurikulum::findOrFail($id);
        $data = $kurikulum->delete();

        return redirect()->route('kurikulum');
    }

    public function search(Request $request) {
        $request->validate([
            'search' => 'required',
        ]);

        $kurikulums = DB::select("select * from kurikulums where kurikulum like '%" .$request->search. "%'");

        return view('admin.kurikulum.kurikulum', [
            'title' => 'De\'Profile Kurikulum',
            'kurikulum' => $kurikulums,
        ]);
    }
}
