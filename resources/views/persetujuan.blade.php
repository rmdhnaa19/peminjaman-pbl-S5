<!DOCTYPE html>
<html lang="en">

<head>
    <title>Persetujuan Peminjaman</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Load Google Font: Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Pastikan jQuery di-load -->
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

    <div class="container" style="margin-top: 20px;">
        <p class="h4">Persetujuan Peminjaman Ruangan & Barang</p>
    </div>

    <section>
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent" style="height:130px;">
            <div class="container-fluid">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="persetujuan" style="margin-left: 20px; font-family: roboto; font-size: 17px; font-weight: 600;">Persetujuan Peminjaman</a>
                        <div class="Rectangle6" style="width: 250px; height: 5px; background: #3D9EDE; border-radius: 12px;">
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-gray" href="diterima" style="margin-left: 30px; font-family:roboto; font-size: 17px; font-weight: 600;">Peminjaman Diterima</a>
                        <div class="Rectangle6" style="width: 250px; height: 5px; background: gray; border-radius: 12px;">
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-gray" href="ditolak" style="margin-left: 30px; font-family:roboto; font-size: 17px; font-weight: 600;">Peminjaman Ditolak</a>
                        <div class="Rectangle6" style="width: 250px; height: 5px; background: gray; border-radius: 12px;">
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </section>

    <div class="container mt-3" style="margin-top: 80px">
        <div class="table-responsive">
            <table class="table table-bordered" style="text-align:center; font-size:14px;">
                <thead class="col bg-primary text-white" style="text-align:center; font-family:roboto;">
                    <tr>
                        <td>Tanggal</td>
                        <td>Jam Peminjaman</td>
                        <td>Jam Pengembalian</td>
                        <td>Dosen</td>
                        <td>Mata Kuliah</td>
                        <td>Ruangan</td>
                        <td>Barang 1</td>
                        <td>Barang 2</td>
                        <td>Barang 3</td>
                        <td>Nama Peminjam</td>
                        <td>NIM Peminjam</td>
                        <td>Nomor Telepon</td>
                        <td>Kelas</td>
                        <td>Program Studi</td>
                        <td>Persetujuan</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $peminjaman)
                    <tr id="peminjaman_{{ $peminjaman->id }}">
                        <td>{{ $peminjaman->tanggal }}</td>
                        <td>{{ $peminjaman->jam_peminjaman }}</td>
                        <td>{{ $peminjaman->jam_pengembalian }}</td>
                        <td>{{ $peminjaman->nama_dosen }}</td>
                        <td>{{ $peminjaman->nama_matakuliah }}</td>
                        <td>{{ $peminjaman->ruangan }}</td>
                        <td>{{ $peminjaman->barang1 }}</td>
                        <td>{{ $peminjaman->barang2 }}</td>
                        <td>{{ $peminjaman->barang3 }}</td>
                        <td>{{ $peminjaman->nama_peminjam }}</td>
                        <td>{{ $peminjaman->nim_peminjam }}</td>
                        <td>{{ $peminjaman->no_telp }}</td>
                        <td>{{ $peminjaman->kelas }}</td>
                        <td>{{ $peminjaman->prodi }}</td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <button onclick="setujuPeminjaman({{ $peminjaman->id }}, 'terima')" class="btn btn-success">Diterima</button>
                                <button onclick="setujuPeminjaman({{ $peminjaman->id }}, 'tolak')" class="btn btn-danger">Ditolak</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function setujuPeminjaman(id, status) {
            $.ajax({
                url: '/persetujuan/' + status + '/' + id,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#peminjaman_' + id).remove();
                    alert(response.message);
                }
            });
        }
    </script>
</body>

</html>
