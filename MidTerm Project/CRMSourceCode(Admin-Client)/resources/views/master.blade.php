<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>We D.I.Y.</title>
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
                <a href="" style="text-decoration: none; color: white;">
                    <div class="d-flex align-items-center">
                        <img src="{{asset('images/logo.png')}}" alt="" width="80" height="80">
                        <h3>We D.I.Y.</h3>
                    </div>
                </a>
            </div>
            {{-- @yield('nav') --}}

        </div>


    </div>

    @yield('content')


</body>

</html>