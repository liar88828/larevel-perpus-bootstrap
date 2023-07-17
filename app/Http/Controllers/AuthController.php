<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    function register()
    {
        session()->regenerate();

        // set the session / membuat session
        session(['success' => 'bayu']);

        // get session / mendapatkan session
        // $value = session('success');

        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [

            'nama' => 'required|min:7',
            'email' => 'required|min:10',
            'password' => 'required|min:8',
        ]);



        return redirect()->route(
            'login',
            // ['message'=>'error']
    );
    }

    function login()
    {
        return view('auth.login');
    }
}