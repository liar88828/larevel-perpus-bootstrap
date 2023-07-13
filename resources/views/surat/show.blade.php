<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Data Post</title>
    <style>
        .judul {
            font-size: 30pt;
        }

        .tulis {
            font-size: 16pt;
            color: black !important;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">
    <div class=""style='border:1px solid black;'>

        <div class="p-2 ml-5" style="background: blues ;width: calc(210mm + 10%); height: calc(297mm + 10%); ">
            {{-- <h4>{{ $surats->title }}</h4> --}}
            <div class=" text-center">
                <p class="judul">SURAT PERMOHONAN IJIN LEMBUR </p>
                <p class="judul">TVKU SEMARANG</p>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="">
                <p class="tulis">Kepada : {{ $surat->kepada }}</p>
                <p class="tulis">Hal : {{ $surat->hal }}</p>
                <p class="tulis">Dengan ini saya,</p>
            </div>

            <br>
            <div class="">
                <p class='tulis'>Nama : {{ $surat->nama }}</p>
                <p class='tulis'>Jabatan : {{ $surat->jabatan }}</p>
                <p class='tulis'>Divisi : {{ $surat->divisi }}</p>
            </div>

            <br>
            <div class="">
                <p class="tulis"> Memohon untuk bekerja ekstra pada,</p>






                <div class="px-5">

                    {{-- <p class='tulis'> {{ $surat->no }}</p> --}}
                    <p class='tulis'>Hari, tanggal : {{ $surat->hari_tanggal }}</p>
                    <p class='tulis'>Waktu kerja normal : {{ $surat->jam_kerja_normal }}</p>
                    <p class='tulis'>Waktu kerja lembur : {{ $surat->jam_kerja_lembur }}</p>
                    <p class='tulis'>Keterangan : {{ $surat->guna }}</p>
                </div>

                

            </div>

            <br>
            <div class="">
                <p class='tulis'>Dengan demikian permohonan dari kami, atas persetujuannya kami ucapkan terima kasih
                </p>
            </div>

            <br>
            <br>
            <div class="d-flex    justify-content-around">
                <div class="">
                    <p class='tulis'>Pemohon,</p>
                    <br>
                    <br>
                    <br>
                    <br>

                    <p class='tulis'>Nama : {{ $surat->nama }}</p>
                    <p class='tulis'>Jabatan : {{ $surat->jabatan }}</p>
                </div>



                <div class="">
                    <p class='tulis'>Mengetahui,</p>
                    <br>
                    <br>
                    <br>
                    <br>

                    <p class='tulis'>Nama : {{ $surat->nama_divisi }}</p>
                    <p class='tulis'>Jabatan : {{ $surat->jabatan_divisi }}</p>
                </div>



                <div class="">
                    <p class='tulis'>Menyetujui,</p>
                    <br>
                    <br>
                    <br>
                    <br>

                    <p class='tulis'>Nama : {{ $surat->nama_penyetujui }}</p>
                    <p class='tulis'>Jabatan : {{ $surat->jabatan_penyetujui }}</p>
                </div>

            </div>



        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
