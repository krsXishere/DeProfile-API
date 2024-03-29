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
                         @foreach($prestasi as $row)
                        <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('admin_sekolah_prestasi.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Prestasi</label>
                                <input type="text" class="mb-3 mt-3 form-control @error('nama') is-invalid @enderror" name="nama" value="{{$row->nama}}" placeholder="Masukkan Nama Prestasi">
                            
                                <!-- error message untuk title -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jenis Prestasi</label>
                                <input type="text" class="mb-3 mt-3 form-control @error('jenis_prestasi') is-invalid @enderror" name="jenis_prestasi" value="{{$row->jenis_prestasi}}" placeholder="Masukkan Jenis Prestasi">
                            
                                <!-- error message untuk title -->
                                @error('jenis_prestasi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tingkat</label>
                                <input type="text" class="mb-3 mt-3 form-control @error('tingkat') is-invalid @enderror" name="tingkat" value="{{$row->tingkat}}" placeholder="Masukkan Tingkat Prestasi">
                            
                                <!-- error message untuk title -->
                                @error('tingkat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Keterangan</label>
                                <input type="text" class="mb-3 mt-3 form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{$row->keterangan}}" placeholder="Masukkan Keterangan Prestasi">
                            
                                <!-- error message untuk title -->
                                @error('keterangan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-start">
                                <button type="submit" class="btn btn-md btn-success btn-sm">Edit</button>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection