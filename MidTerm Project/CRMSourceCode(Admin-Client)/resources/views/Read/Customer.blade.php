@extends('master')

@section('content')
    <div class="h-100 d-flex flex-column align-items-center justify-content-center ">
        <div class="w-50 p-2 rounded shadow-lg p-3">
            <div class="bg-primary rounded">
                <h2 class="text-center text-white">Customer Profile</h2>
            </div>
            <div class="bg-white">
                <div class="input-group">
                    <label class="input-group-text w-25 mr-2 mb-2" for="">Name</label>
                    <input type="text " class="form-control bg-white" name="name" id="" value="{{$customer[0]->name}}"
                        readonly>
                </div>
                <div class="input-group">
                    <label class="input-group-text w-25 mr-2 mb-2" for="">Email</label>
                    <input type="text " class="form-control bg-white" name="email" id="" value="{{$customer[0]->email}}"
                        readonly>
                </div>

                <div class=" input-group">
                    <label class="input-group-text w-25 mr-2 mb-2" for="">Birthdate</label>
                    <input type="date" class="form-control bg-white" name="birthdate" id=""
                        value="{{$customer[0]->birthdate}}" readonly>
                </div>

                <div class="input-group">
                    <label class="input-group-text w-25 mr-2 mb-2" for="">Address</label>
                    <input type="text " class="form-control bg-white" name="address" id="" value="{{$customer[0]->address}}"
                        readonly>
                </div>

                <div class="input-group">
                    <label class="input-group-text w-25 mr-2 mb-2" for="">Created on</label>
                    <input type="text " class="form-control bg-white" name="address" id=""
                        value="{{ $customer[0]->created_at }}" readonly>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('upper-right')
    <a href="{{route('createInteraction', ['id' => $customer[0]->id])}}" class="btn btn-success btn-md">Interact</a>
@endsection