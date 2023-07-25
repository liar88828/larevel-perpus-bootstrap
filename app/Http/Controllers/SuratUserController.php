<?php

namespace App\Http\Controllers;

use App\Models\suratUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SuratUserController extends Controller
{
    public function index()
    {
        $surats = suratUser::query()->paginate(10);
        // dd($surats) ;
        return view('surat-user.index', ['suratUsers' => $surats]);

    }

    public function create()
    {
        return view('surat-user.create');
    }
    public function store(Request $request): RedirectResponse
    {
        // dd($request);
        //validate form
        $this->validate($request, [

            'jenis' => 'required|min:5',
            'keterangan' => 'required|min:5',
            'jam_kerja' => 'required|min:5',
            'jam_lebur' => 'required|min:2',
            'lama' => 'required|min:5',
            // 'acc_divisi' => 'required|min:1',
            // 'acc_direktur' => 'required|min:2',
            'lampiran' => 'required|min:2',
            // 'status' => 'required|min:2',
        ]);

        $formField = [
            'jenis' => $request->jenis,
            'keterangan' => $request->keterangan,
            'jam_kerja' => $request->jam_kerja,
            'jam_lebur' => $request->jam_lebur,
            'lama' => $request->lama,
            'acc_divisi' =>  'Safira Nuraiha M.kom',
            'acc_direktur' => 'Heri Pamungkas S.S.M.I.KOM',
            'lampiran' => $request->lampiran,
            'status=' > 'Di Proses',
            // 'acc_divisi' => $request->acc_divisi,
            // 'acc_direktur' => $request->acc_direktur,
            // 'status=' > $request->status,
        ];

        suratUser::create($formField);

        return redirect()->route('surat-user.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(string $id)
    {
        $suratUser = suratUser::query()->findOrFail($id);
        return view('surat-user.edit', ['suratUser' => $suratUser]);
    }

    public function update(Request $request, string $id)
    {
        //validate form
        $this->validate($request, [

            'jenis' => 'required|min:5',
            'keterangan' => 'required|min:5',
            'jam_kerja' => 'required|min:5',
            'jam_lebur' => 'required|min:2',
            'lama' => 'required|min:5',
            'acc_divisi' => 'required|min:1',
            'acc_hrd' => 'required|min:2',
            'lampiran' => 'required|min:2',
            'status' => 'required|min:2',
        ]);

        $formField = [
            'jenis' => $request->jenis,
            'keterangan' => $request->keterangan,
            'jam_kerja' => $request->jam_kerja,
            'jam_lebur' => $request->jam_lebur,
            'lama' => $request->lama,
            'acc_divisi' => $request->acc_divisi,
            'acc_hrd' => $request->acc_hrd,
            'lampiran' => $request->lampiran,
            'status=' > $request->status,
        ];

        $suratUser = suratUser::query()->findOrFail($id);

        $suratUser->update($formField);

        return redirect()
            ->route('surat-user.index')
            ->with(['success' => 'Data Berhasil DiUpdate!']);
    }

    public function destroy(string $id)
    {
        $suratUser = suratUser::query()->findOrFail($id);
        $suratUser->delete();
        return redirect()->route('surat-user.index')->with(['success' => 'Berhasil Di Hapus']);
    }
}