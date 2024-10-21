<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $userType = $request->input('user_type');

        if ($userType === 'mahasiswa') {
            // Validasi untuk Mahasiswa
            $request->validate([
                'nim' => 'required|digits:12|unique:user_mahasiswa,nim',
                'nama' => 'required|string|max:255',
                'password' => 'required|string|min:8',
            ]);

            // Simpan Mahasiswa
            $mahasiswa = new Mahasiswa([
                'nim' => $request->nim,
                'nama_mahasiswa' => $request->nama,
                'password' => Hash::make($request->password),
            ]);
            $mahasiswa->save();

            // Redirect ke halaman login setelah registrasi berhasil
            return redirect()->route('login')->with('success', 'Mahasiswa berhasil didaftarkan! Silakan login.');

            
        } elseif ($userType === 'admin') {
            // Validasi untuk Admin
            $request->validate([
                'nama' => 'required|string|max:255',
                'password' => 'required|string|min:8',
            ]);

            // Simpan Admin
            $admin = new Admin([
                'nama_admin' => $request->nama,
                'password' => Hash::make($request->password),
            ]);
            $admin->save();

            // Redirect ke halaman login setelah registrasi berhasil
            return redirect()->route('login')->with('success', 'Admin berhasil didaftarkan! Silakan login.');
        } else {
            return back()->withErrors(['user_type' => 'Pilih jenis pengguna yang valid']);
        }
    }
}
