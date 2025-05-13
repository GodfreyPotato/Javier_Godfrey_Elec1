@extends('Staff.master')

@section('content')

    <div class="bg-white h-100 p-4">
        @if(session('success'))
            <span class="text-success">{{session('success')}}</span>
        @endif
        <div style="height:40%;" class="d-flex flex-column ">

            <div class="d-flex justify-content-between mb-3 align-items-center"> <span>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary mb-4">← Back</a>
                    <div class="d-flex">
                        <h3 class="mr-3">TASK: {{$deal->title}}</h3>
                        <div class="p-2 {{$deal->remark == 'bad' ? 'bg-danger' : 'bg-success'}} rounded text-white">
                            {{strtoupper($deal->remark)}}
                        </div>
                    </div>
                </span>

            </div>
            <div class="w-100 bg-secondary mb-3" style="height:1px;"></div>
            <table>
                <thead>

                    <tr class="bg-primary text-white ">
                        <th class="px-2 py-1">
                            <h3>Customer</h3>
                        </th>
                        <th class="px-2 py-1">
                            <h3>Amount</h3>
                        </th>
                        <th class="px-2 py-1">
                            <h3>Last Update</h3>
                        </th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td class="px-2 py-1">
                            <span style="font-size: 1.1vw;">{{$deal->name}}</span>
                        </td>
                        <td class="px-2 py-1">
                            <span style="font-size: 1.1vw;">₱{{$deal->amount}}</span>
                        </td>
                        <td class="px-2 py-1">
                            <span style="font-size: 1.1vw;">{{$deal->updated_at->format('M d, Y \a\t g:i A')}}</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="height: 60%; " class="d-flex ">
            <div class="p-1 w-50">
                <div>
                    <h3>Description</h3>
                </div>
                <textarea name="description" id="" class="form-control rounded shadow bg-white"
                    style="height: 80%; width: 100%; resize: none; font-size: 1.2vw;"
                    readonly>{{$deal->description}}</textarea>
            </div>
            <div class="p-1 w-50">
                <div class="{{$deal->remark == 'good' ? 'text-success' : 'text-danger'}}">
                    <h3>Comment From Customer</h3>
                </div>
                <textarea name="description" id="" class="form-control rounded shadow bg-white"
                    style="height: 80%; width: 100%; resize: none; font-size: 1.2vw;" readonly>{{$deal->comment}}</textarea>
            </div>
        </div>

    </div>
@endsection
@section('name')
    <div> Welcome {{Auth::user()->name}}! <span class="p-1 bg-success rounded">Staff</span></div>
@endsection