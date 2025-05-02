<!DOCTYPE html>
<html>

<head>
    <title>Laravel Image Upload (Single + Multiple)</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<body>
    <div class="d-flex flex-column mt-5">
        <div class="d-flex  justify-content-around">
            <div class="card p-3">
                <h1>Single Image Upload</h1>
                <form action="{{ route('photos.store.single') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex"> <input type="file" class="form-control me-4" name="image" required>
                        <button class="btn btn-md btn-success" type="submit">Upload</button>
                    </div>
                </form>
            </div>
            <div class="card p-3">
                <h1>Multiple Images Upload</h1>
                <form action="{{ route('photos.store.multiple') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex">
                        <input type="file" class="form-control me-4" name="images[]" multiple required>
                        <button class="btn btn-md btn-success" type="submit">Upload</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center mt-4">
            @if(session('success'))
                <p style="color: green;">{{ session('success') }}</p>
            @endif
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <div>
                <h4>Uploaded Images</h4>
            </div>
        </div>
        <div class="d-flex flex-wrap align-items-center justify-content-center">
            @foreach($photos as $photo)
                <div class="m-2 d-flex flex-column justify-content-center align-items-center">
                    <div class="card mb-3"><img src="{{ asset('images/' . $photo->image) }}" alt="Photo" width="200"
                            height="200">
                    </div>

                    <form action="{{ route('photos.destroy', $photo->id) }}" method="POST">
                        @csrf

                        <button type="submit">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="d-flex align-items-center justify-content-center" style="margin-top: 20px;">
            {{ $photos->links() }}
        </div>
    </div>
    </div>


</body>

</html>