<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Riwayat Peminjaman Diagram</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <style>
        body {
          font-family: 'Roboto', sans-serif;
        }
    
        .navbar {
          padding-left: 50px;
          padding-right: 50px;
          height: 100px;
        }
    
        .navbar-nav .nav-link {
          font-size: 1rem;
          font-weight: 500;
        }
    
        .nav-item {
          margin-left: 100px;
        }
    
        .navbar-brand img {
          height: 50px;
        }
    
        .notif-icon {
          height: 25px;
          margin-right: 30px;
        }
    
        .logout-btn {
          background-color: transparent;
          border: none;
          color: #0056b3;
          font-family: 'Roboto', sans-serif;
          cursor: pointer;
        }
    
        .logout-btn:hover {
          color: #003d7d;
        }
      </style>
    </head>
    
    <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <!-- Logo Poliwangi -->
          <a class="navbar-brand" href="#beranda">
            <img src="{{ asset('img/logo-poliwangi.png') }}" alt="Logo Poliwangi">
          </a>
              <ul class="navbar-nav mx-auto">
                  <li class="nav-item">
                      <a class="nav-link text-light" href="inforuangan-mahasiswa" style="font-family:roboto;">Info Ruangan</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-light" href="peminjaman" style="margin-left: 100px; font-family:roboto;">Peminjaman Ruangan & Barang</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-dark" href="riwayat-list-mahasiswa" style="margin-left: 100px; font-family:roboto;">Riwayat</a>
                  </li>
              </ul>
            <!-- Notifikasi dan Logout -->
          <a href="#notifikasi">
            <img src="{{ asset('img/notif.svg') }}" alt="Logo Notifikasi" class="notif-icon">
          </a>
    
          <!-- Tombol Logout -->
          <form action="logout" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
          </form>
        </div>
      </nav>
    </body>

  <div class="container" style="margin-top: 20px;">
    <p class="h4">Riwayat Peminjaman - Diagram</p> </div>

<section>
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent" style="height:100px">
        <div class="container-fluid">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link text-grey" href="riwayat-list-mahasiswa"
                        style="margin-left: 85px; font-family: roboto; font-size: 17px; font-weight: 600;">Tabel</a>
                    <div class="Rectangle6"
                        style="width: 250px; height: 5px; background: gray; border-radius: 12px;">
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-light" href="#"
                        style="margin-left: 85px; font-family:roboto; font-size: 17px; font-weight: 600;">Diagram</a>
                    <div class="Rectangle6" style="width: 250px; height: 5px; background: #3D9EDE; border-radius: 12px;">
                    </div>
                </li>
            </ul>
        </div>
</section>

<div class="container">
    <form action="{{ route('riwayat.filterDiagram_mahasiswa') }}" method="GET">
        <div class="row align-items-end">
            <!-- Button Filter Data Bulan Tahun -->
            <div class="col-md-2">
                <label for="bulanTahun">Bulan & Tahun: </label>
                <input type="month" id="bulanTahun" name="date" class="form-control">
            </div>
            
            <!-- Tombol Cari -->
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary mt-2">Cari</button>
            </div>
        </div>
    </form>
</div>

<div class="container text-center" style="margin-top: 30px;">
    <p class="h5">Diagram Jumlah Ruangan Yang Sering Digunakan</p>
    <p class="h5">Di Jurusan Bisnis Dan Informatika</p>
</div>

    <!--Tampilan Diagram Batang-->
    <div class="container mt-4 print-content">
        <div id="bulanSekarang"></div>
        <canvas id="myChart" width="1000" height="300"></canvas>

<script>
    // Mendapatkan tanggal saat ini
    let tanggalSekarang = new Date();

    // Mendapatkan nama bulan dan tahun saat ini
    let namaBulan = new Intl.DateTimeFormat('id-ID', {
        month: 'long',
        year: 'numeric'
    }).format(tanggalSekarang);

    // Ambil data yang dikirimkan dari controller
    let dataPeminjamanRuangan = @json($dataPeminjamanRuangan);
    let namaRuangan = @json($ruangans);

    // Mendapatkan nilai bulan yang difilter (jika ada)
    let urlParams = new URLSearchParams(window.location.search);
    let bulanTahun = urlParams.get('date');
    let namaBulanFiltered = bulanTahun ? new Date(bulanTahun).toLocaleString('id-ID', { 
        month: 'long', 
        year: 'numeric' 
    }) : namaBulan;

    // Menginisialisasi array untuk nilai jumlah peminjaman ruangan
    let yValues = [];

    // Memuat jumlah peminjaman ruangan sesuai dengan nama ruangan
    namaRuangan.forEach(nama => {
        yValues.push(dataPeminjamanRuangan[nama] || 0);
    });

    // Konfigurasi untuk diagram
    let ctx = document.getElementById('myChart').getContext('2d');
    let myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: namaRuangan,
            datasets: [{
                label: 'Jumlah Peminjaman Ruangan',
                data: yValues,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: namaBulanFiltered // Menyesuaikan dengan nama bulan yang difilter atau defaultnya
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontColor: 'black' // Mengubah warna label pada sumbu x menjadi hitam
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            fontColor: 'black' // Mengubah warna label pada sumbu y menjadi hitam
                        }
                    }]
                }
            }
        });
</script>

    <div class="container text-center" style="margin-top: 8px;">
    <p class="h6">Nama Ruangan</p> </div>
</div>
</body>
</html>