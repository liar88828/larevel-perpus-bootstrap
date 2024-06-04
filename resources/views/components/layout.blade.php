<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ijin Lembur</title>
    <style>
        .nowrap{
              white-space: nowrap;
        }
        .tulisTable {
            font-size: 9pt;
            color: black !important;
            padding: 2px
            white-space: nowrap; 
        }

        .membesar {
            width: 120px;
        }

        .judul {
            font-size: 20pt;
        }

        .tulis {
            font-size: 12pt;
            color: black !important;
            white-space: nowrap; 
        }

        .bBlack {
            border: 1px solid black;
        }

        .signature {
            display: flex;
            justify-content: space-between
        }
        
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
</head>

<body>


    {{ $slot }}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>
    <script>
        CKEDITOR.replace('content');
    </script>

    <script>
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>

    <script>
        var firstOpen = true;
        var time;

        $('#mulai_pagi').datetimepicker({
            useCurrent: true,
            format: 'HH:mm'
        })
    </script>

    <script>
        var firstOpen = true;
        var time;

        $('#akhir_pagi').datetimepicker({
            useCurrent: true,
            format: 'HH:mm'
        }).on('dp.show', function() {
            if (firstOpen) {
                time = moment().startOf('day');
                firstOpen = false;
            } else {
                time = "01:00 PM"
            }
            $(this).data('DateTimePicker').date(time);
        });
    </script>

    <script>
        var firstOpen = true;
        var time;

        $('#mulai_malam').datetimepicker({
            useCurrent: true,
            format: 'HH:mm'
        }).on('dp.show', function() {
            if (firstOpen) {
                time = moment().startOf('day');
                firstOpen = false;
            } else {
                time = "01:00 PM"
            }
            $(this).data('DateTimePicker').date(time);
        });
    </script>

    <script>
        var firstOpen = true;
        var time;

        $('#akhir_malam').datetimepicker({
            useCurrent: true,
            format: 'HH:mm'
        }).on('dp.show', function() {
            if (firstOpen) {
                time = moment().startOf('day');
                firstOpen = false;
            } else {
                time = "01:00 PM"
            }
            $(this).data('DateTimePicker').date(time);
        });
    </script>

</body>

</html>
