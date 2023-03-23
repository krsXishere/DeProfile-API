<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProvinsiController;
use App\Http\Controllers\api\KabupatenController;
use App\Http\Controllers\api\KecamatanController;
use App\Http\Controllers\api\DesaController;
use App\Http\Controllers\api\SekolahController;
use App\Http\Controllers\api\KurikulumController;
use App\Http\Controllers\api\JurusanController;
use App\Http\Controllers\api\SiswaController;
use App\Http\Controllers\api\FasilitasController;
use App\Http\Controllers\api\EkstrakulikulerController;
use App\Http\Controllers\api\PrestasiController;
use App\Http\Controllers\api\GuruController;
use App\Http\Controllers\api\GaleriController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//sekolah
Route::get('sekolah', [SekolahController::class, 'index']);
Route::get('sekolah/{id}', [SekolahController::class, 'show']);
Route::get('sekolah-guru/{id}', [SekolahController::class, 'guru']);
Route::get('sekolah-fasilitas/{id}', [SekolahController::class, 'fasilitas']);
Route::get('sekolah-galeri/{id}', [SekolahController::class, 'galeri']);
Route::get('sekolah-jurusan/{id}', [SekolahController::class, 'jurusan']);
Route::get('sekolah-prestasi/{id}', [SekolahController::class, 'prestasi']);
Route::get('sekolah-ekstrakulikuler/{id}', [SekolahController::class, 'ekstrakulikuler']);
Route::get('sekolah-jumlah-siswa/{id}', [SekolahController::class, 'countSiswa']);
Route::get('sekolah-jumlah-guru/{id}', [SekolahController::class, 'countGuru']);
Route::get('sekolah-search/{value}', [SekolahController::class, 'search']);

//kurikulum
Route::get('kurikulum', [KurikulumController::class, 'index']);
Route::get('kurikulum-jurusan/{id}', [KurikulumController::class, 'jurusan']);

//jurusan
Route::get('jurusan', [JurusanController::class, 'index']);
Route::get('jurusan/{id}', [JurusanController::class, 'show']);
Route::get('jurusan-siswa/{id}', [JurusanController::class, 'siswa']);

//prestasi
Route::get('prestasi', [PrestasiController::class, 'index']);
Route::get('prestasi/{id}', [PrestasiController::class, 'show']);

//Fasilitas
Route::get('fasilitas', [FasilitasController::class, 'index']);
Route::get('fasilitas/{id}', [FasilitasController::class, 'show']);

//Galeri
Route::get('galeri', [GaleriController::class, 'index']);
Route::get('galeri/{id}', [GaleriController::class, 'show']);

//kurikulum
Route::get('kurikulum', [KurikulumController::class, 'index']);
Route::get('kurikulum/{id}', [KurikulumController::class, 'show']);

//Auth public user
Route::post('login', [AuthController::class, 'loginPublic']);
Route::post('register', [AuthController::class, 'register']);
    
Route::group(['middleware' => ['auth:sanctum', 'ability:public-user']], function() {

    //User
    Route::get('user/userProfile', [UserController::class, 'userProfile']);
    Route::post('user/updateProfile', [UserController::class, 'update']);
    Route::post('user/addProfilePicture', [UserController::class, 'fotoProfilUser']);
    Route::post('user/editProfilePicture', [UserController::class, 'editFotoProfilUser']);
    Route::post('user/changePassword', [UserController::class, 'changePassword']);

    //Auth logout
    Route::post('logout/{tokenId}', [AuthController::class, 'logout']);
});

// Route::get('image/{filename}', [SekolahController::class, 'displayImage']);

//Auth admin user
Route::post('login-admin', [AuthController::class, 'loginAdmin']);
Route::group(['middleware' => ['auth:sanctum', 'ability:admin-user']], function() {

    //provinsi
    Route::get('provinsi', [ProvinsiController::class, 'index']);
    Route::get('provinsi/{id}', [ProvinsiController::class, 'show']);
    Route::post('provinsi/store', [ProvinsiController::class, 'store']);
    Route::put('provinsi/update/{id}', [ProvinsiController::class, 'update']);
    Route::delete('provinsi/delete/{id}', [ProvinsiController::class, 'destroy']);
    Route::get('provinsi-kabupaten/{id}', [ProvinsiController::class, 'kabupaten']);

    //kabupaten/kota
    Route::get('kabupaten', [KabupatenController::class, 'index']);
    Route::get('kabupaten/{id}', [KabupatenController::class, 'show']);
    Route::post('kabupaten/store', [KabupatenController::class, 'store']);
    Route::put('kabupaten/update/{id}', [KabupatenController::class, 'update']);
    Route::delete('kabupaten/delete/{id}', [KabupatenController::class, 'destroy']);
    Route::get('kabupaten-kecamatan/{id}', [KabupatenController::class, 'kecamatan']);

    //kecamatan
    Route::get('kecamatan', [KecamatanController::class, 'index']);
    Route::get('kecamatan/{id}', [KecamatanController::class, 'show']);
    Route::post('kecamatan/store', [KecamatanController::class, 'store']);
    Route::put('kecamatan/update/{id}', [KecamatanController::class, 'update']);
    Route::delete('kecamatan/delete/{id}', [KecamatanController::class, 'destroy']);
    Route::get('kecamatan-desa/{id}', [KecamatanController::class, 'desa']);

    //desa/kelurahan
    Route::get('desa', [DesaController::class, 'index']);
    Route::get('desa/{id}', [DesaController::class, 'show']);
    Route::post('desa/store', [DesaController::class, 'store']);
    Route::put('desa/update/{id}', [DesaController::class, 'update']);
    Route::delete('desa/delete/{id}', [DesaController::class, 'destroy']);
    Route::get('desa-sekolah/{id}', [DesaController::class, 'sekolah']);

    //Siswa
    Route::get('siswa', [SiswaController::class, 'index']);
    Route::get('siswa/{id}', [SiswaController::class, 'show']);
    Route::post('siswa/store', [SiswaController::class, 'store']);
    Route::put('siswa/update/{id}', [SiswaController::class, 'update']);
    Route::delete('siswa/delete/{id}', [SiswaController::class, 'destroy']);

    //sekolah
    Route::get('admin/sekolah', [SekolahController::class, 'index']);
    Route::get('admin/sekolah/{id}', [SekolahController::class, 'show']);
    Route::post('admin/sekolah/store', [SekolahController::class, 'store']);
    Route::post('admin/sekolah/addPhotoProfile/{id}', [SekolahController::class, 'fotoProfilSekolah']);
    Route::put('admin/sekolah/update/{id}', [SekolahController::class, 'update']);
    Route::delete('admin/sekolah/delete/{id}', [SekolahController::class, 'destroy']);
    Route::get('admin/sekolah-guru/{id}', [SekolahController::class, 'guru']);
    Route::get('admin/sekolah-fasilitas/{id}', [SekolahController::class, 'fasilitas']);
    Route::get('admin/sekolah-galeri/{id}', [SekolahController::class, 'galeri']);
    Route::get('admin/sekolah-jurusan/{id}', [SekolahController::class, 'jurusan']);
    Route::get('admin/sekolah-prestasi/{id}', [SekolahController::class, 'prestasi']);
    Route::get('admin/sekolah-ekstrakulikuler/{id}', [SekolahController::class, 'ekstrakulikuler']);
    Route::get('admin/sekolah-jumlah-siswa/{id}', [SekolahController::class, 'countSiswa']);
    Route::get('admin/sekolah-jumlah-guru/{id}', [SekolahController::class, 'countGuru']);
    Route::get('admin/sekolah-search/{value}', [SekolahController::class, 'search']);

    //kurikulum
    Route::get('admin/kurikulum', [KurikulumController::class, 'index']);
    Route::get('admin/kurikulum/{id}', [KurikulumController::class, 'show']);
    Route::post('admin/kurikulum/store', [KurikulumController::class, 'store']);
    Route::put('admin/kurikulum/update/{id}', [KurikulumController::class, 'update']);
    Route::delete('admin/kurikulum/delete/{id}', [KurikulumController::class, 'destroy']);
    Route::get('admin/kurikulum-jurusan/{id}', [KurikulumController::class, 'jurusan']);

    //Fasilitas
    Route::get('admin/fasilitas', [FasilitasController::class, 'index']);
    Route::get('admin/fasilitas/{id}', [FasilitasController::class, 'show']);
    Route::post('admin/fasilitas/store', [FasilitasController::class, 'store']);
    Route::put('admin/fasilitas/update/{id}', [FasilitasController::class, 'update']);
    Route::delete('admin/fasilitas/delete/{id}', [FasilitasController::class, 'destroy']);

    //Ekstrakulikuler
    Route::get('ekstrakulikuler', [EkstrakulikulerController::class, 'index']);
    Route::get('ekstrakulikuler/{id}', [EkstrakulikulerController::class, 'show']);
    Route::post('ekstrakulikuler/store', [EkstrakulikulerController::class, 'store']);
    Route::put('ekstrakulikuler/update/{id}', [EkstrakulikulerController::class, 'update']);
    Route::delete('ekstrakulikuler/delete/{id}', [EkstrakulikulerController::class, 'destroy']);

    //Prestasi
    Route::get('admin/prestasi', [PrestasiController::class, 'index']);
    Route::get('admin/prestasi/{id}', [PrestasiController::class, 'show']);
    Route::post('admin/prestasi/store', [PrestasiController::class, 'store']);
    Route::put('admin/prestasi/update/{id}', [PrestasiController::class, 'update']);
    Route::delete('admin/prestasi/delete/{id}', [PrestasiController::class, 'destroy']);

    //jurusan
    Route::get('admin/jurusan', [JurusanController::class, 'index']);
    Route::get('admin/jurusan/{id}', [JurusanController::class, 'show']);
    Route::post('admin/jurusan/store', [JurusanController::class, 'store']);
    Route::put('admin/jurusan/update/{id}', [JurusanController::class, 'update']);
    Route::delete('admin/jurusan/delete/{id}', [JurusanController::class, 'destroy']);
    Route::get('admin/jurusan-siswa/{id}', [JurusanController::class, 'siswa']);

    //Guru
    Route::get('guru', [GuruController::class, 'index']);
    Route::get('guru/{id}', [GuruController::class, 'show']);
    Route::post('guru/store', [GuruController::class, 'store']);
    Route::put('guru/update/{id}', [GuruController::class, 'update']);
    Route::delete('guru/delete/{id}', [GuruController::class, 'destroy']);

    //Galeri
    Route::get('admin/galeri', [GaleriController::class, 'index']);
    Route::get('admin/galeri/{id}', [GaleriController::class, 'show']);
    Route::post('admin/galeri/store', [GaleriController::class, 'store']);
    Route::post('admin/galeri/addFotoGaleri/{id}', [GaleriController::class, 'fotoGaleri']);
    Route::put('admin/galeri/update/{id}', [GaleriController::class, 'update']);
    Route::delete('admin/galeri/delete/{id}', [GaleriController::class, 'destroy']);

    //user
    Route::get('admin/user', [UserController::class, 'index']);
    Route::post('admin/user/updateProfile', [UserController::class, 'update']);
    Route::post('admin/user/addProfilePicture', [UserController::class, 'fotoProfilUser']);
    Route::post('admin/user/editProfilePicture', [UserController::class, 'editFotoProfilUser']);
    Route::post('admin/user/changePassword', [UserController::class, 'changePassword']);
    Route::get('admin/user/userProfile', [UserController::class, 'userProfile']);

    //Auth logout
    Route::post('admin/logout/{tokenId}', [AuthController::class, 'logout']);
});