@extends('Admin.master')
@section('content')

    <div class="p-5 d-flex flex-column justify-content-center align-items-center">

        <h3>Reports From Customers</h3>

        <table class="table table-striped table-hover align-middle text-center w-75 ">
            <thead class="table-danger">
                <tr>
                    <th>#</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Staff Name</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Deal</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $num = 1;
                @endphp
                @foreach ($reports as $report)
                    @php
                        $numShow = $num + (($reports->currentPage() - 1) * 10);
                    @endphp
                    <tr>
                        <td>{{$numShow}}</td>
                        <td>{{ $report->customer_name }}</td>
                        <td>{{ $report->staff_name }}</td>
                        <td>
                            {{strtoupper($report->reason)}}
                        </td>
                        <td style="max-width: 200px;">{{ $report->comment}}</td>
                        <td>{{$report->title}}</td>
                        <td>{{ \Carbon\Carbon::parse($report->date)->format('M d, Y \a\t g:i A') }}</td>
                    </tr>
                    @php
                        $num += 1;
                    @endphp
                @endforeach
            </tbody>

        </table>
        <div class="d-flex justify-content-center mt-4">{{$reports->links()}} </div>
    </div>

@endsection