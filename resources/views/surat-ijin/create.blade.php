<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Post </title>`
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    {{-- // iki penting --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h1 class="h1 text-center my-5">Buat Pengajuan Surat</h1>
                        <form action="{{ route('surat-ijin.store') }}" method="POST">
                            @csrf()


                            {{-- hidden --}}
                            <input type="text" name="acc_divisi" value="{{ old('acc_divisi') }}">
                            <input type="text" name="acc_direktur" value="{{ old('acc_direktur') }}">
                            <input type="text" name="status" value="{{ old('status') }}">

                            <div class="form-group">
                                <label class="font-weight-bold">Jenis</label>
                                <input type="text"
                                    class="form-control @error('jenis') 
                                is-invalid @enderror"
                                    name="jenis" value="{{ old('jenis') }}" placeholder="Masukan Jenis">

                                <!-- error message untuk hal -->
                                @error('jenis')
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


                            <div class="input-group form-group date" id="timePicker1"
                                style="display: flex; flex-direction: column;">
                                <label class="font-weight-bold">Jam Kerja</label>
                                <div class="d-flex flex-row">

                                    <input type="text" style="width: 90%"
                                        class="form-control timePicker1 form-control
                                         @error('jam_kerja') is-invalid @enderror"
                                        name="jam_kerja" value="{{ old('jam_kerja') }}">
                                    <span class="input-group-addon">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </span>
                                </div>

                                <!-- error message untuk jam_kerja_normal -->
                                @error('jam_kerja')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            <div class="input-group form-group date" id="timePicker2"
                                style="display: flex; flex-direction: column;">
                                <label class="font-weight-bold">Jam lembur</label>
                                <div class="d-flex flex-row">

                                    <input type="text" style="width: 90%"
                                        class="form-control timePicker2 form-control
                                         @error('jam_lembur') is-invalid @enderror"
                                        name="jam_lembur" value="{{ old('jam_lembur') }}">
                                    <span class="input-group-addon">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </span>
                                </div>

                                @error('jam_lembur')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>




                            <div class="form-group">
                                <label class="font-weight-bold">Lama</label>
                                <input type="text"
                                    class="form-control @error('lama') 
                                is-invalid @enderror"
                                    name="lama" placeholder="Masukan Lama " value="{{ old('lama') }}">

                                <!-- error message untuk hal -->
                                @error('lama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Lampiran</label>
                                <input type="text"
                                    class="form-control @error('lampiran') 
                                is-invalid @enderror"
                                    name="lampiran" placeholder="Masukan Lampiran " value="{{ old('lampiran') }}">

                                <!-- error message untuk hal -->
                                @error('lampiran')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            {{-- <button type="reset" class="btn btn-md btn-warning">RESET</button> --}}
                            {{-- <button onclick="history.back()" class="btn btn-md btn-primary">KEMBALI</button> --}}
                            <a href="{{ url()->previous() }}" class="btn btn-success">KEMBALI</a>
                            {{-- <button type="reset" class="btn btn-md btn-warning">RESET</button> --}}

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>
    <script>
        CKEDITOR.replace('content');
    </script>

    <script>
        var firstOpen = true;
        var time;

        $('#timePicker1').datetimepicker({
            useCurrent: false,
            format: "hh:mm A"
        }).on('dp.show', function() {
            if (firstOpen) {
                time = moment().startOf('day');
                firstOpen = false;
            } else {
                time = "01:00 PM"
            }
            $(this).data('DateTimePicker').date(time);
        });
    </script>

    <script>
        var firstOpen = true;
        var time;

        $('#timePicker2').datetimepicker({
            useCurrent: false,
            format: "hh:mm A"
        }).on('dp.show', function() {
            if (firstOpen) {
                time = moment().startOf('day');
                firstOpen = false;
            } else {
                time = "01:00 PM"
            }
            $(this).data('DateTimePicker').date(time);
        });
    </script>

</body>

</html>
