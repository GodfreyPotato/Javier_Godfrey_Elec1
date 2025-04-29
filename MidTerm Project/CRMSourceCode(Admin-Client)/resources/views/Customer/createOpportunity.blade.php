@extends('Customer.master')
@section('content')
    <div class="container mt-5 card p-3 shadow-sm">
        <h2>Create Opportunity</h2>
        <form action="{{route('addOpportunity')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>@error('title')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>@error('description')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>@error('estimated_value')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <input type="number" class="form-control" id="amount" name="estimated_value" required>
            </div>

            <button type="submit" class="btn btn-success">Create Opportunity</button>
        </form>
    </div>
@endsection