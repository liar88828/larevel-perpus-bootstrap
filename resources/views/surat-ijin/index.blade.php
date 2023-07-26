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
            /* background: red; */
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
                            {{-- <a href="{{ route('surat-user.create') }}" class="btn btn-md btn-success mb-3">TAMBAH
                                POST</a> --}}
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col"> No.</th>
                                        <th scope="col"> Jenis</th>
                                        <th scope="col"> Keterangan</th>
                                        <th scope="col"> Jam Kerja</th>
                                        <th scope="col"> Jam Lembur</th>
                                        <th scope="col"> lama</th>
                                        <th scope="col"> Acc Divisi</th>
                                        <th scope="col"> Acc Direktur</th>
                                        <th scope="col"> Lampiran</th>
                                        <th scope="col"> Status</th>
                                        <th scope="col"> Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($surat_ijin as $key=>$s)
                                        <tr>
                                            {{-- <td>{{ $loop->index }}</td> --}}
                                            <td>{{ $s->id }}</td>
                                            <td>{{ $s->jenis }}</td>
                                            <td>{{ $s->keterangan }}</td>
                                            <td>{{ $s->jam_kerja }}</td>
                                            <td>{{ $s->jam_lembur }}</td>
                                            <td>{{ $s->lama }}</td>
                                            <td> Safira Nuraiha M.kom

                                                <span class="btn btn-warning">Di Proses</span>

                                            </td>
                                            <td> Heri Pamungkas S.S.M.I.KOM
                                                <span class="btn btn-primary">Di Terima</span>

                                            </td>
                                            {{-- <td>{{ $s->acc_divisi}}</td> --}}
                                            {{-- <td>{{ $s->acc_direktur}}</td> --}}
                                            <td>{{ $s->lampiran }}</td>
                                            <td> <span class="btn btn-success">Belum Mencukupi</span> </td>
                                            {{-- <td>{{ $s->status }}</td> --}}
                                            <td class="text-center">
                                                {{-- --------------------SHOW------------------------------------------------- --}}
                                                <a href="{{ route('surat-ijin.show', $s->id) }}"
                                                    class="btn btn-sm btn-dark">SHOW</a>
                                                {{-- --------------------EDIT------------------------------------------------- --}}
                                                <a href="{{ route('surat-ijin.edit', $s->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                {{-- --------------------DELETE------------------------------------------------- --}}
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('surat-ijin.destroy', $s->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
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
                            {{-- {{ $surat->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <p>{{$success}}</p> --}}

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
