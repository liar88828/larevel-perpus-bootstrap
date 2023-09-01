<x-layout>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h1 class="h1 text-center my-5">Buat Pengajuan Surat</h1>
                        <form action="{{ route('surat-ijin.store') }}" method="POST">
                            @csrf()
                            {{-- hidden --}}
                            <input type="hidden" name="acc_divisi" value="{{ old('acc_divisi') }}">
                            <input type="hidden" name="status" value="{{ old('status') }}">
                            <input type="hidden" name="status" value="{{ old('nama_manager') }}">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="nama" value="{{ auth()->user()->nama }}">
                            <div class="form-group">
                                <label class="font-weight-bold">Hari/Tanggal</label>
                                <input type="date"
                                    class="form-control @error('hari_tanggal') 
                                is-invalid @enderror"
                                    name="hari_tanggal" value="{{ old('hari_tanggal') }}"
                                    placeholder="Masukan Hari dan Tanggal">

                                <!-- error message untuk hal -->
                                @error('hari_tanggal')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="font-weight-bold">Keterangan</label>
                                <input type="text"
                                    class="form-control @error('keterangan') 
                                is-invalid @enderror"
                                    name="keterangan" value="{{ old('keterangan') }}" placeholder="Masukan Keterangan ">

                                <!-- error message untuk hal -->
                                @error('keterangan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group mb-3">
                                <label class="font-weight-bold mb-3">Hari Kerja</label>
                                <select class="form-control @error('hari_kerja') is-invalid @enderror" name="hari_kerja"
                                    value="{{ old('hari_kerja') }}" placeholder="Masukkan Hari Kerja">
                                    <option value="Hari Normal">Hari Normal</option>
                                    <option value="Hari Libur">Hari Libur</option>
                                </select>

                                <!-- error message untuk nama -->
                                @error('hari_kerja')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <h5 class="h5 ">Jam Pagi</h5>
                            <hr>
                            <div class="d-flex flex-col">
                                <div class="input-group form-group date" id="mulai_pagi"
                                    style="display: flex; flex-direction: column;">
                                    <label class="font-weight-bold">Masuk kerja</label>
                                    <div class="d-flex flex-row">

                                        <input type="text" style="width: 90%"
                                            class="form-control mulai_pagi form-control
                                         @error('mulai_pagi') is-invalid @enderror"
                                            name="mulai_pagi" value="{{ old('mulai_pagi') ?? '-' }}">
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        </span>
                                    </div>

                                    <!-- error message untuk mulai_pagi_normal -->
                                    @error('mulai_pagi')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="input-group form-group date" id="akhir_pagi"
                                    style="display: flex; flex-direction: column;">
                                    <label class="font-weight-bold">Pulang kerja</label>
                                    <div class="d-flex flex-row">

                                        <input type="text" style="width: 90%"
                                            class="form-control akhir_pagi form-control
                                     @error('akhir_pagi') is-invalid @enderror"
                                            name="akhir_pagi" value="{{ old('akhir_pagi') ?? '-' }}">
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        </span>
                                    </div>

                                    <!-- error message untuk akhir_pagi_normal -->
                                    @error('akhir_pagi')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <h5 class='h5'>Jam Lembur</h5>
                            <hr>

                            <div class="d-flex flex-col">
                                <div class="input-group form-group date" id="mulai_malam"
                                    style="display: flex; flex-direction: column;">
                                    <label class="font-weight-bold">Masuk lembur</label>
                                    <div class="d-flex flex-row">

                                        <input type="text" style="width: 90%"
                                            class="form-control mulai_malam form-control
                                         @error('mulai_malam') is-invalid @enderror"
                                            name="mulai_malam" value="{{ old('mulai_malam') ?? '-' }}">
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        </span>
                                    </div>

                                    <!-- error message untuk mulai_malam_normal -->
                                    @error('mulai_malam')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="input-group form-group date" id="akhir_malam"
                                    style="display: flex; flex-direction: column;">
                                    <label class="font-weight-bold">Pulang lembur</label>
                                    <div class="d-flex flex-row">

                                        <input type="text" style="width: 90%"
                                            class="form-control akhir_malam form-control
                                     @error('akhir_malam') is-invalid @enderror"
                                            name="akhir_malam" value="{{ old('akhir_malam') ?? '-' }}">
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        </span>
                                    </div>

                                    <!-- error message untuk akhir_malam_normal -->
                                    @error('akhir_malam')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-success">SIMPAN</button>
                            <a href="{{ url('/user') }}" class="btn btn-secondary">KEMBALI</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
