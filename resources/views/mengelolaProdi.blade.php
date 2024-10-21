<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mengelola Prodi</title>
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

    <section>
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <div class="container-fluid" style="height:100px">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link text-gray" href="/mengelola-ruangan" style="margin-left: 42px; font-family: roboto; font-size: 17px; font-weight: 600;">Ruangan</a>
                        <div class="RecRuangan" style="width: 160px; height: 5px; background: gray; border-radius: 12px;"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-gray" href="/mengelola-barang" style="margin-left: 45px; font-family: roboto; font-size: 17px; font-weight: 600;">Barang</a>
                        <div class="RecBarang" style="width: 160px; height: 5px; background: gray; border-radius: 12px;"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/mengelola-prodi" style="margin-left: 52px; font-family:roboto; font-size: 17px; font-weight: 600;">Prodi</a>
                        <div class="RecProdi" style="width: 160px; height: 5px; background: #3D9EDE; border-radius: 12px;"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-gray" href="/mengelola-kelas" style="margin-left: 52px; font-family:roboto; font-size: 17px; font-weight: 600;">Kelas</a>
                        <div class="RecKelas" style="width: 160px; height: 5px; background: gray; border-radius: 12px;"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-gray" href="/mengelola-waktu" style="margin-left: 47px; font-family:roboto; font-size: 17px; font-weight: 600;">Waktu</a>
                        <div class="RecWaktu" style="width: 160px; height: 5px; background: gray; border-radius: 12px;"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-gray" href="/mengelola-dosen" style="margin-left: 49px; font-family:roboto; font-size: 17px; font-weight: 600;">Dosen</a>
                        <div class="RecDosen" style="width: 160px; height: 5px; background: gray; border-radius: 12px;"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-gray" href="/mengelola-matkul" style="margin-left: 25px; font-family:roboto; font-size: 17px; font-weight: 600;">Mata Kuliah</a>
                        <div class="RecMatkul" style="width: 160px; height: 5px; background: gray; border-radius: 12px;"></div>
                    </li>
                </ul>
            </div>
    </section>

    <div class="container">
        <!-- Menambahkan div untuk pesan sukses -->
        @if (session('success'))
        <div id="successMessage" class="alert alert-success" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);
        font-size: 24px; padding: 20px; background-color: #4CAF50; color: white; border-radius: 10px;">
            {{ session('success') }}
        </div>
        @endif
    </div>

    <table class="table table-bordered mx-auto" style="width: 84.5%; margin-top: 10px; border-color: gray; border-radius: 10px; overflow: hidden;">
        <thead>
            <tr style="background-color: #3D9EDE; color: white;">
                <td scope="col" style="width: 50%; text-align: center;">Prodi</td>
                <td scope="col" style="width: 50%; text-align: center;">Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach($prodiItems as $prodiItem)
            <tr style="height: 80px" class="prodi-row">
                <th scope="row" style="text-align: center; vertical-align: middle; font-weight: normal">{{ $prodiItem->prodi }}</th>
                <td style="text-align: center; vertical-align: middle; align-items: center;">
                    <a href="{{ route('ubah-prodi', ['idprodi' => $prodiItem->idprodi]) }}" class="btn btn-warning" style="margin-right: 35px;">Ubah</a>
                    <button type="button" class="btn btn-danger delete-btn" data-id="{{ $prodiItem->idprodi }}">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <div class="container" style="display: flex;">
        <div style="margin-right: 42%; display: flex;">
            <button type="button" class="btn btn-danger" id="prevButton" style="font-size: 12px; font-weight: bold;">Prev</button>
        </div>
        <div>
            <a href="/tambah-prodi">
                <button type="button" class="btn btn-primary" style="font-size: 12px; font-weight: bold;">Tambah Prodi</button>
            </a>
        </div>
        <div style="margin-left: 42%; display: flex;">
            <button type="button" class="btn btn-success" id="nextButton" style="font-size: 12px; font-weight: bold;">Next</button>
        </div>
    </div> --}}
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <!-- Tombol Previous -->
            <div class="col-auto">
                <button type="button" class="btn btn-danger" id="prevButton" style="font-size: 12px;">Prev</button>
            </div>
    
            <!-- Tombol Tambah Ruangan -->
            <div class="col-auto">
                <a href="/tambah-prodi">
                    <button type="button" class="btn btn-primary" style="font-size: 12px;">Tambah Prodi</button>
                </a>
            </div>
    
            <!-- Tombol Next -->
            <div class="col-auto">
                <button type="button" class="btn btn-success" id="nextButton" style="font-size: 12px;">Next</button>
            </div>
        </div>
    </div>
    <script>
        // Variabel untuk melacak indeks data saat ini
        let currentIndex = 0;
        const rowsPerPage = 3; // Jumlah data per halaman

        // Fungsi untuk menampilkan data sesuai indeks saat ini
        function showData() {
            const rows = document.querySelectorAll('.prodi-row');
            rows.forEach((row, index) => {
                if (index >= currentIndex && index < currentIndex + rowsPerPage) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });

            const nextButton = document.getElementById('nextButton');
            if (currentIndex + rowsPerPage >= rows.length) {
                nextButton.style.visibility = 'hidden'; // Semua data sudah ditampilkan
            } else {
                nextButton.style.visibility = 'visible';
            }

            const prevButton = document.getElementById('prevButton');
            if (currentIndex === 0) {
                prevButton.style.visibility = 'hidden'; // Sembunyikan tombol "Back" jika di slide pertama
            } else {
                prevButton.style.visibility = 'visible';
            }
        }

        // Menampilkan data awal
        showData();

        // Event listener untuk tombol "Next"
        document.getElementById('nextButton').addEventListener('click', () => {
            currentIndex += rowsPerPage;
            showData();
        });

        // Event listener untuk tombol "Back"
        document.getElementById('prevButton').addEventListener('click', () => {
            currentIndex -= rowsPerPage;
            if (currentIndex < 0) {
                currentIndex = 0;
            }
            showData();
        });

        window.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.getElementById('successMessage');
            if (successMessage) {
                successMessage.style.display = 'block';
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 3000); // Menghilangkan pesan sukses setelah 3 detik
            }
        });

        const deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                const idprodi = button.getAttribute('data-id');

                // Konfirmasi penghapusan
                if (confirm('Apakah Anda yakin ingin menghapus prodi ini?')) {
                    // Kirim permintaan penghapusan ke server dengan ID prodi yang sesuai
                    fetch(`/hapus-prodi/${idprodi}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            // Tambahkan logika di sini untuk menangani respons penghapusan jika diperlukan
                            if (data.success) {
                                // Refresh halaman atau perbarui tampilan jika berhasil
                                location.reload();
                            } else {
                                // Tambahkan pesan kesalahan jika diperlukan
                                alert('Gagal menghapus prodi.');
                            }
                        })
                        .catch(error => {
                            console.error('Terjadi kesalahan:', error);
                        });
                }
            });
        });
    </script>
</body>

</html>