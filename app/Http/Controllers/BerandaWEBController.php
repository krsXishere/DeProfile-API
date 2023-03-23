<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class BerandaWEBController extends Controller
{
    public function index() {
        $sekolah_db = DB::select("select count(id) as jumlah from sekolahs");
        $siswa_db = DB::select("select count(id) as jumlah from siswas");
        $guru_db = DB::select("select count(id) as jumlah from gurus");
        $akun_db = DB::select("select count(id) as jumlah from users");
        $sekolah = '';
        $siswa = '';
        $guru = '';
        $akun = '';

        foreach($sekolah_db as $row) {
            $sekolah = $row->jumlah;
        }

        foreach($siswa_db as $row) {
            $siswa = $row->jumlah;
        }

        foreach($guru_db as $row) {
            $guru = $row->jumlah;
        }

        foreach($akun_db as $row) {
            $akun = $row->jumlah;
        }

        return view('admin.beranda.beranda', [
            'title' => 'De\'Profile Beranda',
            'sekolah' => $sekolah,
            'siswa' => $siswa,
            'guru' => $guru,
            'akun' => $akun,
        ]);
    }

    public function generatePDF() {
        $sekolah_db = DB::select("select count(id) as jumlah from sekolahs");
        $siswa_db = DB::select("select count(id) as jumlah from siswas");
        $guru_db = DB::select("select count(id) as jumlah from gurus");
        $akun_db = DB::select("select count(id) as jumlah from users");
        $sekolah = '';
        $siswa = '';
        $guru = '';
        $akun = '';

        foreach($sekolah_db as $row) {
            $sekolah = $row->jumlah;
        }

        foreach($siswa_db as $row) {
            $siswa = $row->jumlah;
        }

        foreach($guru_db as $row) {
            $guru = $row->jumlah;
        }

        foreach($akun_db as $row) {
            $akun = $row->jumlah;
        }

        $data = [
            'sekolah' => $sekolah,
            'siswa' => $siswa,
            'guru' => $guru,
            'akun' => $akun,
        ];

        $pdf = PDF::loadView("admin.report.report", $data)->setPaper('a4', 'landscape');

        return $pdf->stream("report-deprofile.pdf");
    }
}
