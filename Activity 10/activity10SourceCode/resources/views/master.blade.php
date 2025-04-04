<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body >
    <div class="bg-dark text-white p-3 d-flex justify-content-between align-items-center" style="font-size:40px; ">
        <span>Activity 10</span>
        <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>

    </div>
@yield('content')
</body>
</html>