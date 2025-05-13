@extends('Customer.master')

@section('content')

    <div class="bg-white w-100  d-flex" style="height: 80%;">
        <div class=" h-100 rounded shadow" style="width:30%;">

            <div class=" container bg-white d-flex flex-column" style="height: 80%;">
                <div class="text-start my-2 ">
                    <h4>Task History</h4>
                </div>
                <div class="w-100 shadow-sm " style="overflow-y: auto; height: 90%; max-height:90%;">
                    @foreach ($rates as $rate)
                        <div
                            class="rounded {{$rate->remark == 'good' ? 'bg-success' : 'bg-danger'}} text-white d-flex justify-content-between px-3 py-2 align-items-center mb-2 rounded shadow-sm">

                            <div>
                                <div style="font-weight: bold;">{{strtoupper($rate->title)}}</div>
                                <div style="font-size:15px;">Completed on:
                                    {{Carbon\Carbon::parse($rate->date)->format('M d, Y \a\t g:i A')}} by
                                    {{$rate->staff}}
                                </div>
                                <div style="font-size: 14px;"></div>
                            </div>
                            @if ($rate->remark == "bad")
                                <div><a href="{{route('reportDeal', ['deal' => $rate])}}"><img src="/images/warning.png" width="17"
                                            alt=""></a></div>
                            @endif
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
        <div class="w-75 d-flex flex-column align-items-center px-5 container h-100">

            <div class="w-100 d-flex align-items-center my-4">

                <h2 class="mr-3">Accepted Deals</h2>
                @if(session('success'))
                    <span class="text-success">{{session('success')}}</span>
                @elseif(session('delete'))
                    <span class="text-success">{{session('delete')}}</span>
                @endif
            </div>
            <div class=" w-100 d-flex flex-column align-items-center h-75">
                @foreach ($deals as $deal)
                    <div class="w-100 rounded shadow-sm bg-white d-flex justify-content-between p-2 align-items-center mb-2">
                        <div>


                            <span style="font-size: 18px; font-weight: bold;">{{strtoupper($deal->title)}}</span>
                            <div style="font-size: 14px;">Task accepted by: {{$deal->staff}}</div>
                            <div style="font-size: 14px;">
                                {{\Carbon\Carbon::parse($deal->date)->format('M d, Y \a\t g:i A')}}
                            </div>
                        </div>
                        <div class="d-flex  align-items-center" style="width:40%;">
                            <div style="flex:1;">
                                <div><span style="font-size: 16px; font-weight: bold;">Amount</span></div>
                                <div><span style="font-size: 14px;"> ₱{{$deal->amount}}</span></div>
                            </div>
                            @if ($deal->remark == "done")
                                <div style="flex:1;">
                                    <select onchange="updateStatus2(this,{{$deal->id}})" name="remark"
                                        style="font-size: 14px; width: 90%;" class="form-control ">
                                        <option disabled {{$deal->remark == "done" ? "selected" : ""}}>Rate
                                        </option>
                                        <option value="good" {{$deal->remark == "good" ? "selected" : ""}}>Good</option>
                                        <option value="bad" {{$deal->remark == "bad" ? "selected" : ""}}>Bad</option>
                                    </select>
                                </div>

                            @else
                                <div style="flex:1;">
                                    On Going
                                </div>
                            @endif


                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-around w-100 mt-3">
                    {{-- {{ $home->links() }} --}}
                </div>
            </div>
        </div>
        <div class="w-25 h-100 rounded shadow">

            <div class=" container bg-white d-flex flex-column" style="height: 80%;">
                <div class="text-start my-2 ">
                    <h4>Opportunities</h4>
                </div>
                <div class="w-100 " style="overflow-y: auto; height: 90%; max-height:90%;">
                    @foreach ($opportunities as $opportunity)
                        <div
                            class="rounded bg-white d-flex justify-content-between p-2 align-items-center mb-2 rounded shadow-sm">

                            <div class="d-flex justify-content-between w-100">
                                <div style="font-size: 18px;">{{$opportunity->title}} </div>
                                <div style="font-size: 14px;" class="d-flex align-items-center">
                                    <div class="mr-2">{{$opportunity->created_at->format('M d, Y g:i A')}}</div>
                                    <a href="{{route('opportunity.edit', ['opportunity' => $opportunity])}}"><img
                                            src="images/setting.png" width="17"></a>
                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
            <div class="container d-flex align-items-center justify-content-center" style="height: 15%;"><a
                    href="{{route('logout')}}" class="btn btn-danger">Log Out</a></div>
        </div>
    </div>

    <script>



        //deal
        function confirmDelete2(id) {
            if (confirm("Are you sure you want to delete it?")) {

                window.location.href = "/Deal/DeleteDeal/" + id;
            }
        }

        function updateStatus2(selected, id) {
            const modalElement = document.getElementById('commentModal');
            const modal = new bootstrap.Modal(modalElement);
            document.getElementById('deal_id').value = id;
            document.getElementById('deal_remark').value = selected.value;
            modal.show();


            // window.location.href = "/Deal/UpdateDealStatus/" + id + "/" + selected.value;

        }


    </script>

    {{-- modal here --}}
    <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <form id="commentForm" action="{{route('rateDeal')}}" class="modal-content" method="post">
                @csrf
                <input type="hidden" id="deal_id" name="deal_id">
                <input type="hidden" id="deal_remark" name="deal_remark">
                <div class="modal-header">
                    <h5 class="modal-title" id="commentModalLabel">Add a Comment</h5>
                </div>
                <div class="modal-body">
                    <textarea id="commentText" name="comment" class="form-control" rows="4"
                        placeholder="Write your comment..."></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>



@endsection
@section('name')
    <div> Welcome {{Auth::user()->name}}! <span class="p-1 bg-success rounded">Customer</span></div>
@endsection