<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Data Post</title>
    <style>
        .judul {
            font-size: 15pt;
        }

        .tulis {
            font-size: 10pt;
            color: black !important;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="bg-white  ">
        <div class="p-2   style="background: blues ; width: calc(210mm + 10%); height: calc(297mm + 10%); ">
            {{-- <h4>{{ $surats->title }}</h4> --}}
            <div class=" text-center lh-sm">
                <p class="judul">SURAT PERMOHONAN IJIN LEMBUR </p>
                <p class="judul">TVKU SEMARANG</p>
            </div>
            <br>
    
            <div class="">
                <p class="tulis">
                    Kepada : Staff HRD TVKU Semarang        <br>
                    Hal : {{ $surat->jenis }}        <br>
                    Dengan ini saya,
            </p>
            </div>

            <div class="">
                <p class='tulis'>
                    Nama : {{auth()->user()->nama}}
                     <br>
                     {{-- {{ $surat->nama }} --}}
                    {{-- {{ $surat->jabatan }} --}}
                    Divisi : Divisi Ti<br>
                    {{-- {{ $surat->divisi }} --}}
                </p>
            </div>

            <div class="">
                <p class="tulis"> Memohon untuk bekerja ekstra pada,</p>

                <div class=" ">

                    <table class="table table-bordered border-dark">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Hari/Tanggal </th>
                                <th>Jam Kerja Normal </th>
                                <th>Jam Kerja Lembur </th>
                                <th>Keterangan/Guna </th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ([20] as $item)
                                
                            @endforeach --}}
                            <tr>
                                <td>1</td>
                                <td>Senin,12/12/2012</td>
                                <td>12:12</td>
                                <td>12:12</td>
                                <td>Tidak sakit</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Senin,12/12/2012</td>
                                <td>12:12</td>
                                <td>12:12</td>
                                <td>Tidak sakit</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Senin,12/12/2012</td>
                                <td>12:12</td>
                                <td>12:12</td>
                                <td>Tidak sakit</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Senin,12/12/2012</td>
                                <td>12:12</td>
                                <td>12:12</td>
                                <td>Tidak sakit</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Senin,12/12/2012</td>
                                <td>12:12</td>
                                <td>12:12</td>
                                <td>Tidak sakit</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Senin,12/12/2012</td>
                                <td>12:12</td>
                                <td>12:12</td>
                                <td>Tidak sakit</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Senin,12/12/2012</td>
                                <td>12:12</td>
                                <td>12:12</td>
                                <td>Tidak sakit</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Senin,12/12/2012</td>
                                <td>12:12</td>
                                <td>12:12</td>
                                <td>Tidak sakit</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Senin,12/12/2012</td>
                                <td>12:12</td>
                                <td>12:12</td>
                                <td>Tidak sakit</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Senin,12/12/2012</td>
                                <td>12:12</td>
                                <td>12:12</td>
                                <td>Tidak sakit</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Senin,12/12/2012</td>
                                <td>12:12</td>
                                <td>12:12</td>
                                <td>Tidak sakit</td>
                            </tr>

                        </tbody>
                    </table>
                    {{-- <p class='tulis'> {{ $surat->no }}</p> --}}
                    {{-- <p class='tulis'>Hari, tanggal : {{ $surat->hari_tanggal }}</p>
                    <p class='tulis'>Waktu kerja normal : {{ $surat->jam_kerja_normal }}</p>
                    <p class='tulis'>Waktu kerja lembur : {{ $surat->jam_kerja_lembur }}</p>
                    <p class='tulis'>Keterangan : {{ $surat->guna }}</p> --}}
                </div>
            </div>

            <div class="">
                <p class='tulis'>Dengan demikian permohonan dari kami, atas persetujuannya kami ucapkan terima kasih
                </p>
            </div>
{{-- -------------------------------------------------------- --}}
            <br>
            <div class="d-flex    justify-content-around">
                <div class="">
                    <p class='tulis'>Pemohon,</p>
                    <br>
                    <br>
                    <p class='tulis'>Nama : Bayu 1223
                        {{-- {{ $surat->nama }} --}}
                    </p>
                    <p class='tulis'>Jabatan : Stafd TI
                        {{-- {{ $surat->jabatan }} --}}
                    </p>
                </div>
                <div class="">
                    <p class='tulis'>Mengetahui,</p>
                    <br>
                    <br>
                    <p class='tulis'>Nama : {{ $surat->acc_divisi }}</p>
                    <p class='tulis'>Jabatan : Manager TI
                        {{-- {{ $surat->jabatan_divisi }} --}}
                    </p>
                </div>
                <div class="">
                    <p class='tulis'>Menyetujui,</p>
                    <br>
                    <br>
                    <p class='tulis'>Nama : {{ $surat->acc_direktur }}</p>
                    <p class='tulis'>Jabatan :
                        {{-- {{ $surat->jabatan_penyetujui }} --}}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
