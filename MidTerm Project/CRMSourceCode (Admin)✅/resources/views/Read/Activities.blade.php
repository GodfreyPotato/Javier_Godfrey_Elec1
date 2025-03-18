@extends('master')
@section('content')
    <div class=" p-2 h-100 bg-secondary d-flex flex-column align-items-center">
        <div class="p-1 w-75">
            <h2 style="height: 10%; color: white; text-align: start;">Activities</h2>
        </div>
        <div class="w-75" style="max-height:80%; overflow-y: auto; height: 80%">

            @foreach ($activities as $activity)
                <div class="d-flex align-items-center w-100 mb-2 justify-content-between p-2 rounded shadow-sm bg-white"
                    style="height: 15%;">
                    <div>
                        <h5>{{$activity->title}}</h5>
                    </div>
                    <div class="d-flex justify-content-around" style="width:40%">
                        <div>
                            {{$activity->name}}
                        </div>
                        <div>
                            {{ $activity->created}}
                        </div>
                        <div>
                            <a href="{{route('viewOpportunity', ['id' => $activity->opportunity_id])}}"
                                class="btn btn-primary btn-sm">View</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection