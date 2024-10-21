<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Mengambil input
        $nama_adminOrNim = $request->input('nama_admin_or_nim');
        $password = $request->input('password');

        // Credentials untuk Mahasiswa
        $credentialsMahasiswa = [
            'nim' => $nama_adminOrNim,
            'password' => $password,
        ];

        // Credentials untuk Admin
        $credentialsAdmin = [
            'nama_admin' => $nama_adminOrNim,
            'password' => $password,
        ];

        // Coba login Mahasiswa
        if (Auth::guard('mahasiswa')->attempt($credentialsMahasiswa)) {
            $request->session()->regenerate();
            return redirect()->route('inforuangan-mahasiswa.index'); // Ganti dengan route yang benar
        }

        // Coba login Admin
        if (Auth::guard('admin')->attempt($credentialsAdmin)) {
            $request->session()->regenerate();
            return redirect()->route('inforuangan-admin.index_admin'); // Ganti dengan route yang benar
        }

        // Login gagal
        throw ValidationException::withMessages([
            'nama_admin_or_nim' => 'NIM atau Nama Admin atau Password salah.'
        ])->status(401);
    }
}
