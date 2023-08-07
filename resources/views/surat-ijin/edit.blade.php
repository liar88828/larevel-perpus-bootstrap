<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('surat.update', $surat->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Kepada</label>
                                <input type="text" class="form-control @error('kepada') is-invalid @enderror"
                                    name="kepada" value='Staff HRD TVKU Semarang ' value="{{ old('kepada',$surat->kepada) }}"
                                    placeholder="Keterangan HRD">

                                <!-- error message untuk kepada -->
                                @error('kepada')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Hal</label>
                                <input type="text" class="form-control @error('hal') is-invalid @enderror"
                                    name="hal"  value="{{ old('hal',$surat->hal) }}"  placeholder="Keterangan apa"
                               >

                                <!-- error message untuk hal -->
                                @error('hal')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ old('nama',$surat->nama) }}" placeholder="Masukkan nama Post">

                                <!-- error message untuk nama -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jabatan</label>
                                <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                    name="jabatan" value="{{ old('jabatan',$surat->jabatan) }}" placeholder="Masukkan Jabatan Post">

                                <!-- error message untuk jabatan -->
                                @error('jabatan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Devisi</label>
                                <input type="text" class="form-control @error('divisi') is-invalid @enderror"
                                    name="divisi" value="{{ old('divisi',$surat->divisi) }}" placeholder="Masukkan devisi Post">

                                <!-- error message untuk divisi -->
                                @error('divisi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- no --}}
                            <div class="form-group">
                                <label class="font-weight-bold">No</label>
                                <input type="text" class="form-control @error('no') is-invalid @enderror"
                                    name="no" value="{{ old('no',$surat->no) }}" placeholder="Masukkan No Post">

                                <!-- error message untuk no -->
                                @error('no')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Hari/Tanggal</label>
                                <input type="date" class="form-control @error('hari_tanggal') is-invalid @enderror"
                                    name="hari_tanggal" value="{{ old('hari_tanggal',$surat->hari_tanggal) }}"
                                    placeholder="Masukkan Hari/Tanggal Post">

                                <!-- error message untuk hari_tanggal -->
                                @error('hari_tanggal')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            {{-- <div class=""> --}}
                            <div class="input-group form-group date" id="timePicker"
                                style="display: flex; flex-direction: column;">
                                <label class="font-weight-bold">Jam Kerja Normal</label>
                                <div class="d-flex flex-row">

                                    <input type="text" style="width: 90%"
                                        class="form-control timePicker form-control @error('jam_kerja_normal') is-invalid @enderror"
                                        name="jam_kerja_normal" value="{{ old('jam_kerja_normal',$surat->jam_kerja_normal) }}"
                                        placeholder="Masukkan Jam Kerja Normal Post">
                                    <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </span>
                                </div>

                                <!-- error message untuk jam_kerja_normal -->
                                @error('jam_kerja_normal')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>





                            <div class="input-group form-group date" id="timePicker2"
                                style="display: flex; flex-direction: column;">
                                <label class="font-weight-bold">Jam Kerja Lembur</label>
                                <div class="d-flex flex-row">

                                    <input type="text" style="width: 90%"
                                        class="form-control timePicker2 form-control @error('jam_kerja_lembur') is-invalid @enderror"
                                        name="jam_kerja_lembur" value="{{ old('jam_kerja_lembur',$surat->jam_kerja_lembur) }}"
                                        placeholder="Masukkan Jam Kerja Lembur Post">
                                    <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </span>
                                </div>
                                {{-- </div> --}}
                                {{-- 
                                <input type="text"
                                    class="form-control @error('jam_kerja_lembur') is-invalid @enderror"
                                    name="jam_kerja_lembur" value="{{ old('jam_kerja_lembur') }}"
                                    placeholder="Masukkan Jam Kerja Normal Post"> --}}

                                <!-- error message untuk jam_kerja_lembur -->
                                @error('jam_kerja_lembur')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Guna</label>
                                <textarea class="form-control @error('guna') is-invalid @enderror" name="guna" rows="5"
                                    placeholder="Masukkan GunaPost">{{ old('guna',$surat->guna) }}</textarea>

                                <!-- error message untuk guna -->
                                @error('guna')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="font-weight-bold">Nama Admin</label>
                                <input type="text" class="form-control @error('nama_divisi') is-invalid @enderror"
                                    name="nama_divisi" value="{{ old('nama_divisi',$surat->nama_divisi) }}"
                                    placeholder="Masukkan Nama Admin">

                                <!-- error message untuk nama_divisi -->
                                @error('nama_divisi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jabatan Admin</label>


                                <input type="text"
                                    class="form-control @error('jabatan_divisi') is-invalid @enderror"
                                    name="jabatan_divisi" value="{{ old('jabatan_divisi',$surat->jabatan_divisi) }}"
                                    placeholder="Masukkan Jabatan Admin">

                                <!-- error message untuk jabatan_divisi -->
                                @error('jabatan_divisi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama HRD</label>
                                <input type="text"
                                    class="form-control @error('nama_penyetujui') is-invalid @enderror"
                                    name="nama_penyetujui" value="{{ old('nama_penyetujui',$surat->nama_penyetujui) }}"
                                    placeholder="Masukkan Nama HRD">

                                <!-- error message untuk nama_penyetujui -->
                                @error('nama_penyetujui')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jabatan HRD</label>
                                <input type="text"
                                    class="form-control @error('jabatan_penyetujui') is-invalid @enderror"
                                    name="jabatan_penyetujui"value="{{ old('jabatan_penyetujui', $surat->jabatan_penyetujui) }}"
                                    placeholder="Masukkan Jabatan HRD">

                                <!-- error message untuk jabatan_penyetujui -->
                                @error('jabatan_penyetujui')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  value="{{ old('title', $post->title) }} --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
</body>

</html>
