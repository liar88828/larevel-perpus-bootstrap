<?php

namespace App\Http\Controllers;

use App\Models\surat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;

class AdminController extends Controller
{
    public function userShow($slug)
    {
        if ($slug === 'all') {
            $user = User::all();
            return view(
                'admin.user',
                ['user' => $user]
            );
        } else {
            $user = DB::table('users')
                ->where('users.divisi', '=', $slug)
                ->select('users.*', )
                ->get();
            return view(
                'admin.user',
                ['user' => $user]
            );
        }
    }


    public function suratShow($slug)
    {
        if ($slug === 'all') {
            $surat = surat::all();
            if (auth()->user()->anggota === 'Manager') {
                return view(
                    'manager.surat',
                    ['surat' => $surat]
                );
            }
            if (auth()->user()->anggota === 'Admin') {

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
                ->get();
                
            if (auth()->user()->anggota === 'Manager') {
                return view(
                    'manager.surat',
                    ['surat' => $surat]
                );
            }
            if (auth()->user()->anggota === 'Admin') {

                return view(
                    'admin.surat',
                    ['surat' => $surat]
                );
            }
        }
    }

    public function index()
    {
        $surat = surat::count();
        $user = user::count();
        return view(
            'admin.index',
            [
                'surat' => $surat,
                'user' => $user
            ]
        );
    }
    public function suratPrint($id)
    {
        $surat = DB::table('users')
            ->join('surats', 'surats.user_id', '=', 'users.id')
            ->where('users.id', '=', $id)
            ->select('users.*', 'surats.*')
            ->get();
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
                surat::where('id', $id)->update(array('acc_divisi' => $belum));
            } else if ($value === $belum) {
                surat::where('id', $id)->update(array('acc_divisi' => $sudah));
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