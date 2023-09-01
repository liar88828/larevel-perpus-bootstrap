<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Validation\Rule;

class ForgotPasswordController extends Controller
{


    public function formGantiPassword(string $id)
    {

        $lupa = DB::table('users')
            ->join('password_reset_tokens', 'password_reset_tokens.email', '=', 'users.email')
            ->where('users.id', '=', $id)
            ->select('users.*', 'password_reset_tokens.*')
            ->paginate(10);

        return view(
            'admin.edit',
            ['lupa' => $lupa]
        );

    }
    public function editLupaGanti()
    {

    }

    public function showLupaPass(string $slug)
    {
        if ($slug !== 'all') {
            $lupa = DB::table('users')
                ->join('password_reset_tokens', 'password_reset_tokens.email', '=', 'users.email')
                ->where('users.anggota', '=', $slug)
                ->select('users.*', 'password_reset_tokens.*')
                ->paginate(10);

            return view(
                'admin.lupa',
                ['lupa' => $lupa]
            );

        } else {
            $lupa = DB::table('users')
                ->join('password_reset_tokens', 'password_reset_tokens.email', '=', 'users.email')
                ->select('users.*', 'password_reset_tokens.*')
                ->paginate(10);

            return view(
                'admin.lupa',
                ['lupa' => $lupa]
            );
        }


    }

    public function showForgetPasswordForm()
    {
        return view('auth.lupa');
    }

    // send email to admin
    public function submitForgetPasswordForm(Request $request)
    {
        $request->session()->forget('emailSend');

        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $emailRess = DB::table('password_reset_tokens')
            ->where('email', '=', $request->email)
            ->paginate(10);

        if ($emailRess->isEmpty()) {
            $token = Str::random(64);
            DB::table('password_reset_tokens')
                ->insert([
                    'email'      => $request->email,
                    'token'      => $token,
                    'created_at' => Carbon::now()
                ]);
            session(['emailSend' => 'Password Sudah Di Kirim Tunggu sampai dapat balasan !!']);
            return redirect('/forget-password')->with('message', 'Password akan di proses oleh admin');
        }

        if ($emailRess->isEmpty() === false) {
            session(['emailSend' => 'Password akan di proses oleh admin']);
            return redirect('/forget-password');
        }
        return redirect('/forget-password');
    }


    // get all lupa password
    public function showResetPasswordForm()
    {
        $userPass = DB::table('password_reset_tokens')
            ->join('users', 'password_reset_tokens.email', '=', 'users.email')
            ->select('users.*', 'password_reset_tokens.*')
            ->paginate(10);

        return view('auth.forgetPasswordLink', ['userpass' => $userPass]);
    }

    // admin ubah password / reset password
    public function submitResetPasswordForm(Request $request)
    {
        $formField = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|confirmed|min:6'
        ]);

        $formField['password'] = bcrypt($formField['password']);

        User::where('email', $request->email)
            ->update(['password' => $formField['password']]);

        DB::table('password_reset_tokens')->where('email', $formField['email'])->delete();

        return redirect('/admin')->with('message', 'Your password has been changed!');
    }
}

// SELECT * from users JOIN password_reset_tokens ON users.email =password_reset_tokens.email; 