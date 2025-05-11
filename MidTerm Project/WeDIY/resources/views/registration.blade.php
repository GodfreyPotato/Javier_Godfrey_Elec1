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

                    <form action="{{ route('registration.store') }}" method="POST">
                        @csrf
                        <div class="mb-3 d-flex justify-content-between">
                            <div style="width:45%;">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div style="width:45%;">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="" class="form-control @error('email') is-invalid @enderror">
                                <option value="customer">Customer</option>
                                <option value="staff">Staff</option>
                            </select>

                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="birthdate" class="form-label">Birthdate</label>
                            <input type="date" id="birthdate" name="birthdate"
                                class="form-control @error('birthdate') is-invalid @enderror">
                            @error('birthdate')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" id="address" name="address"
                                class="form-control @error('address') is-invalid @enderror">
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password"
                                class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary rounded-pill">Register</button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <span>Already have an account?</span> <a href="{{ route('login.index') }}"
                            class="text-decoration-none">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection