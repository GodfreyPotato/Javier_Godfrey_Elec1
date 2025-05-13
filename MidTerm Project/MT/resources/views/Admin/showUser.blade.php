@extends('Admin.master')
@section('content')

    <div class="h-100 d-flex flex-column align-items-center justify-content-center">

        <div class="d-flex justify-content-start w-50"> <a href="{{url()->previous()}}" class="btn btn-secondary mb-4">←
                Back</a>
        </div>
        <div class="w-50 p-2 rounded shadow-lg p-3">
            <div class="bg-primary rounded">
                <h2 class="text-center text-white">User Profile</h2>
            </div>
            <div class="bg-white">
                <div class="input-group">
                    <label class="input-group-text w-25 mr-2 mb-2" for="">Name</label>
                    <input type="text " class="form-control bg-white" name="name" id="" value="{{$user->name}}" readonly>
                </div>
                <div class="input-group">
                    <label class="input-group-text w-25 mr-2 mb-2" for="">Email</label>
                    <input type="text " class="form-control bg-white" name="email" id="" value="{{$user->email}}" readonly>
                </div>
                <div class="input-group">
                    <label class="input-group-text w-25 mr-2 mb-2" for="">Role</label>
                    <input type="text " class="form-control bg-white" name="email" id="" value="{{$user->role}}" readonly>
                </div>
                <div class=" input-group">
                    <label class="input-group-text w-25 mr-2 mb-2" for="">Birthdate</label>
                    <input type="text" class="form-control bg-white" name="birthdate" id=""
                        value="{{ \Carbon\Carbon::parse($user->birthdate)->format('M d, Y')}}" readonly>
                </div>

                <div class="input-group">
                    <label class="input-group-text w-25 mr-2 mb-2" for="">Address</label>
                    <input type="text " class="form-control bg-white" name="address" id="" value="{{$user->address}}"
                        readonly>
                </div>

                <div class="input-group">
                    <label class="input-group-text w-25 mr-2 mb-2" for="">Created on</label>
                    <input type="text " class="form-control bg-white" name="address" id="" value="{{ $user->created_at }}"
                        readonly>
                </div>
            </div>
        </div>
    </div>
@endsection