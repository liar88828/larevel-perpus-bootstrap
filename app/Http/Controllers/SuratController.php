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
        return view('surat-ijin.create')
            ->with('mulai_pagi', 'kosong')
            ->with('akhir_pagi', 'kosong')
            ->with('mulai_malam', 'kosong')
            ->with('akhir_malam', 'kosong')
        ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);


        $createSurat = [
            'user_id' => $request->user_id,
            'hari_tanggal' => $request->hari_tanggal,
            'keterangan' => $request->keterangan,

            'hari_kerja' => $request->hari_kerja,
            'mulai_pagi' => $request->mulai_pagi ?? '-',
            'akhir_pagi' => $request->akhir_pagi ?? '-',

            'mulai_malam' => $request->mulai_malam ?? '-',
            'akhir_malam' => $request->akhir_malam ?? '-',

            // 'lama' => $request->lama,
            'acc_divisi' => 'Safira Nuraiha M.kom',
            'acc_direktur' => 'Heri Pamungkas S.S.M.I.KOM',
            // 'lampiran' => $request->lampiran,
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
        // $surat = surat::query()->findOrFail((int) $id);
        // $surat = surat::query()->findOrFail((int) $id);
        // $surat->user()->where('id', '1') 

        // $surat = surat::query()->whereBelongsTo('user', $id);
        // $surat = surat::with('user')->whereBelongsTo('')
        // ->where('user_id','==',1)->get()
        //   ->whereIn('user_id',1)//->get()
        // $surat=surat::with('user')->where('user_id','=', 1)->get();
// $data=$surat->user->email;

        $surat = surat::latest()->get();
        // dd($surat);
        // dd($surat);
        return view(
            'surat-ijin.show',
            compact('surat')
        );


        // $data = Item::select('*')

        //     ->whereMonth('created_at', Carbon::now()->month)

        //     ->get();
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

    // public function surat(string $id)

    
    // {
    //     return redirect()->route('surat-ijin.surat' );

    // }

}