@extends('Customer.master')
@section('content')
    <div class="container mt-5 card p-3 shadow-sm">
        <div class="mb-4"> <a href="{{ url()->previous() }}" class="btn btn-secondary">← Back</a></div>
        <h2>Create Opportunity</h2>
        <form action="{{route('opportunity.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>@error('title')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>@error('description')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <textarea class="form-control" id="description" name="description"
                    rows="3"> {{old('description')}}</textarea>
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>@error('amount')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <input min="1" type="number" class="form-control" id="amount" name="amount" value="{{old('amount')}}">
            </div>

            <button type="submit" class="btn btn-success">Create Opportunity</button>
        </form>
    </div>
@endsection
@section('name')
    <div> Welcome {{Auth::user()->name}}! <span class="p-1 bg-success rounded">Customer</span></div>
@endsection