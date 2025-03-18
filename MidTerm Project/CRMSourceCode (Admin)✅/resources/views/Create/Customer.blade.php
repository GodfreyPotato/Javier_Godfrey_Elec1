@extends('master')
@section('content')
    <div class="h-100 d-flex flex-column align-items-center justify-content-center ">
        <div class="w-50 p-2 rounded shadow-lg p-3">
            @if (session('success'))
                <span class="text-success">{{session('success')}}</span>
            @elseif(session('error'))
                <span class="text-danger">{{session('error')}}</span>
            @endif
            <div class="bg-primary rounded">
                <h2 class="text-center text-white">Add New Customer</h2>
            </div>
            <div class="bg-white">
                <form action="{{route('processCustomer')}}" method="post">
                    @csrf
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="input-group">
                        <label class="input-group-text w-25 mr-2 mb-2" for="">Name</label>
                        <input type="text " class="form-control" name="name" id="" placeholder="Juan Dela Pena">

                    </div>
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="input-group">
                        <label class="input-group-text w-25 mr-2 mb-2" for="">Email</label>
                        <input type="text " class="form-control" name="email" id="" placeholder="nasus@gmail.com">
                    </div>
                    @error('birthdate')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="input-group">
                        <label class="input-group-text w-25 mr-2 mb-2" for="">Birthdate</label>
                        <input type="date" class="form-control" name="birthdate" id="">
                    </div>
                    @error('address')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="input-group">
                        <label class="input-group-text w-25 mr-2 mb-2" for="">Address</label>
                        <input type="text " class="form-control" name="address" id="" placeholder="#1 San Vicente, Canada">
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-success">Add Customer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection