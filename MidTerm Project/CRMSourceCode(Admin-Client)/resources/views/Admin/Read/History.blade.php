@extends('Admin.master')
@section('content')
    <h3 class="text-dark text-start pt-3 px-2 ">History</h3>
    <div class="py-3 px-2 text-white d-flex flex-column align-items-center">

        @foreach ($deals as $deal)
            <div
                class=" w-100 rounded p-2 shadow-sm {{$deal->status == 'good' ? 'bg-success' : 'bg-danger'}} d-flex justify-content-between p-2 align-items-center mb-2">
                <div>
                    <div>
                        <span style="font-size: 18px; font-weight: bold;">{{$deal->title}}</span>
                    </div>
                    <div style="font-size: 14px;">{{$deal->description}}</div>
                </div>
                <div class="d-flex justify-content-around align-items-center" style="width:40%;">
                    <div style="flex:1;">
                        <div><span style="font-size: 16px; font-weight: bold;">Amount</span></div>
                        <div><span style="font-size: 14px;"> ₱{{$deal->amount}}</span></div>
                    </div>
                    <div style="flex:1;">{{strtoupper($deal->status)}}</div>

                    <div style="flex:1;"> <a href="" onclick="confirmDelete2({{$deal->id}})" class="btn btn-warning btn-md"
                            style="font-size: 14px;">Delete</a></div>


                </div>
            </div>

        @endforeach
        <div class="mt-2 text-dark">{{$deals->links()}}</div>
    </div>
@endsection