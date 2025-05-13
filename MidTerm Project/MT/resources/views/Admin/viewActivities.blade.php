@extends('Admin.master')
@section('content')

    <div class="p-5 d-flex flex-column justify-content-center align-items-center">

        <h3>Activities By Users</h3>

        <table class="table table-striped table-hover align-middle text-center w-75 ">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Activity</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $num = 1;
                @endphp
                @foreach ($activities as $activity)
                    @php
                        $numShow = $num + (($activities->currentPage() - 1) * 10);
                    @endphp
                    <tr>
                        <td>{{$numShow}}</td>
                        <td>{{ $activity->name }}</td>
                        <td>
                            {{strtoupper($activity->role)}}
                        </td>
                        <td>{{ strtoupper($activity->action)}}</td>
                        <td>{{ \Carbon\Carbon::parse($activity->date)->format('M d, Y \a\t g:i A') }}</td>
                    </tr>
                    @php
                        $num += 1;
                    @endphp
                @endforeach
            </tbody>

        </table>
        <div class="d-flex justify-content-center mt-4">{{$activities->links()}} </div>
    </div>

@endsection