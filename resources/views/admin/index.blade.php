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

                     
                            <div class="col-md-2 mt-3">
                                <a class="btn btn-success text-nowrap p-2 "     href="{{  url("admin/user/all") }}">
                                   Lihat User </a>
                            </div>

                            <div class="col-md-2 mt-3">
                                <a class="btn btn-primary text-nowrap p-2 "  href="{{  url("admin/surat/all") }}"> 
                                 Lihat Surat
                                </a>
                            </div>
                       
                </div>
            </form>
        </div>
    </div>
</body>

</html>
