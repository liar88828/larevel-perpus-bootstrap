        //     'lampiran' => 'required|min:2',
        //     'status' => 'required|min:2',
        // ]);
        // suratUser::create($formField);
        return redirect('/surat-users')->with(['success' => 'Data Berhasil Disimpan!']);

        //validate form

        // $formField = [
        //     'jenis' => $request->jenis,
        //     'keterangan' => $request->keterangan,
        //     'jam_kerja' => $request->jam_kerja,
        //     'jam_lebur' => $request->jam_lebur,
        //     'lama' => $request->lama,
        //     'acc_divisi' => 'Safira Nuraiha M.kom',
        //     'acc_direktur' => 'Heri Pamungkas S.S.M.I.KOM',
        //     'lampiran' => $request->lampiran,
        //     'status=' > 'Di Proses',
        //     // 'acc_divisi' => $request->acc_divisi,
        //     // 'acc_direktur' => $request->acc_direktur,
        //     // 'status=' > $request->status,
        // ];



        // dd('asdasda');
        // return redirect('/surat-users')->with(['success' => 'Data Berhasil Disimpan!']);
    <!-- } -->
    // edit surat
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
<!-- } -->


