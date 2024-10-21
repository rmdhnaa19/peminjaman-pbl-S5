@extends('app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <p class="text-center" style="margin-top: -30px;"><img src="{{asset('img/hmjti1.png')}}" width="150px"  alt=""></p>
        <h6 class="text-center py-4" style="margin-top: -40px; margin-bottom: 20px;"><b>Pendaftaran Pengguna</b></h6>
        <div class="col-md-8" style="font-size:14px;">
            <form id="registerForm" action="{{ route('register')}}" method="POST">
                @csrf

                <!-- Kolom Pilihan User Type -->
                <div class="row mb-3">
                    <label for="user_type" class="col-md-4 col-form-label text-md-end">{{ __('Jenis Pengguna') }}</label>
                    <div class="col-md-5">
                        <select id="user_type" class="form-control" name="user_type" required>
                            <option value="">Pilih Jenis Pengguna</option>
                            <option value="mahasiswa">Mahasiswa</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>

                <!-- Kolom NIM (hanya untuk Mahasiswa) -->
                <div class="row mb-3" id="nim-row" style="display:none;">
                    <label for="nim" class="col-md-4 col-form-label text-md-end">{{ __('NIM') }}</label>
                    <div class="col-md-5">
                        <input id="nim" type="text" class="form-control" name="nim" value="{{ old('nim') }}" placeholder="Masukkan NIM">
                    </div>
                </div>

                <!-- Kolom Nama -->
                <div class="row mb-3">
                    <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>
                    <div class="col-md-5">
                        <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required placeholder="Masukkan Nama">
                    </div>
                </div>

                <!-- Kolom Password -->
                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                    <div class="col-md-5">
                        <input id="password" type="password" class="form-control" name="password" required placeholder="Masukkan Password">
                    </div>
                </div>

                <!-- Tombol Register -->
                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Daftar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('user_type').addEventListener('change', function () {
        var userType = this.value;
        document.getElementById('nim-row').style.display = (userType === 'mahasiswa') ? '' : 'none';
        document.getElementById('email-row').style.display = (userType === 'admin') ? '' : 'none';
    });
</script>
@endsection
