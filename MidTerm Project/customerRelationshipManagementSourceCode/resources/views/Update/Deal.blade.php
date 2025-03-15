@extends('master')
@section('content')

    <div class="container w-50 rounded shadow-sm h-75 d-flex flex-column justify-content-center align-items-center">
        <h4 class=" w-100">Modify Deal</h4>
        <form action="{{route('updateDeal', ['id' => $deal[0]->id])}}" method="post" class="w-100 p-2">
            @csrf
            <div class="h-50 d-flex flex-column w-100">
                <div class=" w-100">
                    <label for="customer" class="form-label">Title</label> @error('title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <input type="text" name='title' class="form-control bg-white" id="customer" value="{{$deal[0]->title}} "
                        readonly>
                </div>
                <div class="w-100">
                    <label for="lastUpdate" class="form-label">Amount</label>@error('amount')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <input type="number" name="amount" class="form-control" id="lastUpdate" value="{{$deal[0]->amount}}">
                </div>
            </div>

            <div class="h-50 w-100">
                <label for="note" class="form-label">Description</label>@error('description')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <textarea class="form-control" name="description" id="note" rows="3">{{$deal[0]->description}}</textarea>
            </div>

            <div>
                <button type="submit" class="btn btn-success btn-sm">Modify Deal</button>
            </Div>
        </form>
    </div>
@endsection