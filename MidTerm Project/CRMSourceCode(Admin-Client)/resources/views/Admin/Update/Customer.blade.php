@extends('Admin.master')
@section('content')
    <div class="h-100 d-flex flex-column align-items-center justify-content-center ">
        <div class="w-50 p-2 rounded shadow-lg p-3">
            @if (session('success'))
                <span class="text-success">{{session('success')}}</span>
            @elseif(session('error'))
                <span class="text-danger">{{session('error')}}</span>
            @endif
            <div class="bg-primary rounded mb-2 text-white text-center">
                <h2>Edit Customer</h2>
            </div>
            <div class="bg-white">
                <form action="{{route('updateCustomer', ['id' => $customer[0]->id])}}" method="post">
                    @csrf
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="input-group">
                        <label class="input-group-text w-25 mr-2 mb-2" for="">Name</label>
                        <input type="text " class="form-control" name="name" id="" value="{{$customer[0]->name}}">

                    </div>
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="input-group">
                        <label class="input-group-text w-25 mr-2 mb-2" for="">Email</label>
                        <input type="text " class="form-control" name="email" id="" value="{{$customer[0]->email}}">
                    </div>
                    @error('birthdate')
                        <span class=" text-danger">{{$message}}</span>
                    @enderror
                    <div class="input-group">
                        <label class="input-group-text w-25 mr-2 mb-2" for="">Birthdate</label>
                        <input type="date" class="form-control" name="birthdate" id="" value="{{$customer[0]->birthdate}}">
                    </div>
                    @error('address')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="input-group">
                        <label class="input-group-text w-25 mr-2 mb-2" for="">Address</label>
                        <input type="text " class="form-control" name="address" id="" value="{{$customer[0]->address}}">
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-success">Edit Customer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('upper-right')
    <a onclick="deleteCustomer({{$customer[0]->id}})" class="btn btn-danger btn-md text-white">Delete</a>

    <script>
        function deleteCustomer(id) {
            if (confirm("Are you sure you want to delete the customer?")) {
                window.location.href = "/Customer/DeleteCustomer/" + id;
            }
        }
    </script>
@endsection