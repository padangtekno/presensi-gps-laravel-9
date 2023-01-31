<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function ProsesLogin(Request $request)
    {
        if (Auth::guard('karyawan')->attempt([
            'nik' => $request->nik,
            'password' => $request->password,
        ])) {
            return redirect('/dashboard');
        } else {
            echo "Gagal Login";
        }
    }
    public function ProsesLogout()
    {
        if (Auth::guard('karyawan')->check()) {
            Auth::guard('karyawan')->logout();
        }
    }
}
