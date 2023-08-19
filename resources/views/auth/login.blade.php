<x-layout>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="d-flex justify-content-center">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQhcuMdNdqvLtJHGan35ZrEk8QUh4B7DZ_THg&usqp=CAU"
                    alt="tvku" style="width:30%;height: auto;">
            </div>
            <div class="card">
                <div class="card-header">
                    <h1 class="card-tittle">Login</h1>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="card-body"></div>
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @elseif (session('error'))
                        <div class="card-body"></div>
                        <div class="alert alert-warning " role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label class="font-weight-bold mb-3">Email</label>
                            <input type="email" class="form-control @error('nama') is-invalid @enderror"
                                name="email" placeholder="Masukkan Email" />

                            <!-- error message untuk nama -->
                            @error('email')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>




                        <div class="form-group mb-3">
                            <label class="font-weight-bold mb-3">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="Masukkan Password" />

                            <!-- error message untuk nama -->
                            @error('password')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex  flex-row-reverse ">
                            <div class="d-flex flex-row">
                                <div class="d-flex flex-col " >
                                    <div class="f-flex flex-row">

                                        <a href="{{ route('lupa') }}" >
                                                <p style="font-size: .7rem"> Lupa Password </p>
                                        </a>


                                        <a href="{{ route('register') }}" method="GET">
                                                <p style="font-size: .7rem">Buat Akun</p>
                                        </a>
                                    </div>

                                    <button class="btn btn-primary ">Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
    </div>
    </div>
    </div>
</x-layout>