@extends('Staff.master')

@section('content')

    <div class="bg-white w-100  d-flex" style="height: 80%;">

        <div class="w-75 d-flex flex-column align-items-center px-5 container h-100">
            <div class="w-100 d-flex align-items-center my-4">

                <select name="" id="reload" class="form-control text-center mr-3" style="width:20%;">
                    <option value="Opportunity" {{$selected == "Opportunity" ? "selected" : ""}}>Opportunity</option>
                    <option value="Deal" {{$selected == "Deal" ? "selected" : ""}}>Deals</option>
                </select>

                @if(session('success'))
                    <span class="text-success">{{session('success')}}</span>
                @else @if(session('delete'))
                        <span class="text-success">{{session('delete')}}</span>
                    @endif
                @endif
            </div>
            <div class=" w-100 d-flex flex-column align-items-center h-75">
                @if($selected == "Opportunity")
                    @foreach ($home as $opportunity)
                        <div class="w-100 rounded shadow-sm bg-white d-flex justify-content-between p-2 align-items-center mb-2">
                            <div>

                                <span style="font-size: 18px; font-weight: bold;"><a
                                        href="{{route('opportunity.show', ['opportunity' => $opportunity])}}">{{$opportunity->title}}</a></span>

                                <div style="font-size: 14px;">{{$opportunity->name}}</div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center" style="width:40%;">
                                <div>
                                    <div><span style="font-size: 16px; font-weight: bold;">Added on</span></div>
                                    <div><span style="font-size: 14px;">
                                            {{$opportunity->created_at->format('M d, Y \a\t g:i A')}}</span>
                                    </div>
                                </div>
                                <div><select name="status" style="font-size: 14px;"
                                        onchange="updateStatus(this,{{$opportunity->id}})" class="form-control">

                                        <option value="pending" {{$opportunity->status == "pending" ? "selected" : ""}}>Pending
                                        </option>
                                        <option value="ongoing">Deal</option>
                                    </select></div>

                            </div>
                        </div>
                    @endforeach
                @else
                    @foreach ($home as $deal)
                        <div
                            class="w-100 rounded p-2 shadow-sm bg-white d-flex justify-content-between p-2 align-items-center mb-2">
                            <div>
                                <div>
                                    <span style="font-size: 18px; font-weight: bold;">{{strtoupper($deal->title) }}
                                        {{$deal->id}}</span>
                                </div>
                                <div style="font-size: 14px;">{{$deal->description}}</div>
                            </div>
                            <div class="d-flex justify-content-around align-items-center" style="width:60%;">

                                <div style="flex:1; " class="mr-3">
                                    <div><span style="font-size: 16px; font-weight: bold;">Deal Started</span></div>
                                    <div><span style="font-size: 12px;"> {{$deal->created_at->format('M d, Y \a\t g:i A')}}</span>
                                    </div>
                                </div>
                                <div style="flex:1;">
                                    <div><span style="font-size: 16px; font-weight: bold;">Amount</span></div>
                                    <div><span style="font-size: 14px;"> ₱{{$deal->amount}}</span></div>
                                </div>
                                @if ($deal->remark == "ongoing")
                                    <div class="mr-3">
                                        <select name="status" style="font-size: 14px;" onchange="updateStatusDeal(this,{{$deal->id}})"
                                            class="form-control">
                                            <option value="ongoing" {{$deal->remark == "ongoing" ? "selected" : ""}}>On Going
                                            </option>
                                            <option value="done">Done</option>
                                        </select>
                                    </div>
                                    <div style="flex:1;"> <a href="" onclick="confirmCancel2({{$deal->id}})"
                                            class="btn btn-danger btn-md" style="font-size: 14px;">Cancel</a></div>
                                @else
                                    <div>{{$deal->remark}}</div>
                                @endif



                            </div>
                        </div>

                    @endforeach
                @endif
                <div class="d-flex justify-content-around w-100 mt-3">
                    {{ $home->links() }}
                </div>
            </div>
        </div>
        <div class="w-25 h-100 rounded shadow">

            <div class=" container bg-white d-flex flex-column" style="height: 80%;">
                <div class="text-start my-2 ">
                    <h4>Deal History</h4>
                </div>
                <div class="w-100 shadow-sm " style="overflow-y: auto; height: 90%; max-height:90%;">
                    @foreach ($deals as $deal)
                        <div
                            class="rounded  d-flex justify-content-between p-2 align-items-center mb-2 rounded shadow-sm {{$deal->remark != 'done' ? $deal->remark == 'good' ? 'bg-success' : 'bg-danger' : 'bg-white'}} ">
                            <span style="font-size: 17px; font-weight:bold; ">{{$deal->title}}</span>
                            <div> <span>{{$deal->updated_at->format('M d, Y \a\t g:i A')}}</span>
                                @if ($deal->comment != null && ($deal->remark == 'good' || $deal->remark == 'bad'))
                                    <a href="{{route('deal.show', ['deal' => $deal])}}"> <img src="/images/comment.png" width="17"
                                            alt=""></a>
                                @endif
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
        document.getElementById('reload').addEventListener("change", function () {
            var val = this.value; // Get selected value

            // Redirect dynamically based on the selected option
            if (val === "Opportunity") {
                window.location.href = "/staff/Opportunity";
            } else if (val === "Deal") {
                window.location.href = "/staff/Deal";
            }
        });

        //opportunity
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete it?")) {

                window.location.href = "/Opportunity/deleteOpportunity/" + id;
            }
        }

        function updateStatus(selected, id) {
            if (selected.value == "ongoing") {
                window.location.href = "/opportunity/status/" + id;
            }
        }

        function updateStatusDeal(selected, id) {
            if (selected.value == "done") {
                window.location.href = "/deal/status/" + id;
            }
        }

        //deal
        function confirmCancel2(id) {
            if (confirm("Are you sure you want to cancel it?")) {
                window.location.href = "/deal/cancel/" + id;
            }
        }


    </script>

@endsection
@section('name')
    <div> Welcome {{Auth::user()->name}}! <span class="p-1 bg-success rounded">Staff</span></div>
@endsection