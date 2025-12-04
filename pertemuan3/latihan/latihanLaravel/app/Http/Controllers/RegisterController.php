<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //Modul 2-2 START - Authentikasi Manual Sederhana
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        //validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|min:3|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]
        //, [
            // Array Kedua: Pesan Error Kustom (Custom Messages)
          //  'password.min' => 'Password minimal harus 8 karakter.',
            //'password.confirmed' => 'Konfirmasi password tidak cocok.',
            //'email.unique' => 'Email ini sudah terdaftar, gunakan email lain.',
            //'required' => 'Kolom :attribute wajib diisi.',
            //'email' => 'Format email tidak valid.'
        //    ]
        );

        //Logic register: validasi, hash password, User::create
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //Redirect ke halaman login setelah registrasi berhasil
        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
