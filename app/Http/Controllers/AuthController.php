<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Wajib dipanggil untuk fitur Login/Logout
use Illuminate\Support\Facades\Hash; // Wajib dipanggil untuk enkripsi password
use App\Models\User; // Memanggil tabel users bawaan Laravel

class AuthController extends Controller
{
    // 1. Menampilkan Halaman Login
    public function showLogin()
    {
        return view('auth.login');
    }

    // 2. Memproses Data Login
    public function loginProses(Request $request)
    {
        // Validasi input form
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Auth::attempt akan mengecek apakah email dan password cocok dengan di database
        if (Auth::attempt($credentials)) {
            // Jika cocok, buat sesi baru (keamanan) dan arahkan ke dashboard
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        // Jika salah, kembalikan ke halaman login dengan pesan eror
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // 3. Menampilkan Halaman Register (Daftar Akun)
    public function showRegister()
    {
        return view('auth.register');
    }

    // 4. Memproses Pendaftaran Akun Baru
    public function registerProses(Request $request)
    {
        // Validasi data pendaftaran
        $dataValid = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed' // 'confirmed' berarti harus ada input 'password_confirmation'
        ]);

        // Enkripsi password menggunakan bcrypt (Hash) sebelum disimpan ke MySQL
        $dataValid['password'] = Hash::make($dataValid['password']);

        // Simpan data ke tabel users
        $user = User::create($dataValid);

        // Langsung login-kan user tersebut setelah berhasil mendaftar
        Auth::login($user);

        return redirect('/dashboard');
    }

    // 5. Memproses Logout
    public function logout(Request $request)
    {
        Auth::logout(); // Putuskan sesi login

        // Bersihkan seluruh data sesi (cookie) untuk keamanan ganda
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
