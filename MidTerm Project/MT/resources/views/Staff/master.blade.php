<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff</title>
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
                    <span style="font-size: 16; ">@yield('name')</span>
                </a>
            </div>
            @auth

                <nav class="d-flex w-100">
                    <a href="" class="text-white mr-5" style="font-size: 18px; ">Home</a>
                    <a href="" class="text-white mr-5" style="font-size: 18px; ">Reports</a>


                </nav>
            @endauth
        </div>
        <div><a href="" class="btn btn-success btn-md">something here</a></div>
    </div>

    @yield('content')
    {{-- modal here --}}
    <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="commentForm" class="modal-content" onsubmit="submitComment(event)">
                <div class="modal-header">
                    <h5 class="modal-title" id="commentModalLabel">Add a Comment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <textarea id="commentText" class="form-control" rows="4"
                        placeholder="Write your comment..."></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>