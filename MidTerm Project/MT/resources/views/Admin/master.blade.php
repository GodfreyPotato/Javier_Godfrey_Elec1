<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>
</head>

<body class="d-flex flex-column vh-100">

    <div class="bg-dark d-flex justify-content-between align-items-center p-3" style="height:20%; font-size: 20px;">
        <div class="w-50">
            <div class="mb-2">
                <a href="" style="text-decoration: none; color: white;">
                    <div class="d-flex align-items-center">
                        <img src="{{asset('images/logo.png')}}" alt="" width="80" height="80">
                        <h3>We D.I.Y.</h3>
                    </div>
                </a>
            </div>
            {{-- @yield('nav') --}}
            @if (Auth::check())
                <nav class="d-flex w-100">
                    <a href="{{route('admin.index')}}" class="text-white mr-4" style="font-size: 18px; ">Home</a>
                    <a href="{{route('activity.index')}}" class="text-white mr-4" style="font-size: 18px;">Activities</a>
                    <a href="" class="text-white mr-4" style="font-size: 18px;">Users</a>
                    <a href="{{route('report.index')}}" class="text-white mr-4" style="font-size: 18px;">Reports</a>
                </nav>
            @endif
        </div>
        <div class="d-flex justify-content-between w-25">
            @yield('upper-right')
            <div class=" w-75" style="position: relative;">
                <input id="search" type="text" class="form-control" placeholder="Search opportunity">
                <ul id="result">

                </ul>
            </div>
            <div class="container d-flex align-items-center justify-content-center" style="height: 15%;"><a
                    href="{{route('logout')}}" class="btn btn-danger">Log Out</a></div>
        </div>

    </div>

    @yield('content')

    @php
        use App\Models\Deal;

        $good = Deal::where('remark', 'good')->count();
        $bad = Deal::where('remark', 'bad')->count();
        $ongoing = Deal::where('remark', 'ongoing')->count();

    @endphp
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
                        }, error: function (error) {
                            console.error(error)
                        }
                    });
                } else {
                    $("#result").html("");
                }
            });
        });
        let good = parseInt({{$good}});
        let bad = parseInt({{$bad}});
        let ongoing = parseInt({{$ongoing}});
        const xValues = ["Good", "Bad", "On Going"];
        const yValues = [good, bad, ongoing];
        const barColors = [
            "#198754",
            "#dc3545",
            "#FFFF00"
        ];

        new Chart("myChart", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {

                title: {
                    display: true,
                    text: "Staff Performance in Handling Customer"
                }
            }
        });

    </script>

</body>

</html>