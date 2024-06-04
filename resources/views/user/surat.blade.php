<x-layout>

    @php
        function formatDate($dateString)
        {
            $date = date_create($dateString);
            $dayNames = ['minggu', 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];
        
            $dayName = $dayNames[date_format($date, 'w')]; // Get the day name in Indonesian
            $day = date_format($date, 'd'); // Get the day
            $month = date_format($date, "F"); // Get the full month name
            $year = date_format($date, 'Y'); // Get the year
        
            // Format the date as "senin, 29 agustus 2023"
        
            // Define the Indonesian month names
            $monthNames = [
                'January' => 'januari',
                'February' => 'februari',
                'March' => 'maret',
                'April' => 'april',
                'May' => 'mei',
                'June' => 'juni',
                'July' => 'juli',
                'August' => 'agustus',
                'September' => 'september',
                'October' => 'oktober',
                'November' => 'november',
                'December' => 'desember',
            ];
        
            // Replace the English month name with the Indonesian month name
            $month = $monthNames[$month];
        
            $formattedDate = "$dayName, $day $month $year";
            return $formattedDate;
        }
    @endphp
    <div class="bg-white  ">
        <div class="p-2   style="background: blues ; width: calc(210mm + 10%); height: calc(297mm + 10%); ">
        <br>
        <div class=" text-center lh-sm">
            <p class="judul">SURAT PERMOHONAN IJIN LEMBUR </p>
            <p class="judul">TVKU SEMARANG</p>
        </div>
        <br>
        <div class="">
            <p class="tulis">
                Kepada : Staff HRD TVKU Semarang        <br>
                Dengan ini saya,
        </p>
        </div>
        <br>
        <div class="">
            <p class='tulis'>
                Nama : {{ $surat[0]->nama }}
                 <br>
                Staff : {{ $surat[0]->anggota }}<br>
            </p>
        </div>
        <br>
        <div class="">
            <p class="tulis"> Memohon untuk bekerja ekstra pada,</p>

            <div class= >
                <table class="table  bBlack">
                    <thead>
                        <tr>
                            <th class='bBlack tulisTable'>No. </th>
                            <th class='bBlack tulisTable'>Nama </th>
                            <th class='bBlack tulisTable'>Hari/Tanggal </th>
                            <th class='bBlack tulisTable'>Hari Kerja Normal </th>
                            <th class='bBlack tulisTable'>Masuk kerja </th>
                            <th class='bBlack tulisTable'>Pulang kerja </th>
                            <th class='bBlack tulisTable'>Masuk lembur</th>
                            <th class='bBlack tulisTable'>Pulang lembur</th>
                            <th class='bBlack tulisTable'>Keterangan/Guna </th>
                        </tr>
                    </thead>
                    <tbody>
                        @unless ($surat->isEmpty())
                                       @foreach ($surat as $key=> $s)
                <tr>

                    <td class='bBlack tulisTable'>{{ $key + 1 }}</td>
                    <td class='bBlack tulisTable nowrap'>{{ $s->nama }}</td>
                    <td class='bBlack tulisTable nowrap'>{{ formatDate($s->hari_tanggal) }}</td>
                    <td class='bBlack tulisTable'>{{ $s->hari_kerja }}</td>
                    <td class='bBlack tulisTable'>{{ $s->mulai_pagi }}</td>
                    <td class='bBlack tulisTable'>{{ $s->akhir_pagi }}</td>
                    <td class='bBlack tulisTable'>{{ $s->mulai_malam }}</td>
                    <td class='bBlack tulisTable'>{{ $s->akhir_malam }}</td>
                    <td class='bBlack tulisTable'
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
                        <td class='bBlack tulisTable'>{{ count($surat) + $i + 1 }}</td>
                        <td class='bBlack tulisTable'>-</td>
                        <td class='bBlack tulisTable'>-</td>
                        <td class='bBlack tulisTable'>-</td>
                        <td class='bBlack tulisTable'>-</td>
                        <td class='bBlack tulisTable'>-</td>
                        <td class='bBlack tulisTable'>-</td>
                        <td class='bBlack tulisTable'>-</td>
                        <td class='bBlack tulisTable'>-</td>
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
    <br>
    <br>
    <br>
    {{-- -------------------------------------------------------- --}}
    <div>
        <table>
            <thead>
                <tr>
                    <td>
                        <div style="margin: 0 2rem  0 0 ">
                            <p class='tulis'>Pemohon,</p>
                            <br>
                            <br>
                            <br>
                            <br>
                            <p class='tulis'>Nama : {{ $surat[0]->nama }} </p>
                            <p class='tulis'> Jabatan : {{ $surat[0]->divisi }}
                            </p>
                        </div>
                    </td>
                    <td>
                        <div style="margin: 0 2rem 0 0  ">
                            <p class='tulis'>Mengetahui,</p>
                            <br>
                            <br>
                            <br>
                            <br>
                            <p class='tulis'>Nama : {{ $surat[0]->nama_manager }}</p>
                            <p class='tulis'>Jabatan : Manager {{ $surat[0]->divisi }}
                            </p>
                        </div>
                    </td>
                    <td>
                        <div>
                            <p class='tulis'>Menyetujui,</p>
                            <br>
                            <br>
                            <br>
                            <br>
                            <p class='tulis '>Nama : Heri Pamungkas S.S.M.I.KOM</p>
                            <p class='tulis'>Jabatan : Direktur Oprasional
                            </p>
                        </div>
                    </td>
                </tr>
            </thead>
        </table>



    </div>
    </div>
    </div>
</x-layout>
