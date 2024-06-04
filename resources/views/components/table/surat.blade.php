@props(['surat'])

@php
    function formatDate($dateString)
    {
        $date = date_create($dateString);
        $dayNames = ['minggu', 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];
    
        $dayName = $dayNames[date_format($date, 'w')]; // Get the day name in Indonesian
        $day = date_format($date, 'd'); // Get the day
        $month = date_format($date, 'F'); // Get the full month name
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
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col"> No.</th>
            <th scope="col"> Nama</th>
            <th scope="col"> Hari/Tanggal</th>
            <th scope="col"> Keterangan</th>
            <th scope="col"> Hari Kerja</th>
            <th scope="col"> Mulai Pagi</th>
            <th scope="col"> Akhir Pagi</th>
            <th scope="col"> Mulai Malam</th>
            <th scope="col"> Akhir Malam</th>
            <th scope="col"> Nama Manager</th>
            <th scope="col"> Acc Divisi</th>
            <th scope="col"> Status</th>
            @if (strtolower(auth()->user()->anggota) === 'admin')
                <th scope="col"> Aksi</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @forelse ($surat as $key=>$s)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td class="nowrap">{{ $s->nama }}</td>
                <td class="nowrap">{{ formatDate($s->hari_tanggal) }}</td>
                <td>{{ $s->keterangan }}</td>
                <td>{{ $s->hari_kerja }}</td>
                <td>{{ $s->mulai_pagi }}</td>
                <td>{{ $s->akhir_pagi }}</td>
                <td>{{ $s->mulai_malam }}</td>
                <td>{{ $s->akhir_malam }}</td>
                <td>{{ $s->nama_manager }}</td>

                <td>
                    <form class=''
                        action="{{ route('admin.surat.edit', [
                            'id' => $s->id,
                            'option' => 'divisi',
                            'value' => $s->acc_divisi,
                            'divisi' => $s->divisi,
                        ]) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            class="btn btn-sm btn-{{ $s->acc_divisi === 'Belum Di Terima' ? 'warning' : 'info' }}">
                            {{ $s->acc_divisi }}
                        </button>
                    </form>
                </td>


                <td>
                    <span class="btn btn-sm btn-{{ $s->acc_divisi === 'Di Terima' ? 'info' : 'warning' }}">
                        {{ $s->acc_divisi === 'Di Terima' ? 'Mencukupi' : 'Belum Mencukupi' }}

                    </span>
                </td>

                @if (strtolower(auth()->user()->anggota) === 'admin')
                    <td class="text-center">
                        {{-- --------------------DELETE------------------------------------------------- --}}
                        <form class='d-grid gap-2 ' onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('admin.surat.delete', $s->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger ">HAPUS</button>
                            {{-- --------------------EDIT------------------------------------------------- --}}

                            <a href="{{ route('surat-ijin.edit', $s->id) }}" class="btn btn-sm btn-primary ">EDIT</a>
                            {{-- PRINT SURAT --}}
                            {{-- <a href="{{ route('admin.surat.print', $s->user_id) }}"
                                class="btn btn-sm btn-success ">
                                PRINT
                            </a> --}}
                            @if ($s->acc_divisi === 'Di Terima')
                                <a href="{{ url('/admin/download/' . $s->user_id) }}" class="btn btn-sm btn-warning ">
                                    DOWNLOAD
                                </a>
                            @endif
                        </form>
                    </td>
                @endif
            </tr>
        @empty
            <div class="alert alert-danger">
                Data Post belum Tersedia.
            </div>
        @endforelse
    </tbody>
</table>
