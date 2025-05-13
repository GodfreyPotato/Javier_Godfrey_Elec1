@extends('Customer.master')
@section('content')

    <div class="container mt-5 mb-5" style="max-width: 600px;">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex  justify-content-between align-items-center">
                    <h3 class="card-title mb-4">Report This Deal</h3>
                    <div class="card d-flex justify-content-center align-items-center rounded p-1 text-dark">
                        <h5>{{$deal->title}} </h5>
                        Handled by: {{$deal->staff_name}}
                    </div>

                </div>


                <form action="{{route('report.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="deal_id" value="{{$deal->deal_id}}">
                    <input type="hidden" name="staff_id" value="{{$deal->staff_id}}">

                    <div class="mb-3">
                        <label for="reason" class="form-label">Reason for Reporting</label>
                        <select class="form-control" id="reason" name="reason" required>
                            <option value="" disabled selected>{{old(key: 'reason')}}</option>
                            <option value="Staff was unprofessional or abusive">Staff was unprofessional or abusive</option>
                            <option value="Did not complete the task as requested">Did not complete the task as requested
                            </option>
                            <option value="Low-quality work">Low-quality work</option>
                            <option value="Suspected fraud or impersonation">Suspected fraud or impersonation</option>
                            <option value="Violation of platform policies">Violation of platform policies</option>
                            <option value="Task was marked done without doing it">Task was marked done without doing it
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="details" class="form-label">Additional Details (optional)</label>
                        <textarea class="form-control" id="details" name="comment" rows="4"
                            placeholder="Provide more context...">{{old('comment')}}</textarea>
                    </div>


                    <div class="d-flex justify-content-between">
                        <a href="{{url()->previous()}}" class="btn btn-outline-secondary">Back</a>
                        <button type="submit" class="btn btn-danger">Submit Report</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection