@extends('Admin.master')
@section('content')
    <div class="h-100">
        <form action="{{route('processInteraction')}}" method="POST" class="h-100 bg-primary d-flex">
            @csrf

            <div class="w-75 bg-white h-100 container d-flex flex-column justify-content-around">
                @if (session('success'))
                    <span class="text-success">{{session('success')}}</span>
                @else
                    <span class="text-danger">{{session('error')}}</span>
                @endif
                <div class=" ">
                    <label for="">
                        <h5>Title</h5>
                    </label> @error('title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <input type="text" name="title" class="form-control rounded shadow">
                </div>

                <div class="h-75 ">
                    <label for="">
                        <h5>Description</h5>
                    </label> @error('description')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <textarea name="description" id="" class="form-control rounded shadow"
                        style="height: 80%; width: 100%; resize: none;"></textarea>
                </div>
            </div>

            <div class="w-25 bg-secondary h-100 d-flex flex-column justify-content-around container">
                <div class="form-floating"><label for="customer">Customer</label>
                    <select name="customer_id" class="form-control" id="customer">
                        @if (isset($selected) && count($selected) > 0)
                            <option value="{{ $selected[0]->id }}" selected>{{ $selected[0]->name }}</option>
                        @else
                            <option value="" selected disabled>Select a Customer</option>
                        @endif
                        @foreach ($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                        @endforeach
                    </select>
                    @error('customer_id')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-floating"><label for="it">Interaction Type</label>
                    <select name="interaction_type" class="form-control" id="it">
                        <option value="" selected disabled>Select Interaction Type</option>
                        <option value="email">Email</option>
                        <option value="call">Call</option>
                        <option value="meeting">Meeting</option>
                        <option value="chat">Chat</option>
                    </select>
                    @error('interaction_type')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-floating"> <label for="ea">Estimated Amount</label>
                    <input type="number" name="estimated_value" id="ea" class="form-control" placeholder="">
                    @error('estimated_value')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <button class="btn btn-primary btn-md" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection