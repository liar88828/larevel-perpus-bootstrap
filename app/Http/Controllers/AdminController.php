<?php

namespace App\Http\Controllers;

use App\Models\surat;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function userShow()
    {
        $user = user::all();
        // dd($user);
        return view(
            'admin.user',
            ['user' => $user]
        );
    }

    public function suratShow()
    {
        $surat = surat::all();
        return view(
            'admin.surat',
            ['surat' => $surat]
        );
    }
    public function suratEdit(
        $id,
        $option,
        $value
    ) {
        // dd($id, $option, $value);
        // $surat = surat::query()->findOrFail($id);
        // $acc = $surat->update($option);


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