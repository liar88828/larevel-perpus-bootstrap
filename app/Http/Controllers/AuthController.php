<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
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
            'email' => 'required|min:10',
            'password' => 'required|min:8',
        ]);

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