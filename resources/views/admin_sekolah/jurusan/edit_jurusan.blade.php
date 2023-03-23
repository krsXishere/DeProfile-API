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
                         @foreach($jurusan as $row)
                        <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('admin_sekolah_jurusan.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Jurusan</label>
                                <input type="text" class="mb-3 mt-3 form-control @error('jurusan') is-invalid @enderror" name="jurusan" value="{{$row->jurusan}}" placeholder="Masukkan Nama Jurusan">
                            
                                <!-- error message untuk title -->
                                @error('jurusan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Keterangan</label>
                                <input type="text" class="mb-3 mt-3 form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{$row->keterangan}}" placeholder="Masukkan Keterangan Jurusan">
                            
                                <!-- error message untuk title -->
                                @error('keterangan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tahun</label>
                                <input type="text" class="mb-3 mt-3 form-control @error('tahun') is-invalid @enderror" name="tahun" value="{{$row->tahun}}" placeholder="Masukkan Tahun">
                            
                                <!-- error message untuk title -->
                                @error('tahun')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Akreditasi</label>
                                <input type="text" class="mb-3 mt-3 form-control @error('akreditasi') is-invalid @enderror" name="akreditasi" value="{{$row->akreditasi}}" placeholder="Masukkan Akreditasi">
                            
                                <!-- error message untuk title -->
                                @error('akreditasi')
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