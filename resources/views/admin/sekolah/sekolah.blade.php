@extends('template')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
 <section class="home-section">
    <title>{{$title}}</title>
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">De'Profile Admin</span>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                      <form action="{{route('sekolah.search')}}" method="GET">
                          @csrf
                          @method('GET')
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <input type="text" class="mb-3 mt-3 form-control @error('search') is-invalid @enderror" name="search" value="" placeholder="Cari Sekolah">
                              
                                  <!-- error message untuk title -->
                                  @error('search')
                                      <div class="alert alert-danger mt-2">
                                          {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div>

                              <div class="col mt-3">
                                <button type="submit" class="btn btn-primary">Cari</button>
                              </div>
                            </div>
                        </form>
                          <form action="{{route('report.sekolah')}}">
                            <a href="{{route('sekolah.create')}}" class="btn btn-md btn-success mb-3 btn-sm">Tambah Sekolah</a>
                            <button class="btn btn-sm btn-primary mb-3">Print Laporan</button>
                          </form>
                        <div class="table-responsive">
                            <table class="table table-stripped table-hover">
                            <thead>
                              <tr style="color:#66806A;">
                                <th class="text-center" scope="col">No.</th>
                                <th class="text-center" scope="col">NSS</th>
                                <th class="text-center" scope="col">NPSN</th>
                                <th class="text-center" scope="col">Nama Sekolah</th>
                                <th class="text-center" scope="col">Alamat</th>
                                <th class="text-center" scope="col">RW</th>
                                <th class="text-center" scope="col">RT</th>
                                <th class="text-center" scope="col">No. Telpon</th>
                                <th class="text-center" scope="col">No. Fax</th>
                                <th class="text-center" scope="col">Bujur/Lintang</th>
                                <th class="text-center" scope="col">Logo Sekolah</th>
                                <th class="text-center" scope="col">Email</th>
                                <th class="text-center" scope="col">Kepala Sekolah</th>
                                <th class="text-center" scope="col">Desa/Kelurahan</th>
                                <th class="text-center" scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              @php($no = 1)
                              @forelse ($sekolah as $row)
                                <tr>
                                    <td class="text-center">{{$no++}}</td>
                                    <td class="text-center">{{ $row->nss }}</td>
                                    <td class="text-center">{{ $row->npsn }}</td>
                                    <td class="text-center">{{ $row->nama }}</td>
                                    <td class="text-center">{{ $row->alamat }}</td>
                                    <td class="text-center">{{ $row->rw }}</td>
                                    <td class="text-center">{{ $row->rt }}</td>
                                    <td class="text-center">{{ $row->no_telpon }}</td>
                                    <td class="text-center">{{ $row->no_fax }}</td>
                                    <td class="text-center">{{ $row->lat_long }}</td>
                                    <td class="text-center">
                                        <a href="{{ asset('storage/'. $row->image) }}" class="without-caption image-link">
                                            <div class="avatar">
                                                <img src="{{ $row->image ? asset('storage/'. $row->image) : 'no' }}" class="image-circle" width="40" style="border-radius: 50%">
                                            </div>
                                        </a>
                                    </td>
                                    <td class="text-center">{{ $row->email }}</td>
                                    <td class="text-center">{{ $row->kepala_sekolah }}</td>
                                    <td class="text-center">{{ $row->desa }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('sekolah.destroy', $row->id) }}" method="POST">
                                            <a href="{{ route('sekolah.edit', $row->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data sekolah belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection