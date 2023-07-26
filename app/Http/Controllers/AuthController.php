<?php

namespace App\Http\Controllers;

use App\Models\authtenticate;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class AuthController extends Controller
{


    // Logout User
    public function logoutUser(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');

    }

    // view register
    public function createRegister()
    {
        session()->regenerate();
        return view('auth.register');
    }

    // buat akun 
    public function storeRegister(Request $request)
    {
        // dd($request->all());
        $formField = $request->validate([

            'nama' => 'required|min:7',
            'jenisKelamin' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'tanggalLahir' => 'required',
            'noHp' => 'required|min:8',
            'jabatan' => 'required',
            'divisi' => 'required',
            'password' => 'required|confirmed|min:6'
        ]);

        // hasing password
        $formField['password'] = bcrypt($formField['password']);
        // buat akun baru
        $user = User::create($formField);
        // buat auth baru dengan user yang sudah dibuat
        auth()->login($user);
        // set sesson berdasarkan user
        session(['success' => $formField['nama'] . " Success Register"]);
        // akan di redirec/ di pindah halaman ke login
        return redirect()->route('login', )->with('message', 'User created and logged in');
    }

    // logout user
    // public function logoutUser(Request $request)
    // {
    //     dd($request);
    //     // logout dengan user tersebut
    //     auth()->logout();
    //     // hapus / nonaktifan sesson
    //     $request->session()->invalidate();
    //     // buat ulang token untuk user lain yang ingin login
    //     $request->session()->regenerateToken();
    //     // akan di arahkan ke halaman login apa bila sudah logout
    //     return redirect('/profile')
    //     ->with('message', 'User logged out');
    // }

    // untuk menuju halaman login
    public function loginView()
    {
        return view('auth.login');
    }

    // login user
    function loginAuth(Request $request): RedirectResponse
    {
        //validasi login
        $formField = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        //set user session /buat session setelah login 
        if (auth()->attempt($formField)) {
            //set user
            $request->session()->regenerate();
            // akan di arahkan di home/menu beranda pada aplikasi
            return redirect('/profile')->with('message', 'You are now logged in!');
        }
        // apa bila salah akan di muat ulang login
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }


    // apa bila lupa akun
    function lupa()
    {
        return view('auth.lupa');
    }


    // kirim kan email kepada admin
    function lupaPost()
    {
        return view('auth.lupa');
    }

    // kirim kan email kepada admin
    function profile()
    {
        return view('profile.index');
    }


}