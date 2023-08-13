
@props(['user'])

<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col"> No.</th>
            <th scope="col"> Id</th>
            <th scope="col"> Nama</th>
            <th scope="col"> Email</th>
            <th scope="col"> Email Valid</th>
            <th scope="col"> Password</th>
            <th scope="col"> Jenis Kelamin</th>
            <th scope="col"> Tanggal Lahir</th>
            <th scope="col"> No Hp</th>
            <th scope="col"> Anggota</th>
            <th scope="col"> Jabatan</th>
            <th scope="col"> Divisi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($user as $key=>$u)
            <tr>
                <td>{{  $key+1 }}</td>
                <td>{{ $u->id }}</td>
                <td>{{ $u->nama }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->email_verified_at }}</td>
                <td>{{ $u->password }}</td>
                <td>{{ $u->jenisKelamin }}</td>
                <td>{{ $u->tanggalLahir }}</td>
                <td>{{ $u->noHp }}</td>
                <td>{{ $u->anggota }}</td>
                <td>{{ $u->jabatan }}</td>
                <td>{{ $u->divisi }}</td>
                <td class="text-center">
                    {{-- --------------------DELETE------------------------------------------------- --}}
                    <form class='' onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('surat-ijin.destroy', $u->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        {{-- --------------------EDIT------------------------------------------------- --}}
                        <a href="{{ route('surat-ijin.edit', $u->id) }}"
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