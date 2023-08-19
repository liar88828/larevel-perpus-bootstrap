<?php

namespace App\Http\Controllers;

use App\Models\surat;
use App\Http\Requests\StoresuratRequest;
use App\Http\Requests\UpdatesuratRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    //
    public function index()
    {

        if (auth()->user()->anggota === 'Manager') {
            $surats = surat::all();
            return view(
                'surat-ijin.index',
                ['surat_ijin' => $surats]
            );
        } else {
            $surats = auth()->user()->userSurat()->get();
            return view(
                'surat-ijin.index',
                ['surat_ijin' => $surats]
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('surat-ijin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $createSurat = [
            'user_id' => $request->user_id,
            'nama' => $request->nama,
            'hari_tanggal' => $request->hari_tanggal,
            'keterangan' => $request->keterangan ?? '-',
            'hari_kerja' => $request->hari_kerja ?? '-',
            'mulai_pagi' => $request->mulai_pagi ?? '-',
            'akhir_pagi' => $request->akhir_pagi ?? '-',
            'mulai_malam' => $request->mulai_malam ?? '-',
            'akhir_malam' => $request->akhir_malam ?? '-',
            'acc_divisi' => 'Belum Di Terima',
            'status' => 'Di Proses',
        ];

        surat::create($createSurat);

        // dd($request);
        //redirect to index
        return redirect()
            ->route('surat-ijin.index')
            ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    // hnya melihat satian data
    public function show(string $id)
    {
        $surat = surat::latest()->get();
        return view(
            'surat-ijin.show',
            compact('surat')
        );
    }

    public function edit(string $id)
    {
        $surat = surat::query()->findOrFail($id);
        return view('surat-ijin.edit', compact('surat'));
    }

    public function update(UpdatesuratRequest $request, string $id)
    {
        $createSurat = [
            'user_id' => $request->user_id,
            'nama' => $request->nama,
            'hari_tanggal' => $request->hari_tanggal,
            'keterangan' => $request->keterangan ?? '-',

            'hari_kerja' => $request->hari_kerja ?? '-',
            'mulai_pagi' => $request->mulai_pagi ?? '-',
            'akhir_pagi' => $request->akhir_pagi ?? '-',

            'mulai_malam' => $request->mulai_malam ?? '-',
            'akhir_malam' => $request->akhir_malam ?? '-',
            'acc_divisi' => $request->acc_divisi ?? 'Belum Di Terima',
            'status' => 'Di Proses',
        ];


        $surat = surat::query()->findOrFail($id);

        $surat->update($createSurat);

        return redirect()
            ->route('surat-ijin.index')
            ->with(['success' => 'Data Berhasil Di Ubah!']);

    }

    public function destroy(string $id)
    {
        $surat = surat::query()->findOrFail($id);
        $surat->delete();
        return redirect()->route('surat-ijin.index')->with(['success' => 'Berhasil Di Hapus']);

    }

    public function editData(Request $request, string $id)
    {

        $this->validate(
            $request,
            [
                'user_id' => 'required|min:1',
                'nama' => 'required|min:1',
                'hari_tanggal' => 'required|min:1',
                'keterangan' => 'required|min:1',
                'hari_kerja' => 'required|min:1',
                'acc_divisi' => 'required|min:1',
                'status' => 'required|min:2',
            ]
        );

        $surat = surat::query()->findOrFail($id);

        $surat->update(
            [
                'user_id' => $request->user_id,
                'nama' => $request->nama,
                'hari_tanggal' => $request->hari_tanggal ?? '-',
                'keterangan' => $request->keterangan ?? '-',
                'hari_kerja' => $request->hari_kerja ?? '-',
                'mulai_pagi' => $request->mulai_pagi ?? '-',
                'akhir_pagi' => $request->akhir_pagi ?? '-',
                'mulai_malam' => $request->mulai_malam ?? '-',
                'akhir_malam' => $request->akhir_malam ?? '-',
                'acc_divisi' => 'Safira Nuraiha M.kom',
                'status' => 'Di Proses'
            ]
        );

        return redirect()
            ->route('surat-ijin.index')
            ->with(['success' => 'Data Berhasil Di Ubah!']);
    }
public function managerSurat(){
    
}
}