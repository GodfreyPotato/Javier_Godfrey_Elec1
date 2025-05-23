<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activity 15 - API Fetching</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="d-flex flex-column align-items-center justify-content-center " style="height: 100vh; ">
    <div class="d-flex flex-column justify-content-center align-items-center card p-5 "
        style="background-color: antiquewhite;">
        <h2>Cat API - Activity 15</h2>
        @isset ($error)
            <h2>Error Occured</h2>
        @else
            <img src="{{$catImg}}" height="300" alt="" class="mb-3">
            <a href="{{route('cat')}}" class="btn btn-primary mb-3">Regenerate</a>
        @endisset
        <a href="{{route('moreCat')}}" class="btn btn-primary mb-3">Generate more Pussy</a>
        @isset($cats)
            <div class="d-flex flex-wrap">
                @foreach ($cats as $cat)
                    <img src="{{$cat['url']}}" width="120" class="me-2">
                @endforeach
            </div>
        @endisset
    </div>
</body>

</html>