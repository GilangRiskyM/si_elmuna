<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Elmuna| Login</title>
    <link rel="icon" href="{{ asset('asset/img/icon1.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body class="bg-info">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <center>
                                        <img src="/asset/img/elmuna.png" alt="Gambar gagal dimuat..." width="100%"
                                            height="auto">
                                    </center>
                                    <h5 class="text-center font-weight-light my-1">Sistem Pendaftaran Kursus Elmuna</h5>
                                </div>
                                <div class="card-body">
                                    <center>
                                        <form action="" method="POST">
                                            @csrf
                                            @if (Session::has('status'))
                                                <div class="alert alert-danger alert-dismissible fade show"
                                                    role="alert">
                                                    {{ Session::get('message') }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            @endif
                                            <div class="input-group mb-3">
                                                <div class="form-floating">
                                                    <input type="email" class="form-control" id="email"
                                                        placeholder="" name="email" required>
                                                    <label for="email">Email</label>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="form-floating">
                                                    <input type="password" class="form-control" id="pw"
                                                        placeholder="" name="password" required>
                                                    <label for="pw">Password</label>
                                                </div>
                                            </div>
                                            <div class="mb-3">

                                                <button type="reset" class="btn btn-danger mx-2">Batal</button>
                                                <button type="submit" class="btn btn-success mx-2">Login</button>

                                            </div>
                                        </form>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </script>
</body>

</html>
