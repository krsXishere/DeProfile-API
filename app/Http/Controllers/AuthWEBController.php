<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthWEBController extends Controller
{
    public function index() {
        if($user = Auth::user()) {
            if($user->level == 1) {
                return view('admin.beranda.beranda');
            } else if($user->level == 2) {
                return view('admin_sekolah.jurusan.jurusan');
            } else {}
        } else {
            return view('login');
        }

        return view('login');
    }

    public function login(Request $request) {
        Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // $credential = $request->only('email', 'password');

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            $user = Auth::user();
            // dd($user->level_id);

            if($user->level_id == 1) {

                return redirect()->route('beranda');
            } else if($user->level_id == 2) {
                return redirect()->route('admin_sekolah_jurusan');
            } else {
                return redirect()->route('/');
            }
        }

        return back()->withErrors([
            'password' => 'Username atau password salah',
        ])->onlyInput();
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
