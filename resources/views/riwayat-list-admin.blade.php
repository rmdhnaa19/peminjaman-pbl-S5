<!DOCTYPE html>
<html lang="en">

<head>
    <title>Riwayat Peminjaman List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <style>
        @media print {
            /* Ganti warna font menjadi hitam saat mencetak */
            body * {
                color: black !important;
            }

            /* Atur font pada judul field tabel menjadi bold saat mencetak */
            table.table tr th:first-child {
                font-weight: bold !important;
            }
        }
    </style>
</head>

<head>
  <title>Info Ruangan</title>
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

    .navbar-nav .nav-link {
      font-family: 'Roboto', sans-serif;
      font-size: 1rem; /* Sesuaikan ukuran font */
    }

    .navbar {
      padding-left: 50px;
      padding-right: 50px;
    }
  </style>
</head>

<body>
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
</body>

</html>

<div class="container" style="margin-top: 20px;">
    <p class="h4">Riwayat Peminjaman - Tabel</p>
</div>

<section>
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent" style="height:100px">
        <div class="container-fluid">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link text-light" href="#" style="margin-left: 85px; font-family: roboto; font-size: 17px; font-weight: 600;">Tabel</a>
                    <div class="Rectangle6" style="width: 250px; height: 5px; background: #3D9EDE; border-radius: 12px;">
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-gray" href="riwayat-diagram-admin" style="margin-left: 85px; font-family:roboto; font-size: 17px; font-weight: 600;">Diagram</a>
                    <div class="Rectangle6" style="width: 250px; height: 5px; background: gray; border-radius: 12px;">
                    </div>
                </li>
            </ul>
        </div>
</section>

<div class="container">
    <form action="{{ route('filter') }}" method="GET" onsubmit="return validateDate()">
        @csrf
        <div class="row align-items-end">
            <!-- Button Tanggal Mulai-->
            <div class="col-md-2">
                <label for="start_date">Mulai Tanggal:</label>
                <input type="date" class="form-control" id="start_date" name="start_date" class="form-control">
            </div>

            <!-- Button Tanggal Akhir-->
            <div class="col-md-2">
                <label for="end_date">Sampai Tanggal:</label>
                <input type="date" class="form-control" id="end_date" name="end_date">
            </div>

            <!-- Dropdown Ruangan -->
            <div class="col-md-2">
                <label for="room">Ruangan:</label>
                <select class="form-control" id="room" name="room">
                    <option value="">Pilih Ruangan</option>
                    @foreach($ruangans as $ruangan)
                    <option value="{{ $ruangan }}">{{ $ruangan }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Button Cari -->
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary mt-2">Cari</button>
            </div>

            <!-- Button Cetak Laporan-->
            <div class="col-md-4 d-flex justify-content-end">
                <button type="button" class="btn btn-success mt-2" onclick="cetakLaporan()">Cetak Laporan</button>
            </div>
        </div>
    </form>
</div>

<div class="container mt-4">
    <!-- Tambahkan table-responsive agar tabel menjadi responsif -->
    <div class="table-responsive">
        <table class="table table-bordered mt-3 print-content" style="text-align:center; font-size: 14px;">
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
                </tr>
            </thead>
            <tbody>
                @foreach($data as $riwayat)
                <tr>
                    <td>{{ $riwayat->tanggal }}</td>
                    <td>{{ $riwayat->jam_peminjaman }}</td>
                    <td>{{ $riwayat->jam_pengembalian }}</td>
                    <td>{{ $riwayat->nama_dosen }}</td>
                    <td>{{ $riwayat->nama_matakuliah }}</td>
                    <td>{{ $riwayat->ruangan }}</td>
                    <td>{{ $riwayat->barang1 }}</td>
                    <td>{{ $riwayat->barang2 }}</td>
                    <td>{{ $riwayat->barang3 }}</td>
                    <td>{{ $riwayat->nama_peminjam }}</td>
                    <td>{{ $riwayat->nim_peminjam }}</td>
                    <td>{{ $riwayat->no_telp }}</td>
                    <td>{{ $riwayat->kelas }}</td>
                    <td>{{ $riwayat->prodi }}</td>
                </tr>
                @endforeach

                <!-- Script untuk Pop Up jika Memilih Tanggal Melebihi Tanggal Sekarang-->
                <script>
                    function validateDate() {
                        var startDate = document.getElementById('start_date').value;
                        var today = new Date().toISOString().split('T')[0];

                        if (startDate > today) {
                            alert('Data yang anda cari tidak tersedia.');
                            return false; // Memastikan form tidak di-submit
                        }
                        return true; // Submit form jika tanggal valid
                    }
                </script>

                <!-- Script untuk Mencetak Laporan Tabel Riwayat -->
                <script>
                     function cetakLaporan() {
                        var printContents = document.getElementsByClassName("print-content")[0].outerHTML;
                        var originalContents = document.body.innerHTML;

                        document.body.innerHTML = printContents;

                        // Ubah judul halaman saat mencetak
                        document.title = "Riwayat Peminjaman Kunci Ruangan dan Barang Dalam Bentuk Daftar";

                        window.print();

                        // Kembalikan judul halaman ke judul aslinya setelah selesai mencetak
                        document.title = "Peminjaman";

                        document.body.innerHTML = originalContents;
                    }
                </script>

            </tbody>
        </table>
    </div> <!-- End table-responsive -->
</div>

</body>
</html>
