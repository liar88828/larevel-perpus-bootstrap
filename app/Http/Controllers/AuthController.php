<?php

namespace App\Http\Controllers;

use App\Models\authtenticate;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class AuthController extends Controller
{
    public function managerSurat($slug)
    {

    }

    // Logout User
    public function logoutAccount (Request $request)
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

            'nama' => ['required', 'min:3', Rule::unique('users', 'nama')],
            'jenisKelamin' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'tanggalLahir' => 'required',
            'noHp' => ['required', 'min:8', Rule::unique('users', 'noHp')],
            'anggota' => 'required',
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

    // untuk menuju halaman login
    public function loginView()
    {
        return view('auth.login');
    }

    // login user
    public function loginAuth(Request $request): RedirectResponse
    {
        // validasi login
        $formField = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        // set user session / buat session setelah login
        if (auth()->attempt($formField)) {
            // set user
            $request->session()->regenerate();
            // akan di arahkan di home/menu beranda pada aplikasi
            $a = auth()->user()->anggota;
            if ($a === 'Staff' || $a === 'Kepala' || $a === 'Admin') {
                return redirect('/user')->with('message', 'You are now logged in!');
            } elseif ($a === 'Manager' || $a === 'Admin') {
                return redirect('/manager')->with('message', 'You are now logged in!');
            } elseif ($a === 'Admin') {
                return redirect('/admin')->with('message', 'You are now logged in!');

            }
        }
        // apa bila salah akan di muat ulang login
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }



    public function profileController()
    {
        $a = auth()->user()->anggota;
        if ($a === 'Staff' || $a === 'Kepala' || $a === 'Admin') {
            return redirect('/user')->with('message', 'You are now logged in!');
        } elseif ($a === 'Manager' || $a === 'Admin') {
            return redirect('/manager')->with('message', 'You are now logged in!');
        } elseif ($a === 'Admin') {
            return redirect('/admin')->with('message', 'You are now logged in!');

        }
    }
    // apa bila lupa akun
    public function lupa()
    {
        return view('auth.lupa');
    }


    // kirim kan email kepada admin
    public function lupaPost()
    {
        return view('auth.lupa');
    }

    // kirim kan email kepada admin
    public function profile()
    {
        $a = auth()->user()->anggota;
        if ($a === 'Staff' || $a === 'Kepala') {
            $user = DB::table('users')
                ->join('surats', 'surats.user_id', '=', 'users.id')
                ->where('users.id', '=', auth()->user()->id)
                ->where('acc_divisi', '=', 'Di Terima')
                ->select('users.*', 'surats.*')
                ->get();
            return view('user.index', ['surat' => count($user)]);
        }
        if ($a === 'Manager') {
            $manager = DB::table('users')
                ->join('surats', 'surats.user_id', '=', 'users.id')
                ->where('users.divisi', '=', auth()->user()->divisi)
                ->select('users.*', 'surats.*')
                ->get();
            return view('manager.index', ['surat' =>  $manager]);
        }
    }


    public function surat()
    {
        $surat = DB::table('users')
            ->join('surats', 'surats.user_id', '=', 'users.id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('acc_divisi', '=', 'Di Terima')
            ->select('users.*', 'surats.*')
            ->get();
        if (count($surat) <= 0) {
            return redirect('/user');
        }
        return view('user.surat', ['surat' => $surat]);
    }

}