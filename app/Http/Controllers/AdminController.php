<?php

namespace App\Http\Controllers;

use App\Models\surat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        }
        else{
            $user = DB::table('users')
            ->where('users.divisi', '=', $slug)
            ->select('users.*',  )
            ->get();
            return view(
                'admin.user',
                ['user' => $user]
            ); 
        }
    }

    public function suratShow(string $slug)
    {

        if ($slug === 'all') {

            $surat = surat::all();
            return view(
                'admin.surat',
                ['surat' => $surat]
            );
        }
        else{
            $surat = DB::table('users')
            ->join('surats', 'surats.user_id', '=', 'users.id')
            ->where('users.divisi', '=', $slug)
            ->select('users.*', 'surats.*')
            ->get();
            return view(
                'admin.surat',
                ['surat' => $surat]
            ); 
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


    public function suratEdit(
        $id,
        $option,
        $value
    ) {
        $belum = 'Belum Di Terima';
        $sudah = 'Di Terima';
        $divisi = 'divisi';
        $direktur = 'direktur';

        if ($option === $divisi) {
            if ($value === $sudah) {
                surat::where('id', $id)->update(array('acc_divisi' => $belum));
            } else if ($value === $belum) {
                surat::where('id', $id)->update(array('acc_divisi' => $sudah));
            }
        }

        if ($option === $direktur) {
            if ($value === $sudah && $option === $direktur) {
                // dd($id, $option, $value);
                surat::where('id', $id)->update(array('acc_direktur' => $belum));
            } else if ($value === $belum && $option === $direktur) {
                // dd($id, $option, $value);
                surat::where('id', $id)->update(array('acc_direktur' => $sudah));
            }
        }

        return redirect()
            ->route('admin.surat.show')
            ->with(['success' => 'Data' . $value . ' Berhasil Di Ubah']);
    }
}