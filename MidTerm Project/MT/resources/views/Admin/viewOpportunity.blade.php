@extends('Admin.master')
@section('content')

    <div class="container mt-5 card p-3 shadow-sm">
        <div class="d-flex justify-content-between align-items-center"> <a href="{{ url()->previous() }}"
                class="btn btn-secondary my-4 d-inline-block">←
                Back</a>
            <div style="height: 50px; width: auto;"
                class="bg-success p-2 d-flex justify-content-center align-items-center rounded  text-white">
                Task from: {{$opportunity->customer_name}}
            </div>
        </div>
        <div class="d-flex">
            <h2>Opportunity/Task</h2>
            @if ($opportunity->status == "pending" || $opportunity->status == "done")
                <div class="bg-success p-2 d-flex justify-content-center align-items-center rounded ml-3 text-white">
                    {{strtoupper($opportunity->status)}}
                </div>
            @endif
            @if ($opportunity->status != "pending")
                <div class="bg-success p-2 d-flex justify-content-center align-items-center rounded ml-3 text-white">
                    Task taken by: {{strtoupper($opportunity->staff_name)}}
                </div>
                <div
                    class="{{$opportunity->remark == 'done' ? 'bg-secondary' : ($opportunity->remark == 'good' ? 'bg-success' : ($opportunity->remark == 'bad' ? 'bg-danger' : 'bg-warning')) }} p-2 d-flex justify-content-center align-items-center rounded ml-3 text-white">
                    @if ($opportunity->remark == "done")
                        Not Yet Rated
                    @elseif ($opportunity->remark == "good")
                        Rated as: Good
                    @elseif($opportunity->remark == "bad")
                        Rated as: Bad
                    @elseif($opportunity->remark == "ongoing")
                        On Going
                    @endif
                </div>
            @endif

        </div>

        <div class="my-3">
            <label for="title" class="form-label">
                <h5>Title</h5>
            </label>
            <input type="text" class="form-control" id="title" name="title" readonly value="{{$opportunity->title}}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">
                <h5>Description</h5>
            </label>
            <textarea class="form-control" id="description" name="description" rows="3"
                readonly> {{$opportunity->description}}</textarea>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">
                <h5>Amount</h5>
            </label>
            <input min="1" type="number" class="form-control" id="amount" name="amount" readonly
                value="{{$opportunity->amount}}">
        </div>

        @if ($opportunity->status != "pending" && $opportunity->comment != null)
            <div class="mb-3">
                <label for="description" class="form-label">
                    <h5>Comment from {{$opportunity->customer_name}}</h5>
                </label>
                <textarea class="form-control" id="description" name="description" rows="3"
                    readonly> {{$opportunity->comment}}</textarea>
            </div>
        @endif
    </div>

    <script>
        function updateStatus(selected, id) {
            if (selected == "ongoing") {
                window.location.href = "/opportunity/status/" + id;
            }
        }
    </script>
@endsection