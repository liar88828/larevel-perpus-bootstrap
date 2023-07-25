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
                            <a href="{{ route('surat-users.create') }}" class="btn btn-md btn-success mb-3">TAMBAH
                                POST</a>
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
                                    @forelse ($suratUsers as $key=>$suratUser)
                                        <tr>
                                            {{-- <td>{{ $loop->index }}</td> --}}
                                            <td>{{ $suratUser->id }}</td>
                                            <td>{{ $suratUser->jenis }}</td>
                                            <td>{{ $suratUser->keterangan }}</td>
                                            <td>{{ $suratUser->jam_kerja }}</td>
                                            <td>{{ $suratUser->jam_lebur }}</td>
                                            <td>{{ $suratUser->lama }}</td>
                                            <td> Safira Nuraiha M.kom </td>
                                            <td> Heri Pamungkas S.S.M.I.KOM </td>
                                            {{-- <td>{{ $suratUser->acc_divisi}}</td> --}}
                                            {{-- <td>{{ $suratUser->acc_direktur}}</td> --}}
                                            <td>{{ $suratUser->lampiran }}</td>
                                            <td> Di Terima </td>
                                            {{-- <td>{{ $suratUser->status }}</td> --}}
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('surat.destroy', $suratUser->id) }}"
                                                    method="POST">

                                                    <a href="{{ route('surat.show', $suratUser->id) }}"
                                                        class="btn btn-sm btn-dark">SHOW</a>

                                                    <a href="{{ route('surat.edit', $suratUser->id) }}"
                                                        class="btn btn-sm btn-primary">EDIT</a>
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
