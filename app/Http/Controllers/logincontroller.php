<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class logincontroller extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function register()
    {
        return view('login.register');
    }

    public function registerpost(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('login')->with('success', 'Akun telah dibuat');

    }

    public function loginpost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan'])->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->role == 'Guru') {
                return redirect()->route('indexguru');
            } elseif (Auth::user()->role == 'Siswa') {
                return redirect()->route('indexsiswa');
            } else {
                Auth::logout();
                return redirect()->route('login')->withErrors(['role' => 'Peran pengguna tidak dikenali']);
            }
        } else {
            return back()->withErrors(['password' => 'Password tidak sesuai'])->withInput();
        }
    }
        
    public function logout(Request $request)
    {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login');

    }
}
