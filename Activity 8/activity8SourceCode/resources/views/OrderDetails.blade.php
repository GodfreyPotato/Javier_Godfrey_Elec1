@extends('master')
@section('content')
    <div
        style="display:flex; flex-direction: column; align-items: center; justify-content: space-around; width: 20%; box-shadow: 0px 0px 2px 1px; height:100vh; padding: 5px 0;">
        <h2>Order Details</h2>
        <div>
            <label style="font-weight: bold;" for="">Transaction No:</label><br>
            <input type="text" readonly value="{{$transNo}}">
        </div>
        <div>
            <label style="font-weight: bold;" for="">Order No:</label><br>
            <input type="text" readonly value="{{$orderNo}}">
        </div>
        <div>
            <label style="font-weight: bold;" for="">Item ID:</label><br>
            <input type="text" readonly value="{{$itemId}}">
        </div>
        <div>
            <label style="font-weight: bold;" for="">Name:</label><br>
            <input type="text" readonly value="{{$name}}">
        </div>
        <div>
            <label style="font-weight: bold;" for="">Price:</label><br>
            <input type="text" readonly value="{{$price}}">
        </div>
        <div>
            <label style="font-weight: bold;" for="">Quantity:</label><br>
            <input type="text" readonly value="{{$qty}}">
        </div>
    </div>


@endsection