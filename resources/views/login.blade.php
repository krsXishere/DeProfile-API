<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/sidebar.css')}}">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>De'Profile Login Admin</title>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center mt-5 mb-5">De'Profile Login Admin</h3>
                <div class="w-50 card border-0 shadow rounded mx-auto">
                    <div class="card-body">
                        <form action="{{ route('process-login') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">Email</label>
                                <input type="email" class="mb-3 mt-3 form-control" name="email" value="" placeholder="Masukkan Email" required>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Password</label>
                                <input type="password" class="mb-3 mt-3 form-control" name="password" value="" placeholder="Masukkan Password" required>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-md btn-success btn-sm">Masuk</button>
                            </div>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>