<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Posts - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        .membesar {
            width: 120px;
        }
    </style>
</head>

<body style="background: lightgray">
    <div class="d-flex justify-content-center ">
        <div style="overflow-x:scroll ">
            <div class="row">
                <div class="">
                    <div>
                        <h3 class="text-center my-4">Table Ijin Lembur</h3>
                        <hr>
                    </div>
                    <div class="mx-4">
                        @if (session('login'))
                            <div class="card-body"></div>
                            <div class="alert alert-success px-5" role="alert">
                                {{ session('login') }}
                            </div>
                        @elseif (session('error'))
                            <div class="card-body"></div>
                            <div class="alert alert-warning " role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>

                    <div class="card border-0 shadow-sm rounded mx-4">
                        <div class="card-body">
                    
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">KEMBALI</a>
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
                                    {{-- {{dd($user)}} --}}
                                    @forelse ($user as $key=>$u)
                                        <tr>
                                            <td>{{ $u->key }}</td>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        message with toastr
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>

</body>

</html>
