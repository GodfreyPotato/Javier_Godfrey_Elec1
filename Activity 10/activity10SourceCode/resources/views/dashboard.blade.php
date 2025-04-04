@extends('master')
@section('content')
<div class="py-3 container">
        <div class="card-header text-center bg-primary text-white p-2" style="font-size: 30px;">
            User Information
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="w-50">{{ $user->name }}</td>
                            <td class="w-50">{{ $user->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection