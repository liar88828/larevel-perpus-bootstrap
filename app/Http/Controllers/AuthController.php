<?php

namespace App\Http\Controllers;

use App\Models\authtenticate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class AuthController extends Controller
{





    function lupa()
    {
        return view('auth.lupa');
    }



    function lupaPost()
    {
        return view('auth.lupa');
    }



    function register()
    {
        session()->regenerate();

        // set the session / membuat session


        // get session / mendapatkan session
        // $value = session('success');
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [

            'nama' => 'required|min:7',
            'jenisKelamin' => 'required|min:10',
            'email' => 'required|min:10',
            'tanggalLahir' => 'required',
            'noHp' => 'required|min:8',
            'jabatan' => 'required|min:10',
            'divisi' => 'required|min:10',
            'password' => 'required|min:8',
            'confpass' => 'required|min:8',
        ]);

        $email = $request->email;
        $password = $request->password;
        $confPass = $request->password;


        if ($password !== $confPass) {
            return redirect()->back()
                ->with('error', 'Konfirmasi password tidak sama');
        }

        $email = authtenticate::query()->findOrFail($email);

        if ($email) {
            return redirect()->back()
                ->with('error', 'Email sudah terdaftar');
        }

        $createUser = [
            'nama' => $request->nama,
            'jenisKelamin' => $request->jenisKelamin,
            'email' => $request->email,
            'tanggalLahir' => $request->tanggalLahir,
            'noHp' => $request->noHp,
            'jabatan' => $request->jabatan,
            'divisi' => $request->divisi,
            'password' => $request->password,
        ];

        authtenticate::create($createUser);


        session(['success' => "$request->nama Success Register"]);

        return redirect()->route(
            'login',
            // ['message'=>'error']
        );
    }

    function login()
    {
        return view('auth.login');
    }
    function loginPost(Request $request): RedirectResponse
    {

        session()->forget('success');





        // if ($request->email) {

        //     session(['error' => "$request->nama Success Register"]);
        // }


        $this->validate($request, [
            'email' => 'required|min:10',
            'password' => 'required|min:8',
        ]);

        $email = $request->email;
        $password = $request->password;

        if ($email . isEmpty()) {
            return redirect()->back()
                ->with('error', 'Email tidak boleh kosong');
        }

        if ($password . isEmpty()) {
            return redirect()->back()
                ->with('error', 'Password tidak  boleh kosong');
        }

        $user = authtenticate::query()->findOrFail($email);

        if ($user . isNull()) {
            return redirect()->back()
                ->with('error', 'Email tidak terdaftar');
        }

        if ($user->password !== $password) {
            return redirect()->back()
                ->with('error', 'Password salah');
        }

        $createUser = [
            'nama' => $request->nama,
            'jenisKelamin' => $request->jenisKelamin,
            'email' => $request->email,
            'tanggalLahir' => $request->tanggalLahir,
            'noHp' => $request->noHp,
            'jabatan' => $request->jabatan,
            'divisi' => $request->divisi,
            'password' => $request->password,
        ];



        authtenticate::create($createUser);


        session(['success' => "$request->nama Success Register"]);


        session(['login' => "$request->email Success Login"]);
        return redirect()
            ->route('surat.index');

    }
}