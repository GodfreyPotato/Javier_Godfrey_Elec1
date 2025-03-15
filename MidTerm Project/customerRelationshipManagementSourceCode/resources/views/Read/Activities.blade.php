@extends('master')
@section('content')
    <div class=" p-2 h-100 bg-secondary">
        <div class="p-1">
            <h4 style="height: 10%; color: white;">Activities</h4>
        </div>
        <div class="" style="height: 80%">

            @foreach ($activities as $activity)
                <div class="d-flex align-items-center mb-2 justify-content-between p-2 rounded shadow-sm bg-white"
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