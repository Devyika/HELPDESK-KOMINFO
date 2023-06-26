<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function dologin(Request $request) {
        // validasi
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt($credentials)) {

            // buat ulang session login
            $request->session()->regenerate();

            if (auth()->user()->role_id === 'superadmin') {
                // jika user superadmin
                return redirect()->intended('/dashboard1');
            } elseif (auth()->user()->role_id == 'admin') {
                // jika user pegawai
                return redirect()->intended('/dashboard2');
            } elseif(auth()->user()->role_id == 'opd') {
                // jika user pegawai
                return redirect()->intended('/dashboard3');
            }
        }

        // jika username atau password salah
        // kirimkan session error
        return back()->with('error', 'username atau password salah');
    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/auth');
    }
}