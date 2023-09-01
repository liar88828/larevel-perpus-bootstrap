@props(['lupa'])


<table class="table table-bordered" >
    {{-- <caption>Form Ganti Password</caption> --}}
    <thead>
        <tr>
            <th scope="col"> No.</th>
            <th scope="col"> Nama</th>
            <th scope="col"> Email</th>
            <th scope="col"> Password</th>
            <th scope="col"> No Hp</th>
            <th scope="col"> Anggota</th>
            <th scope="col"> Divisi</th>
            <th scope="col"> Aksi</th>

        </tr>
    </thead>
    <tbody>
        @forelse ($lupa as $key=>$u)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $u->nama }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->password }}</td>
                <td>{{ $u->noHp }}</td>
                <td>{{ $u->anggota }}</td>
                <td>{{ $u->divisi }}</td>
                <td class="text-center">
                    {{-- -------------------- form ganti password ------------------------------------------------- --}}
                    <a href="{{ route('admin.lupa.edit', $u->id) }}"
                        class="btn btn-sm btn-primary btn-lg btn-block mb-1">Ganti Password</a>
                </td>
            </tr>
        @empty
            <div class="alert alert-danger">
                Data Post belum Tersedia.
            </div>
        @endforelse
    </tbody>
</table>
