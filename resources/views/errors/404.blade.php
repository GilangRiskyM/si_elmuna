<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 - Not Found</title>
    <link rel="icon" href="/asset/img/icon1.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="bg-dark d-flex align-items-center justify-content-center min-vh-100">
    <div class="p-5 m-5 text-center">
        <div class="card p-5 rounded-5">
            <h1 class="display-1 fw-bold">404</h1>
            <h4 class="display-6">Page Not Found</h4>
            <hr>
            <p class="lead fw-normal">
                Halaman yang Anda akses tidak ditemukan.
            </p>
            <div>
                <a href="{{ url('/') }}" class="btn btn-secondary rounded-5 px-5">Kembali ke halaman utama</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
