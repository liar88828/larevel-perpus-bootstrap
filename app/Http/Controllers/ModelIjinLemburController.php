<?php

namespace App\Http\Controllers;

use App\Models\ModelIjinLembur;

use App\Http\Requests\StoreModelIjinLemburRequest;
use App\Http\Requests\UpdateModelIjinLemburRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ModelIjinLemburController extends Controller
{


    public function __construct()
    {
        // $this->middleware('auth:web');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $surats = ModelIjinLembur::all();
        return view('surat.index', compact('surats'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('surat.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreModelIjinLemburRequest $request): RedirectResponse
    {




        
        $createModelLembur = [
            'kepada' => $request->kepada,
            'hal' => $request->hal,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'divisi' => $request->divisi,
            'no' => $request->no,
            'hari_tanggal' => $request->hari_tanggal,
            'jam_kerja_normal' => $request->jam_kerja_normal,
            'jam_kerja_lembur' => $request->jam_kerja_lembur,
            'guna' => $request->guna,
            'nama_divisi' => $request->nama_divisi,
            'jabatan_divisi' => $request->jabatan_divisi,
            'nama_penyetujui' => $request->nama_penyetujui,
            'jabatan_penyetujui' => $request->jabatan_penyetujui,
        ];

        ModelIjinLembur::create($createModelLembur);

        //redirect to index
        return redirect()
            ->route('surat.index')
            ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View // harus di ganti id
    {

        // dd($id);
        $surat = ModelIjinLembur::query()->findOrFail($id);
        // dd($surat);
        return view(
            'surat.show',
            compact('surat')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $surat = ModelIjinLembur::query()->findOrFail($id);
        return view('surat.edit', compact('surat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateModelIjinLemburRequest $request, string $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [

            'kepada' => 'required|min:5',
            'hal' => 'required|min:5',
            'nama' => 'required|min:5',
            'jabatan' => 'required|min:2',
            'divisi' => 'required|min:5',
            'no' => 'required|min:1',
            'hari_tanggal' => 'required|min:2',
            'jam_kerja_normal' => 'required|min:2',
            'jam_kerja_lembur' => 'required|min:2',
            'guna' => 'required|min:10',
            'nama_divisi' => 'required|min:5',
            'jabatan_divisi' => 'required|min:2',
            'nama_penyetujui' => 'required|min:5',
            'jabatan_penyetujui' => 'required|min:5',
        ]);

        $surat = ModelIjinLembur::query()->findOrFail($id);


        $surat->update(
            [
                'kepada' => $request->kepada,
                'hal' => $request->hal,
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'divisi' => $request->divisi,
                'no' => $request->no,
                'hari_tanggal' => $request->hari_tanggal,
                'jam_kerja_normal' => $request->jam_kerja_normal,
                'jam_kerja_lembur' => $request->jam_kerja_lembur,
                'guna' => $request->guna,
                'nama_divisi' => $request->nama_divisi,
                'jabatan_divisi' => $request->jabatan_divisi,
                'nama_penyetujui' => $request->nama_penyetujui,
                'jabatan_penyetujui' => $request->jabatan_penyetujui,
            ]
        );


        return redirect()
            ->route('surat.index')
            ->with(['success' => 'Data Berhasil Diubah!']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {

        $surat = ModelIjinLembur::query()->findOrFail($id);
        $surat->delete();
        return redirect()->route('surat.index')->with(['success' => 'Berhasil Di Hapus']);


    }
}