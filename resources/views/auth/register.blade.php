<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="row justify-content-center mt-5 py-5">
        <div class="col-lg-4">


            <div class="d-flex justify-content-center">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQhcuMdNdqvLtJHGan35ZrEk8QUh4B7DZ_THg&usqp=CAU"
                    alt="tvku" style="width:30%;height: auto;">
            </div>



            <div class="card">
                <div class="card-header">
                    <h1 class="card-tittle">Register</h1>
                </div>

                <div class="card-body mb-3">

                    @if (session('success'))
                        <div class="card-body"></div>
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @elseif (session('error'))
                        <div class="card-body"></div>
                        <div class="alert alert-warning" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif


                    <form action="{{ route('register') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label class="font-weight-bold mb-3">Nama</label>
                            <input class="form-control @error('nama') is-invalid @enderror" name="nama"
                                type="text" placeholder="Masukkan Nama"  value="{{old('nama')}}"  />

                            <!-- error message untuk nama -->
                            @error('nama')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="form-group mb-3">
                            <p>Masukan Jenis Kelamin</p>
                            <div class="form-check">
                                <input class="form-check-input"
                                    class="form-control @error('jenisKelamin') is-invalid @enderror" 
                                    type="radio"
                                    value="Laki-laki"

                                    name="jenisKelamin" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Laki Laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input"
                                    class="form-control @error('jenisKelamin') is-invalid @enderror" 
                                    type="radio"
                                    name="jenisKelamin" 
                                    id="flexRadioDefault1"
                                    value="Perempuan"
                                    >
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Perempuan
                                </label>
                            </div>
                        </div>

                        <!-- error message untuk nama -->
                        @error('jenisKelamin')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                </div>






                {{-- 
                        <div class="mb-3">
                            <label for="name" class="form-label"></label>
                            <input type="email" name="nama"  class="form-control" id="name" placeholder="example" required>
                        </div> --}}


                <div class="form-group mb-3">
                    <label class="font-weight-bold mb-3">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        placeholder="Masukkan Email"
                        value="{{old('email')}}" 
                        />

                    <!-- error message untuk nama -->
                    @error('email')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>



                <div class="form-group mb-3">
                    <label class="font-weight-bold mb-3">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tanggalLahir') is-invalid @enderror"
                        name="tanggalLahir"
                        value="{{old('tanggalLahir')}}" 
                        />

                    <!-- error message untuk nama -->
                    @error('tanggalLahir')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="form-group mb-3">
                    <label class="font-weight-bold mb-3">No.Hp</label>
                    <input type="number" class="form-control @error('noHp') is-invalid @enderror" name="noHp" value="{{old('noHp')}}" 
                        placeholder="Masukkan No.Hp" />

                    <!-- error message untuk nama -->
                    @error('noHp')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>



                <div class="form-group mb-3">
                    <label class="font-weight-bold mb-3">Anggota</label>
                    <select class="form-control @error('anggota') is-invalid @enderror" name="anggota"  value="{{old('anggota')}}" 
                        placeholder="Masukkan Anggota">
                        <option value="Staff">Staff</option>
                        <option value="Kepala">Kepala</option>
                        <option value="Manager">Manager</option>
                    </select>

                    <!-- error message untuk nama -->
                    @error('anggota')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold mb-3">Pilih Jabatan</label>
                    <select class="form-control @error('jabatan') is-invalid @enderror" name="jabatan"  value="{{old('jabatan')}}" 
                        placeholder="Masukkan Jabatan">
                        <option value="Manager Produksi">Manager Produksi</option>
                        <option value="Manager IT">Manager IT</option>
                        <option value="Manager Marketing">Manager Marketing</option>
                        <option value="Manager Teknik">Manager Teknik</option>
                        <option value="Manager Kepala News">Manager Kepala News</option>
                        <option value="Manager Keuangan & HRD">Manager Keuangan & HRD</option>
                    </select>

                    <!-- error message untuk nama -->
                    @error('jabatan')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold mb-3">Pilih Divisi</label>
                    <select class="form-control @error('divisi') is-invalid @enderror" name="divisi"    value="{{old('divisi')}}" 
                        placeholder="Masukkan Divisi">
                        <option value="Divisi Produksi">Divisi Produksi</option>
                        <option value="Divisi IT">Divisi IT</option>
                        <option value="Divisi Marketing">Divisi Marketing</option>
                        <option value="Divisi Teknik">Divisi Teknik</option>
                        <option value="Divisi Keuangan & HRD">Divisi Keuangan & HRD</option>
                    </select>

                    <!-- error message untuk nama -->
                    @error('jabatan')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com"
                                required>
                        </div> --}}


                <div class="form-group mb-3">
                    <label class="font-weight-bold mb-3">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                        placeholder="Masukkan Password" 
                        value="{{old('password')}}" 
                        />

                    <!-- error message untuk nama -->
                    @error('password')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold mb-3">ConfPass</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                        name="password_confirmation" placeholder="Masukkan Ulang Password"
                        value="{{ old('password_confirmation') }}" /> 

                    <!-- error message untuk nama -->
                    @error('password_confirmation')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>



                {{-- <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div> --}}


                <div class="d-flex flex-row-reverse align-items-center ">

                    <button class="btn btn-primary">Register</button>
                    <a href="{{ route('login') }}" method="GET">
                        <p class="border border-transparent ">Sudah Punya Akun?</p>
                    </a>

                    </form>


                </div>

            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
