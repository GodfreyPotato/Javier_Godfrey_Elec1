@extends('Admin.master')

@section('content')

    <div class="px-4">
        <div class="d-flex justify-content-center align-items-center">
            <div>
                <h1 class="text-dark text-start pt-3  " style="font-size: 3vw;">History from Deals</h1>
                <h2 style="font-size: 1.5vw;">
                    {{($good + $bad + $ongoing) == 0 ? '0' : number_format($good / ($good + $bad + $ongoing) * 100, 2)}}%
                    Succeess Transaction
                </h2>
            </div>
            <canvas id="myChart" style="width:100%;max-width:500px"></canvas>
        </div>
        <div class="py-3 px-2 text-white d-flex flex-column align-items-center" style="max-height:450px; overflow-y: auto;">
            @php
                $num = 1;
            @endphp
            @foreach ($deals as $deal)
                <div
                    class=" w-100 rounded p-2 shadow-sm {{$deal->remark == 'good' ? 'bg-success' : ($deal->remark == 'bad' ? 'bg-danger' : 'bg-warning')}} d-flex justify-content-between p-2 align-items-center mb-2">

                    <div style="width: 180px;" class="d-flex align-items-center">
                        <div>
                            <span style="font-size: 25px; font-weight: bold; margin-right: 20px;">{{$num}}.</span>
                        </div>
                        <div>
                            <div>
                                <span style="font-size: 18px; font-weight: bold;"> {{$deal->title}}<a
                                        href="{{route('showOpportunity', ['opportunity' => $deal])}}"></a></span>
                            </div>
                            <div style="font-size: 14px;">{{$deal->description}}</div>
                        </div>
                    </div>

                    <div>
                        <div>
                            <span style="font-size: 18px; font-weight: bold;">Customer</span>
                        </div>
                        <div style="font-size: 14px;">{{$deal->customer_name}}</div>
                    </div>
                    <div>
                        <div>
                            <span style="font-size: 18px; font-weight: bold;">Staff</span>
                        </div>
                        <div style="font-size: 14px;">{{$deal->staff_name}}</div>
                    </div>
                    <div class="d-flex justify-content-around align-items-center" style="width:40%;">
                        <div style="flex:1;">
                            <div><span style="font-size: 16px; font-weight: bold;">Amount</span></div>
                            <div><span style="font-size: 14px;"> ₱{{$deal->amount}}</span></div>
                        </div>
                        <div style="flex:1;">{{strtoupper($deal->remark)}}</div>
                        <div style="flex:1;">Done on: {{\Carbon\Carbon::parse($deal->date)->format('M d, Y \a\t g:i A')}}
                        </div>
                    </div>
                </div>
                @php
                    $num += 1;
                @endphp
            @endforeach
        </div>
    </div>
@endsection
@section('nav')

@endsection