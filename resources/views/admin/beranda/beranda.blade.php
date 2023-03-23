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
                        <div style="position: absolute; right:15px;" class="">
                            <form action="{{route('report')}}">
                                <button class="btn btn-sm btn-primary">Print Laporan</button>
                            </form>
                        </div>
                        <br>
                        <div class="row mt-5">
                            <div class="col-sm-6">
                                <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Sekolah yang Terdaftar di De'Profile</h5>
                                    <p class="card-text">{{$sekolah}} Sekolah+</p>
                                </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Siswa yang Terdaftar di De'Profile</h5>
                                    <p class="card-text">{{$siswa}} Siswa+</p>
                                </div>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Guru yang Terdaftar di De'Profile</h5>
                                    <p class="card-text">{{$guru}} Guru+</p>
                                </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Akun yang Terdaftar di De'Profile</h5>
                                    <p class="card-text">{{$akun}} Akun+</p>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection