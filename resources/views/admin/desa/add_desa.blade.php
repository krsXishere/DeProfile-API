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
                        <form action="{{ route('desa.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">Kecamatan</label>
                                <div class="col">
                                    <select name="kecamatan_id" class="form-select form-select mb-3 mt-3">
                                        @foreach($kecamatan as $row)
                                            <option value="{{$row->id}}">
                                                {{$row->kecamatan}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Kelurahan/Desa</label>
                                <input type="text" class="mb-3 mt-3 form-control @error('desa') is-invalid @enderror" name="desa" value="" placeholder="Masukkan Nama Kelurahan/Desa">
                            
                                <!-- error message untuk title -->
                                @error('desa')
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