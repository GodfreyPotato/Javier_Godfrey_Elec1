@extends('master')

@section('content')

    <div
        style="display:flex; flex-direction: column; align-items: center; justify-content: space-around; width:20%; box-shadow: 0px 0px 2px 1px; height: 100vh; padding: 5px 0;">
        <h2>Customer</h2>
        <div>
            <label style="font-weight: bold;" for="">Customer ID:</label><br>
            <input type="text" readonly value="{{$cusId}}">
        </div>
        <div>
            <label style="font-weight: bold;" for="">Name:</label><br>
            <input type="text" readonly value="{{$name}}">
        </div>
        <div>
            <label style="font-weight: bold;" for="">Address:</label><br>
            <input type="text" readonly value="{{$addr}}">
        </div>
    </div>


@endsection