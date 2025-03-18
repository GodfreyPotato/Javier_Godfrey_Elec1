@extends('master')

@section('content')
    <div class="container d-flex justify-content-center align-items-center h-100 py-4">
        <div class="w-50">
            <div class="shadow-lg border-0 rounded-4">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4">Registration</h3>

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3 d-flex justify-content-between">
                            <div>
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="birthdate" class="form-label">Birthdate</label>
                            <input type="date" id="birthdate" name="birthdate"
                                class="form-control @error('birthdate') is-invalid @enderror" required>
                            @error('birthdate')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" id="address" name="address"
                                class="form-control @error('address') is-invalid @enderror" required>
                            @error('address')
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

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary rounded-pill">Register</button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <span>Already have an account?</span> <a href="{{ route('login') }}"
                            class="text-decoration-none">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection