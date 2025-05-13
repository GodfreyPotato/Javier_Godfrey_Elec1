@extends('Customer.master')
@section('content')

    <div class="container mt-5 card w-50 rounded shadow-sm h-50 d-flex flex-column justify-content-center ">
        <div class="mb-4"> <a href="{{ url()->previous() }}" class="btn btn-secondary">← Back</a></div>
        <h4 class=" w-100">Edit Opportunity</h4>
        <form action="{{route('opportunity.update', ['opportunity' => $opportunity])}}" method="post" class="w-100 p-2">
            @csrf
            @method('PUT')
            <div class="h-50 d-flex flex-column w-100">
                <div class=" w-100">
                    <label for="customer" class="form-label">Title</label> @error('title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <input type="text" name='title' class="form-control" id="customer" value="{{$opportunity->title}}">
                </div>
                <div class="w-100">
                    <label for="lastUpdate" class="form-label">Amount</label>@error('amount')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <input type="number" name="amount" class="form-control" id="lastUpdate"
                        value="{{$opportunity->amount}}">
                </div>
            </div>

            <div class="h-50 w-100">
                <label for="note" class="form-label">Description</label>@error('description')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <textarea class="form-control" name="description" id="note"
                    rows="3">{{$opportunity->description}}</textarea>
            </div>

            <div>
                <button type="submit" class="btn btn-success btn-sm">Modify Opportunity</button>
            </div>
        </form>
    </div>
@endsection
@section('name')
    <div> Welcome {{Auth::user()->name}}! <span class="p-1 bg-success rounded">Customer</span></div>
@endsection