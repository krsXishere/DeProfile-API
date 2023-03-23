@extends('template_admin')
@section('content')
<link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<section class="home-section">
    <title>{{$title}}</title>
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">De'Profile Admin</span>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('admin_sekolah_guru.store', ['id_sekolah' => $id_sekolah]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div><h5>{{$nama_sekolah}}</h5></div>

                            <div class="form-group">
                                <label class="font-weight-bold">NIP</label>
                                <input type="number" class="mb-3 mt-3 form-control @error('nip') is-invalid @enderror" name="nip" value="" placeholder="Masukkan NIP">
                            
                                <!-- error message untuk title -->
                                @error('nip')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama guru</label>
                                <input type="text" class="mb-3 mt-3 form-control @error('nama') is-invalid @enderror" name="nama" value="" placeholder="Masukkan Nama guru">
                            
                                <!-- error message untuk title -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jenis Kelamin</label>
                                <div>
                                    <input type="radio" id="L" name="jenis_kelamin" value="Laki-laki">
                                    <label for="L" class="font-weight-bold">Laki-laki</label>
                                </div>
                                <div>
                                    <input type="radio" id="P" name="jenis_kelamin" value="Perempuan">
                                    <label for="P" class="font-weight-bold">Perempuan</label>
                                </div>
                            
                                <!-- error message untuk title -->
                                @error('jenis_kelamin')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <br>

                            <div class="form-group">
                                <label class="font-weight-bold">Tempat Lahir</label>
                                <input type="text" class="mb-3 mt-3 form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="" placeholder="Masukkan Tempat Lahir">
                            
                                <!-- error message untuk title -->
                                @error('tempat_lahir')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Lahir</label>
                                <input type="date" class="mb-3 mt-3 form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="" placeholder="Masukkan Tanggal Lahir">
                            
                                <!-- error message untuk title -->
                                @error('tanggal_lahir')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Pendidikan</label>
                                <input type="text" class="mb-3 mt-3 form-control @error('pendidikan') is-invalid @enderror" name="pendidikan" value="" placeholder="Masukkan Pendidikan Terakhir Guru">
                            
                                <!-- error message untuk title -->
                                @error('pendidikan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                             <div class="form-group">
                                <label class="font-weight-bold">Jurusan</label>
                                <input type="text" class="mb-3 mt-3 form-control @error('jurusan') is-invalid @enderror" name="jurusan" value="" placeholder="Masukkan Jurusan Guru">
                            
                                <!-- error message untuk title -->
                                @error('jurusan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Alamat</label>
                                <input type="text" class="mb-3 mt-3 form-control @error('alamat') is-invalid @enderror" name="alamat" value="" placeholder="Masukkan Alamat Guru">
                            
                                <!-- error message untuk title -->
                                @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            

                            <div class="form-group">
                                <label class="font-weight-bold">No. Telpon</label>
                                <input type="number" class="mb-3 mt-3 form-control @error('no_telpon') is-invalid @enderror" name="no_telpon" value="" placeholder="Masukkan No. Telpon Guru">
                            
                                <!-- error message untuk title -->
                                @error('no_telpon')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Email</label>
                                <input type="email" class="mb-3 mt-3 form-control @error('email') is-invalid @enderror" name="email" value="" placeholder="Masukkan Email Guru">
                            
                                <!-- error message untuk title -->
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-start">
                                <button type="submit" class="btn btn-md btn-success btn-sm">Simpan</button>
                            </div>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection