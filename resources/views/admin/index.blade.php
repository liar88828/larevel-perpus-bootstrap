<x-layout>

    
    <!------ Include the above in your HEAD tag ---------->
    <div class="m-5 ">

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

                            <div class="d-grid gap-2 col-6 mx-auto">
                                <a class="btn btn-success text-nowrap p-2 " href="{{ url('admin/user/all') }}">
                                    Lihat User
                                    {{ $user }}
                                </a>

                                <a class="btn btn-primary text-nowrap p-2 " href="{{ url('admin/surat/all') }}">
                                    Lihat Surat
                                    {{ $surat }}
                                </a>

                                <a class="btn btn-warning text-nowrap p-2 " href="{{ url('admin/pass/all') }}">
                                    Lihat Lupa Password
                                    {{ $lupa }}
                                </a>

                                <form class="inline" method="POST" action="logout">
                                    @csrf
                                    <button type="submit" class="btn btn-danger text-nowrap p-2  ">
                                        Logout
                                    </button>
                                </form>
                            </div>
            </form>
        </div>
    </div>
</x-layout>
