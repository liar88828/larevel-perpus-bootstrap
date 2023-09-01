<?php

namespace App\Http\Controllers;

use App\Models\surat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;

use function PHPUnit\Framework\isNull;

class AdminController extends Controller
{


    public function userShow($slug)
    {
        if ($slug === 'all') {
            $user = User::paginate(10);
            if (auth()->user()->anggota === 'Manager') {
                return view(
                    'manager.user',
                    ['user' => $user]
                );
            } elseif (auth()->user()->anggota === 'Admin') {
                return view(
                    'admin.user',
                    ['user' => $user]
                );
            }
        } else {
            $users = DB::table('users')
                ->where('users.divisi', '=', $slug)
                ->paginate(10);

            if (auth()->user()->anggota === 'Manager') {
                return view(
                    'manager.user',
                    ['users' => $users]
                );
            } elseif (auth()->user()->anggota === 'Admin') {
                return view(
                    'admin.user',
                    ['users' => $users]
                );
            }

        }
    }


    public function suratShow($slug)
    {
        if ($slug === 'all') {
            $surat = surat::paginate(15);
            if (auth()->user()->anggota === 'Manager') {
                return view(
                    'manager.surat',
                    ['surat' => $surat]
                );
            } elseif (auth()->user()->anggota === 'Admin') {
                return view(
                    'admin.surat',
                    ['surat' => $surat]
                );
            }
        } else {
            $surat = DB::table('users')
                ->join('surats', 'surats.user_id', '=', 'users.id')
                ->where('users.divisi', '=', $slug)
                ->select('users.*', 'surats.*')
                ->paginate(10);
            if (auth()->user()->anggota === 'Manager') {
                return view(
                    'manager.surat',
                    ['surat' => $surat]
                );
            } elseif (auth()->user()->anggota === 'Admin') {

                return view(
                    'admin.surat',
                    ['surat' => $surat]
                );
            }
        }
    }

    public function index()
    {
        // if (empty($auth)) {
        //     return redirect('/ ')
        //         ->with('message', 'Anda Tidak Berhak');
        // }

        // $admin = auth()->user()->anggota;
        // if ($admin !== 'admin') {
        //     return redirect('/ ')
        //         ->with('message', 'Anda Tidak Berhak');
        // }

        $surat = surat::count();
        $user = user::count();



        $lupa = DB::table('password_reset_tokens')
            ->select('*')
            ->paginate(10);

        return view(
            'admin.index',
            [
                'surat' => $surat,
                'user'  => $user,
                'lupa'  => count($lupa),
            ]
        );
    }
    public function suratPrint($id)
    {
        $surat = DB::table('users')
            ->join('surats', 'surats.user_id', '=', 'users.id')
            ->where('users.id', '=', $id)
            ->select('users.*', 'surats.*')
            ->paginate(10);
        return view('user.surat', ['surat' => $surat]);
    }

    public function suratEdit(Request $request)
    {
        $id = $request->id; //id user
        $option = $request->option; //
        $value = $request->value;
        $belum = 'Belum Di Terima';
        $sudah = 'Di Terima';
        $divisi = 'divisi';

        if ($option === $divisi) {
            if ($value === $sudah) {
                surat::where('id', $id)->update([
                    'acc_divisi'   => $belum,
                    'nama_manager' => '-'

                ]);
            } else if ($value === $belum) {
                surat::where('id', $id)->update(
                    array(
                        'acc_divisi'   => $sudah,
                        'nama_manager' => auth()->user()->nama
                    )
                );
            }
        }
        return back();
    }

    public function destroy(string $id)
    {
        $surat = surat::query()->findOrFail($id);
        $surat->delete();
        return back();
    }
}