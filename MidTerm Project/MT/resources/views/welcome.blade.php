@extends('master')
@section('style')

    <style>
        body,
        html {
            height: 100%;
        }

        .hero-section {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
            text-align: center;
        }

        .content-section {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50vh;
            background: #343a40;
            color: white;
        }
    </style>

@endsection
@section('content')

    <body>

        <!-- Hero Section -->
        <div class="hero-section">
            <div>
                <h1 class="display-4 font-weight-bold">Welcome to We D.I.Y.</h1>
                <p class="lead">Your Tasks, Our Hands – We Get It Done!</p>
                @auth
                    <h2>Hello {{Auth::user()->name}}</h2>
                @else
                    <div class="d-flex justify-content-around ">
                        <a href="{{route('login')}}" class="btn btn-primary btn-lg w-25">Login</a>
                        <a href="{{route('registration.index')}}" class="btn btn-outline-primary btn-lg w-25">Sign Up</a>
                    </div>
                @endauth
            </div>
        </div>

        <!-- Content Section -->
        <div class="content-section">
            <div class="text-center">
                <h2>Your Personal Task Completion Service</h2>
                <p>No Time? No Problem. Let Us Do It For You!</p>
            </div>
        </div>

        <!-- Footer -->
        <footer class="text-center py-4 bg-dark text-light">
            <p>&copy; 2025 We DIY. All rights reserved.</p>
        </footer>


    </body>
@endsection