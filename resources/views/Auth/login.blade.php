<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>

<body>
    <div class="row justify-content-around mx-auto p-5">
        <div class="col-12">
            <div class="row justify-content-around mx-auto p-5">
                <img src="{{ asset('img/logo-login.jpg') }}" alt="Deskripsi Gambar" style="width: 300px;">
            </div>
        </div>
        <div class="col-4">
            <div class="card-body">

                @if(session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
                @endif
                @if($errors->any())
                @foreach($errors->all() as $err)
                <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
                @endif
                <form action="{{ route('proses', $encodedUrl) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Username <span class="text-danger">*</span></label>
                        <input type="username" name="username" id="username" placeholder="Ketikkan Username Anda...." class="form-control" value="{{ old('username') }}" id="exampleInputUsername1">
                        <div id="usernameHelp" class="form-text">Silahkan Login dengan menggunakan username</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" id="password" placeholder="Ketikkan Password Anda...." class="form-control">
                    </div>

                    <div class="container">
                        <div class="row justify-content-between">

                            <div class="d-grid gap-1">
                                <button class="btn btn-outline-primary">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Datepicker -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <!-- Momentjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>