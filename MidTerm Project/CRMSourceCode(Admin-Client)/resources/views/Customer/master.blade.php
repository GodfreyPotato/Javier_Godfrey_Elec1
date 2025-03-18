<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        #result {
            position: absolute;
            width: 100%;
            background: rgb(240, 239, 239);
            max-height: 200px;
            overflow-y: auto;
            z-index: 1000;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

<body class="d-flex flex-column vh-100">

    <div class="bg-dark d-flex justify-content-between align-items-center p-3" style="height:20%; font-size: 20px;">
        <div class="w-50">
            <div class="mb-2">
                <a href="{{route('home')}}" style="text-decoration: none; color: white;">
                    <h3>We D.I.Y.</h3>
                </a>
            </div>
            @auth

                {{-- <nav class="d-flex w-100">
                    <a href="{{route('home')}}" class="text-white mr-5" style="font-size: 18px; ">Home</a>
                    <a href="{{route('showActivities')}}" class="text-white mr-5" style="font-size: 18px;">Activities</a>

                </nav> --}}
            @endauth
        </div>
        <div class="d-flex justify-content-between w-25">
            @yield('upper-right')
            <div class=" w-75" style="position: relative;">
                <input id="search" type="text" class="form-control" placeholder="Search opportunity">
                <ul id="result">

                </ul>
            </div>
        </div>

    </div>

    @yield('content')
    <script>
        $(document).ready(function () {
            $('#search').on('keyup', function () {
                let word = $(this).val();
                if (word.length > 0) {
                    $.ajax({
                        url: "/search/" + encodeURIComponent(word),
                        type: "GET",
                        data: { word: word },
                        success: function (data) {
                            $("#result").html(data);
                        }
                    });
                } else {
                    $("#result").html("");
                }
            });


        });



    </script>

</body>

</html>