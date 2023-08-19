<x-layout>

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


                            <div class="col-md-2 mt-3">
                                <a class="btn btn-success text-nowrap p-2 " href="{{ url('admin/user/all') }}">
                                    Lihat User </a>
                            </div>

                            <div class="col-md-2 mt-3">
                                <a class="btn btn-primary text-nowrap p-2 " href="{{ url('admin/surat/all') }}">
                                    Lihat Surat
                                </a>
                            </div>

                        </div>
            </form>
        </div>
    </div>
</x-layout>
