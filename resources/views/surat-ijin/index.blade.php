<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Posts</title>
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

                            <a class="btn btn-success" href="{{ Route('surat-ijin.create') }}">
                                BUAT IJIN</a>

                            <a href="{{ url()->previous() }}" class="btn btn-secondary">KEMBALI</a>

                            {{-- <a href="{{ route('surat-user.create') }}" class="btn btn-md btn-success mb-3">TAMBAH
                                POST</a> --}}
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col"> No.</th>
                                        {{-- <th scope="col"> Jenis</th> --}}
                                        <th scope="col"> Nama</th>
                                        <th scope="col"> Hari/Tanggal</th>
                                        <th scope="col"> Keterangan</th>
                                        <th scope="col"> Hari Kerja</th>
                                        <th scope="col"> Mulai Pagi</th>
                                        <th scope="col"> Akhir Pagi</th>
                                        <th scope="col"> Mulai Malam</th>
                                        <th scope="col"> Akhir Malam</th>
                                        {{-- <th scope="col"> lama</th> --}}
                                        <th scope="col"> Acc Divisi</th>
                                        {{-- <th scope="col"> Lampiran</th> --}}
                                        <th scope="col"> Status</th>
                                        <th scope="col"> Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($surat_ijin as $key=>$s)
                                        <tr>
                                            <td>{{ $s->id }}</td>
                                            <td>{{ $s->nama }}</td>
                                            <td>{{ $s->hari_tanggal }}</td>
                                            <td>{{ $s->keterangan }}</td>
                                            <td>{{ $s->hari_kerja }}</td>
                                            <td>{{ $s->mulai_pagi }}</td>
                                            <td>{{ $s->akhir_pagi }}</td>
                                            <td>{{ $s->mulai_malam }}</td>
                                            <td>{{ $s->akhir_malam }}</td>
                                            <td>
                                                <span
                                                    class="btn btn-{{ $s->acc_divisi === 'Belum Di Terima' ? 'warning' : 'info' }}">{{ $s->acc_divisi }}</span>

                                            </td>
                                         
                                            <td
                                                class="btn btn-sm btn-{{ $s->acc_divisi === 'Di Terima'   ? 'info' : 'warning' }}">
                                                {{ $s->acc_divisi === 'Di Terima'  ? 'Mencukupi' : 'Belum Mencukupi' }}
                                            </td>
                                            {{-- <td>{{ $s->status }}</td> --}}
                                            <td class="text-center">
                                                {{-- --------------------SHOW------------------------------------------------- --}}
                                                {{-- <a href="{{ route('surat-ijin.show', $s->id) }}"
                                                    class="btn btn-sm btn-dark">
                                                    SHOW
                                                </a> --}}

                                                {{-- --------------------DELETE------------------------------------------------- --}}
                                                <form class='' onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('surat-ijin.destroy', $s->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    {{-- --------------------EDIT------------------------------------------------- --}}


                                                    
                                                    <a href="{{ route('surat-ijin.edit', $s->id) }}"
                                                        class="btn btn-sm btn-primary btn-lg btn-block mb-1">
                                                        EDIT
                                                    </a>

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
