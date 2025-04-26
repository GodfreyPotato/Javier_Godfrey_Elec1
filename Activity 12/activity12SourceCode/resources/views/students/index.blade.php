@extends('master')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Student Listing</h2>
        <a href="{{ route('create') }}" class="btn btn-primary">Add New Student</a>
    </div>
    @if(session('success'))
        <span class="text-success">
            <h5> {{session('success')}}</h5>
        </span>
    @endif
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>Student Name</th>
                    <th>Scan QR for Details</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td class="fw-semibold">{{ $student->firstname }} {{ $student->lastname }}</td>
                        <td class="text-center">
                            {{ QR::size(60)->generate("Full name: " . $student->firstname . " " . $student->lastname . "\nAddress: " . $student->address . "\nEmail: " . $student->email . "\nBirthdate: " . $student->birthdate) }}
                        </td>
                        <td class="text-center">
                            <a href="{{ route('edit', $student->id) }}" class="btn btn-warning btn-sm me-1">
                                Edit
                            </a>
                            <form action="{{ route('destroy', $student->id) }}" method="POST" class="d-inline">
                                @csrf

                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
        <div class="d-flex justify-content-center align-items-center" style="height: 60px;">
            {{ $students->links() }}
        </div>
    </div>
    </div>
@endsection
@section('search')
    <form action="{{ route('home') }}" method="GET" class="d-flex bg" role="search">
        <input type="text" name="search" class="form-control me-2" placeholder="Search student name..."
            value="{{ request('search') }}">
        <button type="submit" class="btn btn-success">Search</button>
    </form>
@endsection