@extends('master')
@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4">Login</h3>

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    {{-- <form action="{{ route('login') }}" method="POST"> --}}
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" id="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary rounded-pill">Login</button>
                        </div>
                        {{--
                    </form> --}}



                    <div class="text-center mt-2">
                        <span>Don't have an account?</span> <a href="{{ route('register') }}"
                            class="text-decoration-none">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection