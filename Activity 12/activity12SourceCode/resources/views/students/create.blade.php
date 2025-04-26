@extends('master')

@section('content')
    <div class="container mt-5 w-50 card p-4">
        <h2 class="mb-4">Create Student</h2>

        <form action="{{ route('store') }}" method="POST" class="d-flex flex-column gap-3">
            @csrf

            <div class="d-flex flex-column">
                <label for="firstname" class="mb-1">First Name</label>
                <input type="text" id="firstname" name="firstname"
                    class="form-control @error('firstname') is-invalid @enderror" required value="{{ old('firstname') }}">
                @error('firstname')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="d-flex flex-column">
                <label for="lastname" class="mb-1">Last Name</label>
                <input type="text" id="lastname" name="lastname"
                    class="form-control @error('lastname') is-invalid @enderror" required value="{{ old('lastname') }}">
                @error('lastname')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="d-flex flex-column">
                <label for="email" class="mb-1">Email</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    required value="{{ old('email') }}">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="d-flex flex-column">
                <label for="address" class="mb-1">Address</label>
                <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror"
                    value="{{ old('address') }}">
                @error('address')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="d-flex flex-column">
                <label for="birthdate" class="mb-1">Birthdate</label>
                <input type="date" id="birthdate" name="birthdate"
                    class="form-control @error('birthdate') is-invalid @enderror" required value="{{ old('birthdate') }}">
                @error('birthdate')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-primary px-4">Save</button>
            </div>
        </form>
    </div>
@endsection