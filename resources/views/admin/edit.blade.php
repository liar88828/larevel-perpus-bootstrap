<x-layout>

    {{-- {{dd($lupa)}} --}}
    <div class="row justify-content-center mt-5 py-5">
        <div class="col-lg-4">


            <div class="d-flex justify-content-center">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQhcuMdNdqvLtJHGan35ZrEk8QUh4B7DZ_THg&usqp=CAU"
                    alt="tvku" style="width:30%;height: auto;">
            </div>



            <div class="card">
                <div class="card-header">
                    <h1 class="card-title text-uppercase text-center">Ganti Password</h1>
                </div>
                <div class="text-left">
                    <p class="">Name : {{ $lupa[0]->nama }}</p>
                    <p class="">Email : {{ $lupa[0]->email }}</p>
                    <p class="">No Telp : {{ $lupa[0]->noHp }}</p>
                </div>
                <div class="card-body mb-3 ">

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
                </div>
                <form action="{{ route('admin.lupa.ganti') }}" method="POST" class="px-4 ">
                    @csrf
                    @method('PUT')
                    
                    <input type="hidden" name="email" id="email" value="{{ $lupa[0]->email }}">

                    <div class="form-group mb-3">
                        <label class="font-weight-bold mb-3">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" placeholder="Masukkan Password" value="{{ old('password') }}" />

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


                    <button class="btn btn-md btn-success">UPDATE</button>
                    {{-- <button type="reset" class="btn btn-md btn-warning">RESET</button> --}}
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">KEMBALI</a>

                </form>
            </div>
        </div>
    </div>
</x-layout>
