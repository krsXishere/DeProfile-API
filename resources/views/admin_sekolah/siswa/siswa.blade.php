@extends('template_admin')
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
                        <form action="{{route('admin_sekolah_siswa.search', $id_sekolah)}}" method="GET">
                          @csrf
                          @method('GET')
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <input type="text" class="mb-3 mt-3 form-control @error('search') is-invalid @enderror" name="search" value="" placeholder="Cari Siswa">
                              
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
                        <div>
                          <div><h5>{{$sekolah}}</h5></div>
                          <div>
                            <a href="{{route('admin_sekolah_siswa.create', $id_sekolah)}}" class="btn btn-md btn-success mb-3 btn-sm">Tambah Siswa</a>
                            <a href="{{route('admin_sekolah_siswa.create.bulk', $id_sekolah)}}" class="btn btn-md btn-success mb-3 btn-sm">Import dari Excel</a>
                          </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-stripped table-hover">
                            <thead>
                              <tr style="color:#66806A;">
                                <th class="text-center" scope="col">No.</th>
                                <th class="text-center" scope="col">NISN</th>
                                <th class="text-center" scope="col">Nama siswa</th>
                                <th class="text-center" scope="col">Jenis Kelamin</th>
                                <th class="text-center" scope="col">Tempat Lahir</th>
                                <th class="text-center" scope="col">Tanggal Lahir</th>
                                <th class="text-center" scope="col">Pendidikan</th>
                                <th class="text-center" scope="col">Alamat</th>
                                <th class="text-center" scope="col">No. Telpon</th>
                                <th class="text-center" scope="col">Email</th>
                                <th class="text-center" scope="col">Jurusan</th>
                                <th class="text-center" scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              @php($no = 1)
                              @forelse ($siswa as $row)
                                <tr>
                                    <td class="text-center">{{$no++}}</td>
                                    <td class="text-center">{{ $row->nisn }}</td>
                                    <td class="text-center">{{ $row->nama }}</td>
                                    <td class="text-center">{{ $row->jenis_kelamin }}</td>
                                    <td class="text-center">{{ $row->tempat_lahir }}</td>
                                    <td class="text-center">{{ $row->tanggal_lahir }}</td>
                                    <td class="text-center">{{ $row->pendidikan }}</td>
                                    <td class="text-center">{{ $row->alamat }}</td>
                                    <td class="text-center">{{ $row->no_telpon }}</td>
                                    <td class="text-center">{{ $row->email }}</td>
                                    <td class="text-center">{{ $row->jurusan }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('admin_sekolah_siswa.destroy', ['id' => $row->id, 'id_sekolah' => $id_sekolah]) }}" method="POST">
                                            <a href="{{ route('admin_sekolah_siswa.edit', ['id' => $row->id, 'id_sekolah' => $id_sekolah]) }}" class="btn btn-sm btn-primary">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data siswa belum Tersedia.
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