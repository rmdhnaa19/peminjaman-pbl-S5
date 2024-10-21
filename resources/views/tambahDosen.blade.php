<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tambah Dosen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Load Google Font: Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .navbar {
            padding-left: 50px;
            padding-right: 50px;
        }

        .sub-navbar .nav-link {
            font-size: 17px;
            font-weight: 600;
        }

        .active-tab {
            background-color: #3D9EDE;
            height: 5px;
            width: 160px;
            border-radius: 12px;
        }

        .inactive-tab {
            background-color: gray;
            height: 5px;
            width: 160px;
            border-radius: 12px;
        }
    </style>
</head>

<body>

    <!-- Navbar Utama -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Logo Poliwangi -->
            <a class="navbar-brand" href="inforuangan-admin">
                <img src="{{ asset('img/logo-poliwangi.png') }}" alt="Logo Poliwangi" style="height: 50px;">
            </a>

            <!-- Navbar Toggler for smaller screens -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-dark me-4" href="inforuangan-admin">Info Ruangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark me-4" href="persetujuan">Persetujuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark me-4" href="/mengelola-ruangan">Mengelola</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark me-4" href="riwayat-list-admin">Riwayat</a>
                    </li>
                </ul>

                <!-- Notifikasi Icon and Logout Button -->
                <div class="d-flex align-items-center">
                    <a href="#notifikasi" class="me-3">
                        <img src="{{ asset('img/notif.svg') }}" alt="Logo Notifikasi" style="height: 25px;">
                    </a>
                    <form action="logout" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    {{-- @include('includes.nav-mengelola-selected')

    @if ($errors->any())
    <div id="errorMessage" class="alert alert-danger bg-danger" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 24px; padding: 20px; color: white; border-radius: 10px; z-index: 10;">
        @foreach ($errors->all() as $error)
        {{ $error }}<br>
        @endforeach
    </div>
    @endif --}}

</body>
</html>



    <div class="container">
        <div class="TambahDosen" style="color: black; font-size: 25px; font-family: Roboto; font-weight: 700; word-wrap: break-word; padding-top: 50px">
            Tambah Dosen</div>
    </div>

    <div class="container">
        <form method="POST" action="/tambah-dosen">
            @csrf
            <label for="nipk" style="color: black; font-size: 20px; font-family: Roboto; font-weight: 400; padding-top: 10px;">NIP/NIK</label>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" id="nipk" name="nipk" placeholder="Masukkan NIP/NIK" autocomplete="off">
                </div>
            </div>
            <label for="nama_dosen" style="color: black; font-size: 20px; font-family: Roboto; font-weight: 400; padding-top: 10px;">Nama Dosen</label>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" placeholder="Masukkan Nama Dosen" autocomplete="off">
                </div>
            </div>
            <a href="/mengelola-dosen" style="text-decoration: none;">
                <button type="button" class="btn btn-danger" style="margin-top: 15px; font-weight: bold;">Kembali</button>
            </a>
            <button type="submit" class="btn btn-primary" style="margin-left: 10px; margin-top: 15px; font-weight: bold;">Tambah</button>
        </form>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', function() {
            const errorMessage = document.getElementById('errorMessage');
            if (errorMessage) {
                errorMessage.style.display = 'block';
                setTimeout(function() {
                    errorMessage.style.display = 'none';
                }, 3000); // Menghilangkan pesan error setelah 3 detik
            }
        });
    </script>


</body>

</html>