<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="d-flex flex-column vh-100">

    <div class="bg-dark d-flex justify-content-between align-items-center p-3" style="height:20%; font-size: 20px;">
        <div>
            <div class="text-white text-start" style="font-weight: bold; font-size: 20px;">
                <a href="{{route('home')}}" style="text-decoration: none; color: white;">Customer
                    Relationship Management</a>
            </div>
            <nav>
                <a href="{{route('home')}}" class="text-white" style="font-size: 15px;">Home</a>
                <a href="{{route('showActivities')}}" class="text-white" style="font-size: 15px;">Activities</a>

            </nav>

        </div>
        <div> @yield('upper-right')
        </div>

    </div>

    @yield('content')
</body>

</html>