<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinsiWEBController;
use App\Http\Controllers\KabupatenWEBController;
use App\Http\Controllers\KecamatanWEBController;
use App\Http\Controllers\DesaWEBController;
use App\Http\Controllers\KurikulumWEBController;
use App\Http\Controllers\UserWEBController;
use App\Http\Controllers\EkstrakulikulerWEBController;
use App\Http\Controllers\PrestasiWEBController;
use App\Http\Controllers\FasilitasWEBController;
use App\Http\Controllers\GaleriWEBController;
use App\Http\Controllers\JurusanWEBController;
use App\Http\Controllers\SekolahWEBController;
use App\Http\Controllers\SiswaWEBController;
use App\Http\Controllers\GuruWEBController;
use App\Http\Controllers\AuthWEBController;
use App\Http\Controllers\BerandaWEBController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//Auth
Route::get('/', [AuthWEBController::class, 'index'])->name('login');
Route::post('login', [AuthWEBController::class, 'login'])->name('process-login');
Route::group(['middleware' => ['auth']], function() {
    Route::group(['middleware' => ['AuthCheck:1']], function() {

        //Beranda
        Route::get('/beranda', [BerandaWEBController::class, 'index'])->name('beranda');
        Route::get('/beranda/report', [BerandaWEBController::class, 'generatePDF'])->name('report');

        //User
        Route::get('/user', [UserWEBController::class, 'index'])->name('user');
        Route::get('/user/create', [UserWEBController::class, 'create'])->name('user.create');
        Route::post('/user/tambah', [UserWEBController::class, 'store'])->name('user.store');
        Route::get('/user/edit/{id}', [UserWEBController::class, 'edit'])->name('user.edit');
        Route::put('/user/update/{id}', [UserWEBController::class, 'update'])->name('user.update');
        Route::delete('/user/destroy/{id}', [UserWEBController::class, 'destroy'])->name('user.destroy');
        Route::get('/user/search', [UserWEBController::class, 'search'])->name('user.search');

        //Provinsi
        Route::get('/provinsi', [ProvinsiWEBController::class, 'index'])->name('provinsi');
        Route::get('/provinsi/create', [ProvinsiWEBController::class, 'create'])->name('provinsi.create');
        Route::post('/provinsi/tambah', [ProvinsiWEBController::class, 'store'])->name('provinsi.store');
        Route::get('/provinsi/edit/{id}', [ProvinsiWEBController::class, 'edit'])->name('provinsi.edit');
        Route::put('/provinsi/update/{id}', [ProvinsiWEBController::class, 'update'])->name('provinsi.update');
        Route::delete('/provinsi/destroy/{id}', [ProvinsiWEBController::class, 'destroy'])->name('provinsi.destroy');
        Route::get('/provinsi/create/bulk', [ProvinsiWEBController::class, 'createUploadBulkProvinsi'])->name('provinsi.create.bulk');
        Route::post('/provinsi/bulk', [ProvinsiWEBController::class, 'uploadBulkProvinsi'])->name('provinsi.bulk');
        Route::get('/provinsi/search', [ProvinsiWEBController::class, 'search'])->name('provinsi.search');

        //Kabupaten
        Route::get('/kabupaten', [KabupatenWEBController::class, 'index'])->name('kabupaten');
        Route::get('/kabupaten/create', [KabupatenWEBController::class, 'create'])->name('kabupaten.create');
        Route::post('/kabupaten/tambah', [KabupatenWEBController::class, 'store'])->name('kabupaten.store');
        Route::get('/kabupaten/edit/{id}', [KabupatenWEBController::class, 'edit'])->name('kabupaten.edit');
        Route::put('/kabupaten/update/{id}', [KabupatenWEBController::class, 'update'])->name('kabupaten.update');
        Route::delete('/kabupaten/destroy/{id}', [KabupatenWEBController::class, 'destroy'])->name('kabupaten.destroy');
        Route::get('/kabupaten/search', [KabupatenWEBController::class, 'search'])->name('kabupaten.search');

        //Kecamatan
        Route::get('/kecamatan', [KecamatanWEBController::class, 'index'])->name('kecamatan');
        Route::get('/kecamatan/create', [KecamatanWEBController::class, 'create'])->name('kecamatan.create');
        Route::post('/kecamatan/tambah', [KecamatanWEBController::class, 'store'])->name('kecamatan.store');
        Route::get('/kecamatan/edit/{id}', [KecamatanWEBController::class, 'edit'])->name('kecamatan.edit');
        Route::put('/kecamatan/update/{id}', [KecamatanWEBController::class, 'update'])->name('kecamatan.update');
        Route::delete('/kecamatan/destroy/{id}', [KecamatanWEBController::class, 'destroy'])->name('kecamatan.destroy');
        Route::get('/kecamatan/search', [KecamatanWEBController::class, 'search'])->name('kecamatan.search');

        //Desa
        Route::get('/desa', [DesaWEBController::class, 'index'])->name('desa');
        Route::get('/desa/create', [DesaWEBController::class, 'create'])->name('desa.create');
        Route::post('/desa/tambah', [DesaWEBController::class, 'store'])->name('desa.store');
        Route::get('/desa/edit/{id}', [DesaWEBController::class, 'edit'])->name('desa.edit');
        Route::put('/desa/update/{id}', [DesaWEBController::class, 'update'])->name('desa.update');
        Route::delete('/desa/destroy/{id}', [DesaWEBController::class, 'destroy'])->name('desa.destroy');
        Route::get('/desa/search', [DesaWEBController::class, 'search'])->name('desa.search');

        //Sekolah
        Route::get('/sekolah', [SekolahWEBController::class, 'index'])->name('sekolah');
        Route::get('/sekolah/create', [SekolahWEBController::class, 'create'])->name('sekolah.create');
        Route::post('/sekolah/tambah', [SekolahWEBController::class, 'store'])->name('sekolah.store');
        Route::get('/sekolah/edit/{id}', [SekolahWEBController::class, 'edit'])->name('sekolah.edit');
        Route::put('/sekolah/update/{id}', [SekolahWEBController::class, 'update'])->name('sekolah.update');
        Route::delete('/sekolah/destroy/{id}', [SekolahWEBController::class, 'destroy'])->name('sekolah.destroy');
        Route::get('/sekolah/report', [SekolahWEBController::class, 'generatePDF'])->name('report.sekolah');
        Route::get('/sekolah/search', [SekolahWEBController::class, 'search'])->name('sekolah.search');

        //Siswa
        Route::get('/siswa-sekolah', [SiswaWEBController::class, 'sekolah'])->name('siswa.sekolah');
        Route::get('/siswa/{id}', [SiswaWEBController::class, 'index'])->name('siswa');
        Route::get('/siswa/create/{id}', [SiswaWEBController::class, 'create'])->name('siswa.create');
        Route::post('/siswa/tambah/{id_sekolah}', [SiswaWEBController::class, 'store'])->name('siswa.store');
        Route::get('/siswa/edit/{id}/{id_sekolah}', [SiswaWEBController::class, 'edit'])->name('siswa.edit');
        Route::put('/siswa/update/{id}/{id_sekolah}', [SiswaWEBController::class, 'update'])->name('siswa.update');
        Route::delete('/siswa/destroy/{id}/{id_sekolah}', [SiswaWEBController::class, 'destroy'])->name('siswa.destroy');
        Route::get('/siswa/create/bulk/{id_sekolah}', [SiswaWEBController::class, 'createUploadBulkSiswa'])->name('siswa.create.bulk');
        Route::post('/siswa/bulk/{id_sekolah}', [SiswaWEBController::class, 'uploadBulkSiswa'])->name('siswa.bulk');
        Route::get('/siswa/search/{id_sekolah}', [SiswaWEBController::class, 'search'])->name('siswa.search');

        //Guru
        Route::get('/guru-sekolah', [GuruWEBController::class, 'sekolah'])->name('guru.sekolah');
        Route::get('/guru/{id}', [GuruWEBController::class, 'index'])->name('guru');
        Route::get('/guru/create/{id}', [GuruWEBController::class, 'create'])->name('guru.create');
        Route::post('/guru/tambah/{id_sekolah}', [GuruWEBController::class, 'store'])->name('guru.store');
        Route::get('/guru/edit/{id}/{id_sekolah}', [GuruWEBController::class, 'edit'])->name('guru.edit');
        Route::put('/guru/update/{id}/{id_sekolah}', [GuruWEBController::class, 'update'])->name('guru.update');
        Route::delete('/guru/destroy/{id}/{id_sekolah}', [GuruWEBController::class, 'destroy'])->name('guru.destroy');
        Route::get('/guru/create/bulk/{id_sekolah}', [GuruWEBController::class, 'createUploadBulkGuru'])->name('guru.create.bulk');
        Route::post('/guru/bulk/{id_sekolah}', [GuruWEBController::class, 'uploadBulkGuru'])->name('guru.bulk');
        Route::get('/guru/search/{id_sekolah}', [GuruWEBController::class, 'search'])->name('guru.search');

        //Kurikulum
        Route::get('/kurikulum', [KurikulumWEBController::class, 'index'])->name('kurikulum');
        Route::get('/kurikulum/create', [KurikulumWEBController::class, 'create'])->name('kurikulum.create');
        Route::post('/kurikulum/tambah', [KurikulumWEBController::class, 'store'])->name('kurikulum.store');
        Route::get('/kurikulum/edit/{id}', [KurikulumWEBController::class, 'edit'])->name('kurikulum.edit');
        Route::put('/kurikulum/update/{id}', [KurikulumWEBController::class, 'update'])->name('kurikulum.update');
        Route::delete('/kurikulum/destroy/{id}', [KurikulumWEBController::class, 'destroy'])->name('kurikulum.destroy');
        Route::get('/kurikulum/search', [KurikulumWEBController::class, 'search'])->name('kurikulum.search');

        //Ekstrakulikuler
        Route::get('/ekstrakulikuler', [EkstrakulikulerWEBController::class, 'index'])->name('ekstrakulikuler');
        Route::get('/ekstrakulikuler/create', [EkstrakulikulerWEBController::class, 'create'])->name('ekstrakulikuler.create');
        Route::post('/ekstrakulikuler/tambah', [EkstrakulikulerWEBController::class, 'store'])->name('ekstrakulikuler.store');
        Route::get('/ekstrakulikuler/edit/{id}', [EkstrakulikulerWEBController::class, 'edit'])->name('ekstrakulikuler.edit');
        Route::put('/ekstrakulikuler/update/{id}', [EkstrakulikulerWEBController::class, 'update'])->name('ekstrakulikuler.update');
        Route::delete('/ekstrakulikuler/destroy/{id}', [EkstrakulikulerWEBController::class, 'destroy'])->name('ekstrakulikuler.destroy');
        Route::get('/ekstrakulikuler/search', [EkstrakulikulerWEBController::class, 'search'])->name('ekstrakulikuler.search');

        //Prestasi
        Route::get('/prestasi', [PrestasiWEBController::class, 'index'])->name('prestasi');
        Route::get('/prestasi/create', [PrestasiWEBController::class, 'create'])->name('prestasi.create');
        Route::post('/prestasi/tambah', [PrestasiWEBController::class, 'store'])->name('prestasi.store');
        Route::get('/prestasi/edit/{id}', [PrestasiWEBController::class, 'edit'])->name('prestasi.edit');
        Route::put('/prestasi/update/{id}', [PrestasiWEBController::class, 'update'])->name('prestasi.update');
        Route::delete('/prestasi/destroy/{id}', [PrestasiWEBController::class, 'destroy'])->name('prestasi.destroy');
        Route::get('/prestasi/search', [PrestasiWEBController::class, 'search'])->name('prestasi.search');

        //Fasilitas
        Route::get('/fasilitas', [FasilitasWEBController::class, 'index'])->name('fasilitas');
        Route::get('/fasilitas/create', [FasilitasWEBController::class, 'create'])->name('fasilitas.create');
        Route::post('/fasilitas/tambah', [FasilitasWEBController::class, 'store'])->name('fasilitas.store');
        Route::get('/fasilitas/edit/{id}', [FasilitasWEBController::class, 'edit'])->name('fasilitas.edit');
        Route::put('/fasilitas/update/{id}', [FasilitasWEBController::class, 'update'])->name('fasilitas.update');
        Route::delete('/fasilitas/destroy/{id}', [FasilitasWEBController::class, 'destroy'])->name('fasilitas.destroy');
        Route::get('/fasilitas/search', [FasilitasWEBController::class, 'search'])->name('fasilitas.search');

        //Galeri
        Route::get('/galeri', [GaleriWEBController::class, 'index'])->name('galeri');
        Route::get('/galeri/create', [GaleriWEBController::class, 'create'])->name('galeri.create');
        Route::post('/galeri/tambah', [GaleriWEBController::class, 'store'])->name('galeri.store');
        Route::get('/galeri/edit/{id}', [GaleriWEBController::class, 'edit'])->name('galeri.edit');
        Route::put('/galeri/update/{id}', [GaleriWEBController::class, 'update'])->name('galeri.update');
        Route::delete('/galeri/destroy/{id}', [GaleriWEBController::class, 'destroy'])->name('galeri.destroy');
        Route::get('/galeri/search', [GaleriWEBController::class, 'search'])->name('galeri.search');

        //Jurusan
        Route::get('/jurusan', [JurusanWEBController::class, 'index'])->name('jurusan');
        Route::get('/jurusan/create', [JurusanWEBController::class, 'create'])->name('jurusan.create');
        Route::post('/jurusan/tambah', [JurusanWEBController::class, 'store'])->name('jurusan.store');
        Route::get('/jurusan/edit/{id}', [JurusanWEBController::class, 'edit'])->name('jurusan.edit');
        Route::put('/jurusan/update/{id}', [JurusanWEBController::class, 'update'])->name('jurusan.update');
        Route::delete('/jurusan/destroy/{id}', [JurusanWEBController::class, 'destroy'])->name('jurusan.destroy');
        Route::get('/jurusan/search', [JurusanWEBController::class, 'search'])->name('jurusan.search');

        //Auth Logout
        Route::post('logout', [AuthWEBController::class, 'logout'])->name('logout');
    });
});

Route::group(['middleware' => ['auth']], function() {
    Route::group(['middleware' => ['AuthCheck:2']], function() {
        
        //Siswa
        // Route::get('/admin_sekolah/siswa-sekolah', [SiswaWEBController::class, 'admin_sekolah_sekolah'])->name('admin_sekolah_siswa.sekolah');
        Route::get('/admin_sekolah/siswa', [SiswaWEBController::class, 'admin_sekolah_index'])->name('admin_sekolah_siswa');
        Route::get('/admin_sekolah/siswa/create/{id}', [SiswaWEBController::class, 'admin_sekolah_create'])->name('admin_sekolah_siswa.create');
        Route::post('/admin_sekolah/siswa/tambah/{id_sekolah}', [SiswaWEBController::class, 'admin_sekolah_store'])->name('admin_sekolah_siswa.store');
        Route::get('/admin_sekolah/siswa/edit/{id}/{id_sekolah}', [SiswaWEBController::class, 'admin_sekolah_edit'])->name('admin_sekolah_siswa.edit');
        Route::put('/admin_sekolah/siswa/update/{id}/{id_sekolah}', [SiswaWEBController::class, 'admin_sekolah_update'])->name('admin_sekolah_siswa.update');
        Route::delete('/admin_sekolah/siswa/destroy/{id}/{id_sekolah}', [SiswaWEBController::class, 'admin_sekolah_destroy'])->name('admin_sekolah_siswa.destroy');
        Route::get('/admin_sekolah/siswa/create/bulk/{id_sekolah}', [SiswaWEBController::class, 'admin_sekolah_createUploadBulkSiswa'])->name('admin_sekolah_siswa.create.bulk');
        Route::post('/admin_sekolah/siswa/bulk/{id_sekolah}', [SiswaWEBController::class, 'admin_sekolah_uploadBulkSiswa'])->name('admin_sekolah_siswa.bulk');
        Route::get('/admin_sekolah/siswa/search/{id_sekolah}', [SiswaWEBController::class, 'admin_sekolah_search'])->name('admin_sekolah_siswa.search');

        //Guru
        // Route::get('/admin_sekolah/guru-sekolah', [GuruWEBController::class, 'admin_sekolah_sekolah'])->name('admin_sekolah_guru.sekolah');
        Route::get('/admin_sekolah/guru', [GuruWEBController::class, 'admin_sekolah_index'])->name('admin_sekolah_guru');
        Route::get('/admin_sekolah/guru/create/{id}', [GuruWEBController::class, 'admin_sekolah_create'])->name('admin_sekolah_guru.create');
        Route::post('/admin_sekolah/guru/tambah/{id_sekolah}', [GuruWEBController::class, 'admin_sekolah_store'])->name('admin_sekolah_guru.store');
        Route::get('/admin_sekolah/guru/edit/{id}/{id_sekolah}', [GuruWEBController::class, 'admin_sekolah_edit'])->name('admin_sekolah_guru.edit');
        Route::put('/admin_sekolah/guru/update/{id}/{id_sekolah}', [GuruWEBController::class, 'admin_sekolah_update'])->name('admin_sekolah_guru.update');
        Route::delete('/admin_sekolah/guru/destroy/{id}/{id_sekolah}', [GuruWEBController::class, 'admin_sekolah_destroy'])->name('admin_sekolah_guru.destroy');
        Route::get('/admin_sekolah/guru/create/bulk/{id_sekolah}', [GuruWEBController::class, 'admin_sekolah_createUploadBulkGuru'])->name('admin_sekolah_guru.create.bulk');
        Route::post('/admin_sekolah/guru/bulk/{id_sekolah}', [GuruWEBController::class, 'admin_sekolah_uploadBulkGuru'])->name('admin_sekolah_guru.bulk');
        Route::get('/admin_sekolah/guru/search/{id_sekolah}', [GuruWEBController::class, 'admin_sekolah_search'])->name('admin_sekolah_guru.search');

        //Ekstrakulikuler
        Route::get('/admin_sekolah/ekstrakulikuler', [EkstrakulikulerWEBController::class, 'admin_sekolah_index'])->name('admin_sekolah_ekstrakulikuler');
        Route::get('/admin_sekolah/ekstrakulikuler/create', [EkstrakulikulerWEBController::class, 'admin_sekolah_create'])->name('admin_sekolah_ekstrakulikuler.create');
        Route::post('/admin_sekolah/ekstrakulikuler/tambah', [EkstrakulikulerWEBController::class, 'admin_sekolah_store'])->name('admin_sekolah_ekstrakulikuler.store');
        Route::get('/admin_sekolah/ekstrakulikuler/edit/{id}', [EkstrakulikulerWEBController::class, 'admin_sekolah_edit'])->name('admin_sekolah_ekstrakulikuler.edit');
        Route::put('/admin_sekolah/ekstrakulikuler/update/{id}', [EkstrakulikulerWEBController::class, 'admin_sekolah_update'])->name('admin_sekolah_ekstrakulikuler.update');
        Route::delete('/admin_sekolah/ekstrakulikuler/destroy/{id}', [EkstrakulikulerWEBController::class, 'admin_sekolah_destroy'])->name('admin_sekolah_ekstrakulikuler.destroy');
        Route::get('/admin_sekolah/ekstrakulikuler/search', [EkstrakulikulerWEBController::class, 'admin_sekolah_search'])->name('admin_sekolah_ekstrakulikuler.search');

        //Prestasi
        Route::get('/admin_sekolah/prestasi', [PrestasiWEBController::class, 'admin_sekolah_index'])->name('admin_sekolah_prestasi');
        Route::get('/admin_sekolah/prestasi/create', [PrestasiWEBController::class, 'admin_sekolah_create'])->name('admin_sekolah_prestasi.create');
        Route::post('/admin_sekolah/prestasi/tambah', [PrestasiWEBController::class, 'admin_sekolah_store'])->name('admin_sekolah_prestasi.store');
        Route::get('/admin_sekolah/prestasi/edit/{id}', [PrestasiWEBController::class, 'admin_sekolah_edit'])->name('admin_sekolah_prestasi.edit');
        Route::put('/admin_sekolah/prestasi/update/{id}', [PrestasiWEBController::class, 'admin_sekolah_update'])->name('admin_sekolah_prestasi.update');
        Route::delete('/admin_sekolah/prestasi/destroy/{id}', [PrestasiWEBController::class, 'admin_sekolah_destroy'])->name('admin_sekolah_prestasi.destroy');
        Route::get('/admin_sekolah/prestasi/search', [PrestasiWEBController::class, 'admin_sekolah_search'])->name('admin_sekolah_prestasi.search');

        //Fasilitas
        Route::get('/admin_sekolah/fasilitas', [FasilitasWEBController::class, 'admin_sekolah_index'])->name('admin_sekolah_fasilitas');
        Route::get('/admin_sekolah/fasilitas/create', [FasilitasWEBController::class, 'admin_sekolah_create'])->name('admin_sekolah_fasilitas.create');
        Route::post('/admin_sekolah/fasilitas/tambah', [FasilitasWEBController::class, 'admin_sekolah_store'])->name('admin_sekolah_fasilitas.store');
        Route::get('/admin_sekolah/fasilitas/edit/{id}', [FasilitasWEBController::class, 'admin_sekolah_edit'])->name('admin_sekolah_fasilitas.edit');
        Route::put('/admin_sekolah/fasilitas/update/{id}', [FasilitasWEBController::class, 'admin_sekolah_update'])->name('admin_sekolah_fasilitas.update');
        Route::delete('/admin_sekolah/fasilitas/destroy/{id}', [FasilitasWEBController::class, 'admin_sekolah_destroy'])->name('admin_sekolah_fasilitas.destroy');
        Route::get('/admin_sekolah/fasilitas/search', [FasilitasWEBController::class, 'admin_sekolah_search'])->name('admin_sekolah_fasilitas.search');

        //Galeri
        Route::get('/admin_sekolah/galeri', [GaleriWEBController::class, 'admin_sekolah_index'])->name('admin_sekolah_galeri');
        Route::get('/admin_sekolah/galeri/create', [GaleriWEBController::class, 'admin_sekolah_create'])->name('admin_sekolah_galeri.create');
        Route::post('/admin_sekolah/galeri/tambah', [GaleriWEBController::class, 'admin_sekolah_store'])->name('admin_sekolah_galeri.store');
        Route::get('/admin_sekolah/galeri/edit/{id}', [GaleriWEBController::class, 'admin_sekolah_edit'])->name('admin_sekolah_galeri.edit');
        Route::put('/admin_sekolah/galeri/update/{id}', [GaleriWEBController::class, 'admin_sekolah_update'])->name('admin_sekolah_galeri.update');
        Route::delete('/admin_sekolah/galeri/destroy/{id}', [GaleriWEBController::class, 'admin_sekolah_destroy'])->name('admin_sekolah_galeri.destroy');
        Route::get('/admin_sekolah/galeri/search', [GaleriWEBController::class, 'admin_sekolah_search'])->name('admin_sekolah_galeri.search');

        //Jurusan
        Route::get('/admin_sekolah/jurusan', [JurusanWEBController::class, 'admin_sekolah_index'])->name('admin_sekolah_jurusan');
        Route::get('/admin_sekolah/jurusan/create', [JurusanWEBController::class, 'admin_sekolah_create'])->name('admin_sekolah_jurusan.create');
        Route::post('/admin_sekolah/jurusan/tambah', [JurusanWEBController::class, 'admin_sekolah_store'])->name('admin_sekolah_jurusan.store');
        Route::get('/admin_sekolah/jurusan/edit/{id}', [JurusanWEBController::class, 'admin_sekolah_edit'])->name('admin_sekolah_jurusan.edit');
        Route::put('/admin_sekolah/jurusan/update/{id}', [JurusanWEBController::class, 'admin_sekolah_update'])->name('admin_sekolah_jurusan.update');
        Route::delete('/admin_sekolah/jurusan/destroy/{id}', [JurusanWEBController::class, 'admin_sekolah_destroy'])->name('admin_sekolah_jurusan.destroy');
        Route::get('/admin_sekolah/jurusan/search', [JurusanWEBController::class, 'admin_sekolah_search'])->name('admin_sekolah_jurusan.search');

        //Auth Logout
        Route::post('admin_sekolah/logout', [AuthWEBController::class, 'logout'])->name('admin_sekolah_logout');
    });
});
