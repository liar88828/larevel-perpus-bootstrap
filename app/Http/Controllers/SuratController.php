<?php

namespace App\Http\Controllers;

use App\Models\surat;
use App\Http\Requests\StoresuratRequest;
use App\Http\Requests\UpdatesuratRequest;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    //
    public function index()
    {
        $surats = surat::all();
        // dd($surats);
        return view(
            'surat-ijin.index',
            ['surat_ijin' => $surats]
        );
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
        // dd($request);


        $createSurat = [
            'jenis' => $request->jenis,
            'keterangan' => $request->keterangan,
            'jam_kerja' => $request->jam_kerja,
            'jam_lembur' => $request->jam_lembur,
            'lama' => $request->lama,
            'acc_divisi' => 'Safira Nuraiha M.kom',
            'acc_direktur' => 'Heri Pamungkas S.S.M.I.KOM',
            'lampiran' => $request->lampiran,
            'status' => 'Di Proses',
            // 'acc_divisi' => $request->acc_divisi,
            // 'acc_direktur' => $request->acc_direktur,
        ];

        surat::create($createSurat);

        // dd($request);
        //redirect to index
        return redirect()
            ->route('surat-ijin.index')
            ->with(['success' => 'Data Berhasil Disimpan!']);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $surat = surat::query()->findOrFail((int) $id);
        return view(
            'surat-ijin.show',
            compact('surat')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $surat = surat::query()->findOrFail($id);
        return view('surat.edit', compact('surat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatesuratRequest $request, surat $surat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $surat = surat::query()->findOrFail($id);
        $surat->delete();
        return redirect()->route('surat-ijin.index')->with(['success' => 'Berhasil Di Hapus']);

    }
}