@extends('Customer.master')

@section('content')

    <h1>Im staff</h1>

@endsection
@section('name')
    Welcome {{$customer[0]->name}}!
@endsection