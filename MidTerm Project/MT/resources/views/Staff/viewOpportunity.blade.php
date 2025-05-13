@extends('Staff.master')
@section('content')

    <div class="container mt-5 card p-3 shadow-sm">
        <div> <a href="{{ url()->previous() }}" class="btn btn-secondary my-4 d-inline-block">←
                Back</a></div>
        <h2>Opportunity/Task</h2>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" readonly value="{{$opportunity->title}}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"
                readonly> {{$opportunity->description}}</textarea>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input min="1" type="number" class="form-control" id="amount" name="amount" readonly
                value="{{$opportunity->amount}}">
        </div>
        <button type="submit" onclick="updateStatus('ongoing',{{$opportunity->id}})" class="btn btn-success">Accept
            Opportunity</button>

    </div>

    <script>
        function updateStatus(selected, id) {
            if (selected == "ongoing") {
                window.location.href = "/opportunity/status/" + id;
            }
        }
    </script>
@endsection