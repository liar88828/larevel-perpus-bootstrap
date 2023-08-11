<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <!------ Include the above in your HEAD tag ---------->
    <div class="m-5 border  border-2 p-2 rounded">

        <div class="container emp-profile ">

            <form method="post">

                <div class="row border border-2 p-2">
                    <div class="col-md-4">
                        <div class="profile-img ">
                            <div class=" d-flex  justify-content-center my-3">

                                <img style="width: 50%; height:auto;"
                                    src="https://upload.wikimedia.org/wikipedia/id/thumb/9/91/TVKU-BChannel.png/800px-TVKU-BChannel.png"
                                    alt="" class="rounded" />
                            </div>

                            <div class="d-flex  justify-content-center m-2 ">
                                <img src='{{ asset('/profile.png') }}' alt="" class="rounded"
                                    style="width: 60%; height: auto" />
                            </div>

                            <div class="col-md-2 mt-3">
                                <a class="btn btn-success text-nowrap p-2 " 
                                href="{{ Route('surat-ijin.create') }}">
                                    Buat Ijin Lembur </a>
                            </div>
                            {{-- Href Create --}}

                            <div class="col-md-2 mt-3">
                                <a class="btn btn-primary text-nowrap p-2  "
                                href="{{ Route('surat-ijin.index') }}">
                                    Status Surat
                                </a>
                            </div>
                            <div class="col-md-2 mt-3">
                                <a class="btn btn-warning text-nowrap p-2  "
                                href="{{ Route('profile.surat') }}">
                                    Print Surat
                                </a>
                            </div>

                            {{-- <div class="col-md-2 mt-3">
                                <a class="btn btn-warning text-nowrap p-2  ">
                                </a>
                            </div> --}}
                            <br>
                            <form class="col-md-2 mt-3" method="POST" action="logout">
                                @csrf
                                <button type="submit" class="btn btn-danger text-nowrap p-2  ">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>


                    <div class="col-md-6 border border-2 rounded m-2">
                        <div class="profile-head p-3">

                            <a class="nav-link active bg-gray border-bottom border-2 mb-5 h3" id="home-tab"
                                data-toggle="tab" href="#home" role="tab" aria-controls="home"
                                aria-selected="true">
                                Profile
                            </a>
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>User Id</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ auth()->user()->id }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nama</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ auth()->user()->nama }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Jenis Kelamin</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ auth()->user()->jenisKelamin }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ auth()->user()->email }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Tanggal Lahir</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ auth()->user()->tanggalLahir }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ auth()->user()->noHp }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Jabatan</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ auth()->user()->jabatan }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Anggota</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ auth()->user()->anggota }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Divisi</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ auth()->user()->divisi }}</p>

                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>


                </div>



            </form>
        </div>


    </div>




</body>

</html>
