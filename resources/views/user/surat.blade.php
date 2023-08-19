<x-layout>

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
                {{-- Hal : {{ $surat->jenis }}        <br> --}}
                Dengan ini saya,
        </p>
        </div>
            {{-- {{dd($surat->user()->get())}} --}}
        <div class="">
            <p class='tulis'>
                Nama : {{ $surat[0]->nama }}
                 <br>
                 {{-- {{ $surat->nama }} --}}
                Staff : {{ $surat[0]->anggota }}<br>
                {{-- {{ $surat->divisi }} --}}
            </p>
        </div>
          
        <div class="">
            <p class="tulis"> Memohon untuk bekerja ekstra pada,</p>

            <div class= >
                <table class="table table-bordered border-dark">
                    <thead>
                        <tr>
                            <th class='tulisTable'>No. </th>
                            <th class='tulisTable'>Nama </th>
                            <th class='tulisTable'>Hari/Tanggal </th>
                            <th class='tulisTable'>Hari Kerja Normal </th>
                            <th class='tulisTable'>Masuk kerja </th>
                            <th class='tulisTable'>Pulang kerja </th>
                            <th class='tulisTable'>Masuk lembur</th>
                            <th class='tulisTable'>Pulang lembur</th>
                            <th class='tulisTable'>Keterangan/Guna </th>
                        </tr>
                    </thead>
                    <tbody>
                        @unless ($surat->isEmpty())
                                                 @foreach ($surat as $key=> $s)
                <tr>
                    <td class='tulisTable'>{{ $key + 1 }}</td>
                    <td class='tulisTable'>{{ $s->nama }}</td>
                    <td class='tulisTable'>{{ $s->hari_tanggal }}</td>
                    <td class='tulisTable'>{{ $s->hari_kerja }}</td>
                    <td class='tulisTable'>{{ $s->mulai_pagi }}</td>
                    <td class='tulisTable'>{{ $s->akhir_pagi }}</td>
                    <td class='tulisTable'>{{ $s->mulai_malam }}</td>
                    <td class='tulisTable'>{{ $s->akhir_malam }}</td>
                    <td class='tulisTable'
                        style=" 
                           overflow: hidden;
                           text-overflow: ellipsis;
                           max-width:5rem;
                            white-space: nowrap;

                           ">
                        {{ $s->keterangan }}</td>
                </tr>
                @endforeach

                @for ($i = 0; $i < 10 - count($surat); $i++)
                    <tr>
                        <td class='tulisTable'>{{ count($surat) + $i + 1 }}</td>
                        <td class='tulisTable'>-</td>
                        <td class='tulisTable'>-</td>
                        <td class='tulisTable'>-</td>
                        <td class='tulisTable'>-</td>
                        <td class='tulisTable'>-</td>
                        <td class='tulisTable'>-</td>
                        <td class='tulisTable'>-</td>
                        <td class='tulisTable'>-</td>
                    </tr>
                @endfor
            @else
                <tr>
                    <td>0</td>
                    <td>Data kosong</td>
                </tr>
            @endunless

            </tbody>
            </table>
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
            <p class='tulis'>Nama : {{ $surat[0]->nama }} </p>
            <p class='tulis'> Jabatan : {{ $surat[0]->divisi }}
            </p>
        </div>
        <div class="">
            <p class='tulis'>Mengetahui,</p>
            <br>
            <br>
            <p class='tulis'>Nama : XXX</p>
            <p class='tulis'>Jabatan : {{ $surat[0]->divisi }}
            </p>
        </div>
        <div class="">
            <p class='tulis'>Menyetujui,</p>
            <br>
            <br>
            <p class='tulis'>Nama : Heri Pamungkas S.S.M.I.KOM</p>
            <p class='tulis'>Jabatan : Direktur Oprasional
            </p>
        </div>
    </div>
    </div>
    </div>
</x-layout>
