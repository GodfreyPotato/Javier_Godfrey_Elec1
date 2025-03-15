@extends('master')
@section('content')

    <div class="bg-white h-100 p-4">
        @if(session('success'))
            <span class="text-success">{{session('success')}}</span>
        @endif
        <div style="height:40%;" class="d-flex flex-column ">
            <div class="d-flex justify-content-between mb-3 align-items-center"> <span><b>Title:</b>
                    {{$opportunity[0]->title}}</span>
                <a href="{{route('editOpportunity', ['id' => $opportunity[0]->id])}}" class="btn btn-success btn-md">Modify
                    Opportunity</a>
            </div>
            <div class="w-100 bg-secondary mb-3" style="height:1px;"></div>
            <table>
                <thead>

                    <tr class="bg-primary text-white">
                        <th class="px-2 py-1">Customer</th>
                        <th class="px-2 py-1">Estimated Value</th>
                        <th class="px-2 py-1">Interaction Type</th>
                        <th class="px-2 py-1">Last Update</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td class="px-2 py-1">{{$opportunity[0]->name}}</td>
                        <td class="px-2 py-1">₱{{$opportunity[0]->estimated_value}}</td>
                        <td class="px-2 py-1">{{$opportunity[0]->interaction_type}}</td>
                        <td class="px-2 py-1">{{$opportunity[0]->updated}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="height:60%;" class="p-1">
            <div style="font-size: 16px;"><b>Description</b></div>
            <textarea name="description" id="" class="form-control rounded shadow bg-white"
                style="height: 80%; width: 100%; resize: none;" readonly>{{$opportunity[0]->description}}</textarea>
        </div>
    </div>
@endsection