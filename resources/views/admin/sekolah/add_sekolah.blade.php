@extends('template')
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
                        <form action="{{ route('sekolah.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">Desa/Kelurahan</label>
                                <div class="col">
                                    <select name="desa_id" class="form-select form-select mb-3 mt-3">
                                        @foreach($desa as $row)
                                            <option value="{{$row->id}}">
                                                {{$row->desa}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Pilih Akun</label>
                                <div class="col">
                                    <select name="user_id" class="form-select form-select mb-3 mt-3">
                                        @foreach($user as $row)
                                            <option value="{{$row->id}}">
                                                {{$row->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">NSS Sekolah</label>
                                <input type="number" class="mb-3 mt-3 form-control @error('nss') is-invalid @enderror" name="nss" value="" placeholder="Masukkan NSS Sekolah">
                            
                                <!-- error message untuk title -->
                                @error('nss')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">NPSN Sekolah</label>
                                <input type="number" class="mb-3 mt-3 form-control @error('npsn') is-invalid @enderror" name="npsn" value="" placeholder="Masukkan NPSN Sekolah">
                            
                                <!-- error message untuk title -->
                                @error('npsn')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Sekolah</label>
                                <input type="text" class="mb-3 mt-3 form-control @error('nama') is-invalid @enderror" name="nama" value="" placeholder="Masukkan Nama Sekolah">
                            
                                <!-- error message untuk title -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Alamat Sekolah</label>
                                <input type="text" class="mb-3 mt-3 form-control @error('alamat') is-invalid @enderror" name="alamat" value="" placeholder="Masukkan Alamat Sekolah">
                            
                                <!-- error message untuk title -->
                                @error('alamat')
                                    <div class="alert alert-danger mt-2">   
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">RW</label>
                                <input type="text" class="mb-3 mt-3 form-control @error('rw') is-invalid @enderror" name="rw" value="" placeholder="Masukkan RW (isi 0 bila tidak perlu)">
                            
                                <!-- error message untuk title -->
                                @error('rw')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">RT</label>
                                <input type="text" class="mb-3 mt-3 form-control @error('rt') is-invalid @enderror" name="rt" value="" placeholder="Masukkan RT (isi 0 bila tidak perlu)">
                            
                                <!-- error message untuk title -->
                                @error('rt')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">No. Telpon</label>
                                <input type="text" class="mb-3 mt-3 form-control @error('no_telpon') is-invalid @enderror" name="no_telpon" value="" placeholder="Masukkan No. Telpon">
                            
                                <!-- error message untuk title -->
                                @error('no_telpon')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">No. Fax</label>
                                <input type="text" class="mb-3 mt-3 form-control @error('no_fax') is-invalid @enderror" name="no_fax" value="" placeholder="Masukkan No. Fax">
                            
                                <!-- error message untuk title -->
                                @error('no_fax')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Lintang/Bujur</label>
                                <input type="text" class="mb-3 mt-3 form-control @error('lat_long') is-invalid @enderror" name="lat_long" value="" placeholder="Masukkan Lintang/Bujur (Contoh: 123456 / 123456)">
                            
                                <!-- error message untuk title -->
                                @error('lat_long')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Logo Sekolah</label>
                                <input type="file" class="mb-3 mt-3 form-control @error('image') is-invalid @enderror" name="image" value="" required>
                            
                                <!-- error message untuk title -->
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Email Sekolah</label>
                                <input type="email" class="mb-3 mt-3 form-control @error('email') is-invalid @enderror" name="email" value="" placeholder="Masukkan Email Sekolah">
                            
                                <!-- error message untuk title -->
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Kepala Sekolah</label>
                                <input type="text" class="mb-3 mt-3 form-control @error('kepala_sekolah') is-invalid @enderror" name="kepala_sekolah" value="" placeholder="Masukkan Nama Kepala Sekolah">
                            
                                <!-- error message untuk title -->
                                @error('kepala_sekolah')
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