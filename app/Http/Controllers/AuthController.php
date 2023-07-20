<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

        $password = $request->password;
        $confPass = $request->password;


        if($password!==$confPass){
            return redirect()->back()
            ->with('error', 'Konfirmasi password tidak sama');
        }


        
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



        session(['login' => "$request->email Success Login"]);
        return redirect()
            ->route('surat.index');

    }
}