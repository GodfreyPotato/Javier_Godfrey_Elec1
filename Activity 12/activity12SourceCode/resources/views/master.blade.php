<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QR Code CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="bg-primary p-2 text-white d-flex justify-content-between align-items-center">
        <div>
            <h3><a href="{{route('home')}}" class="text-white" style="text-decoration: none;">QR Generator</a></h3>
        </div>
        <div> @yield('search')</div>
    </div>
    <div class="container py-2">
        @yield('content')
    </div>
</body>

</html>