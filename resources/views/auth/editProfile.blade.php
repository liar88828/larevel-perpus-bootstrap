<x-layout>
    <div class="row justify-content-center mt-5 py-5">
        <div class="col-lg-4">


            <div class="d-flex justify-content-center">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQhcuMdNdqvLtJHGan35ZrEk8QUh4B7DZ_THg&usqp=CAU"
                    alt="tvku" style="width:30%;height: auto;">
            </div>



            <div class="card">
                <div class="card-header">
                    <h1 class="card-tittle">Edit Profile</h1>
                </div>

                <form action="{{ url('/' . $role . '/' . auth()->user()->anggota . '/edit_profile') }}" method="POST"
                    class="px-4 ">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label class="font-weight-bold mb-3">Nama</label>
                        <input class="form-control @error('nama') is-invalid @enderror" name="nama" type="text"
                            placeholder="Masukkan Nama" value="{{ old('nama', $user->nama) }}" />

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
                                class="form-control @error('jenisKelamin') is-invalid @enderror" type="radio"
                                value="Laki-laki" name="jenisKelamin" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Laki Laki
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input"
                                class="form-control @error('jenisKelamin') is-invalid @enderror" type="radio"
                                name="jenisKelamin" id="flexRadioDefault1" value="Perempuan">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Perempuan
                            </label>
                        </div>

                        @error('jenisKelamin')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>



                    <div class="form-group mb-3">
                        <label class="font-weight-bold mb-3">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            placeholder="Masukkan Email" value="{{ old('email', $user->email) }}" />

                        @error('email')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>



                    <div class="form-group mb-3">
                        <label class="font-weight-bold mb-3">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tanggalLahir') is-invalid @enderror"
                            name="tanggalLahir" value="{{ old('tanggalLahir', $user->tanggalLahir) }}" />

                        @error('tanggalLahir')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="form-group mb-3">
                        <label class="font-weight-bold mb-3">No.Hp</label>
                        <input type="number" class="form-control @error('noHp') is-invalid @enderror" name="noHp"
                            value="{{ old('noHp', $user->noHp) }}" placeholder="Masukkan No.Hp" />

                        <!-- error message untuk nama -->
                        @error('noHp')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>



                    {{-- <div class="form-group mb-3">
                        <label class="font-weight-bold mb-3">Anggota</label>
                        <select class="form-control @error('anggota') is-invalid @enderror" name="anggota"
                            value="{{ old('anggota', $user->anggota) }}" placeholder="Masukkan Anggota">
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
                    </div> --}}


                    <div class="form-group mb-3">
                        <label class="font-weight-bold mb-3">Pilih Divisi</label>
                        <select class="form-control @error('divisi') is-invalid @enderror" name="divisi"
                            value="{{ old('divisi', $user->divisi) }}" placeholder="Masukkan Divisi">
                            <option value="Divisi Produksi">Divisi Produksi</option>
                            <option value="Divisi IT">Divisi IT</option>
                            <option value="Divisi Marketing">Divisi Marketing</option>
                            <option value="Divisi Teknik">Divisi Teknik</option>
                            <option value="Divisi News">Divisi News</option>
                        </select>

                        <!-- error message untuk nama -->
                        @error('divisi')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex flex-row-reverse align-items-center ">
                        <button class="btn btn-primary">Simpan Edit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-layout>
