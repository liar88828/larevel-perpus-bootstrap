
@props(['surat'])

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
            <th scope="col"> Acc Divisi</th>
            <th scope="col"> Acc Direktur</th>
            <th scope="col"> Status</th>
            <th scope="col"> Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($surat as $key=>$s)
            <tr>
                {{-- <td>{{ $s->id }}</td> --}}
                <td>{{$key+1 }}</td>
                <td>{{ $s->nama }}</td>
                <td>{{ $s->hari_tanggal }}</td>
                <td>{{ $s->keterangan }}</td>
                <td>{{ $s->hari_kerja }}</td>
                <td>{{ $s->mulai_pagi }}</td>
                <td>{{ $s->akhir_pagi }}</td>
                <td>{{ $s->mulai_malam }}</td>
                <td>{{ $s->akhir_malam }}</td>

                <td>
                    <form class=''
                        action="{{ url("admin/surat/edit/{$s->id}/divisi/{$s->acc_divisi}") }}"
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
                    <form class=''
                        action="{{ url("admin/surat/edit/{$s->id}/direktur/{$s->acc_direktur}") }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            class="btn btn-sm btn-{{ $s->acc_direktur === 'Belum Di Terima' ? 'warning' : 'info' }}">
                            {{ $s->acc_direktur }}
                        </button>
                    </form>
                </td>
                <td>
                    <span
                        class="btn btn-sm btn-{{ $s->acc_divisi=== 'Di Terima'  && $s->acc_direktur === 'Di Terima' ? 'info' : 'warning' }}">
                        {{ $s->acc_divisi=== 'Di Terima'  && $s->acc_direktur === 'Di Terima' ? 'Mencukupi' : 'Belum Mencukupi' }}

                    </span>
                </td>

                <td class="text-center">
                    {{-- --------------------DELETE------------------------------------------------- --}}
                    <form class='' onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('surat-ijin.destroy', $s->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        {{-- --------------------EDIT------------------------------------------------- --}}
                        <a href="{{ route('surat-ijin.edit', $s->id) }}"
                            class="btn btn-sm btn-primary btn-lg btn-block mb-1">EDIT</a>
                        <button type="submit" class="btn btn-sm btn-danger ">HAPUS</button>
                    </form>
                </td>
            </tr>
        @empty
            <div class="alert alert-danger">
                Data Post belum Tersedia.
            </div>
        @endforelse
    </tbody>
</table>
