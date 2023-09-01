@props(['user', 'role'])

<table class="table table-bordered ">
    <thead>
        <tr>
            <th scope="col"> No.</th>
            {{-- <th scope="col"> Id</th> --}}
            <th scope="col"> Nama</th>
            <th scope="col"> Email</th>
            @if ($role === 'admin')
                <th scope="col"> Email Valid</th>
                <th scope="col"> Password</th>
            @endif
            <th scope="col"> Jenis Kelamin</th>
            <th scope="col"> Tanggal Lahir</th>
            <th scope="col"> No Hp</th>
            <th scope="col"> Anggota</th>
            <th scope="col"> Divisi</th>
            @if ($role === 'admin')
                <th scope="col"> Aksi</th>
            @endif

        </tr>
    </thead>
    <tbody>
        @forelse ($user as $key=>$u)
            <tr>
                <td>{{ $key + 1 }}</td>
                {{-- <td>{{ $u->id }}</td> --}}
                <td>{{ $u->nama }}</td>
                <td>{{ $u->email }}</td>

                @if ($role === 'admin')
                    <td>{{ $u->email_verified_at }}</td>
                    <td>{{ $u->password }}</td>
                @endif

                <td>{{ $u->jenisKelamin }}</td>
                <td>{{ $u->tanggalLahir }}</td>
                <td>{{ $u->noHp }}</td>
                <td>{{ $u->anggota }}</td>
                <td>{{ $u->divisi }}</td>

                @if ($role === 'admin')
                    <td class="text-center">
                        {{-- --------------------Form DELETE------------------------------------------------- --}}
                        <form class='d-grid gap-2 ' onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('surat-ijin.destroy', $u->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            {{-- --------------------EDIT------------------------------------------------- --}}
                            <a href="{{ route('surat-ijin.edit', $u->id) }}" class="btn btn-sm btn-primary ">EDIT</a>
                            {{-- --------------------DELETE------------------------------------------------- --}}
                            <button type="submit" class="btn btn-sm btn-danger ">HAPUS</button>
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
