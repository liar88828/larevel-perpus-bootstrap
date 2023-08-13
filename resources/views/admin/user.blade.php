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
                        <div class="card-body ">

                            <div class="d-flex justify-content-between px-5">
                                <div class="">
                                    <a href="{{ url()->previous() }}" class="btn btn-secondary ">KEMBALI</a>
                                </div>

                                <div style='display:flex; gap: 2rem'>
                                 <a href="{{ url('admin/user/all') }}" class="px-3 btn  "
                                        style="background: lightsalmon">Semua
                                    </a>

                                    <a href="{{ url('admin/user/Divisi Produksi') }}"
                                        class="px-3 btn btn-primary">Divisi Produksi
                                    </a>

                                    <a href="{{ url('admin/user/Divisi IT') }}" class="px-3 btn btn-success">Divisi IT
                                    </a>

                                    <a href="{{ url('admin/user/Divisi Marketing') }}" class="px-3 btn btn-info">Divisi
                                        Marketing
                                    </a>

                                    <a href="{{ url('admin/user/Divisi Teknik') }}" class="px-3 btn btn-warning">Divisi
                                        Teknik
                                    </a>

                                    <a href="{{ url('admin/user/Divisi News') }}" class="px-3 btn btn-danger">Divisi
                                        News
                                    </a>
                                    
                                </div>
                            </div>
                            <x-table.user :user="$user" />
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
