@extends('master')

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
                                        href="{{route('viewOpportunity', ['id' => $opportunity->id])}}">{{$opportunity->title}}</a></span>

                                <div style="font-size: 14px;">{{$opportunity->name}}</div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center" style="width:40%;">
                                <div>
                                    <div><span style="font-size: 16px; font-weight: bold;">Estimated Value</span></div>
                                    <div><span style="font-size: 14px;"> ₱{{$opportunity->estimated_value}}</span></div>
                                </div>
                                <div><select name="status" style="font-size: 14px;"
                                        onchange="updateStatus(this,{{$opportunity->op_id}})" class="form-control">

                                        <option value="open" {{$opportunity->status == "open" ? "selected" : ""}}>Open</option>
                                        <option value="deal" {{$opportunity->status == "deal" ? "selected" : ""}}>Deal</option>
                                    </select></div>
                                <div><a href="" onclick="confirmDelete({{$opportunity->op_id}})" class="btn btn-danger btn-md"
                                        style="font-size: 14px;">Delete</a></div>
                            </div>
                        </div>
                    @endforeach
                @else
                    @foreach ($home as $deal)
                        <div
                            class="w-100 rounded p-2 shadow-sm bg-white d-flex justify-content-between p-2 align-items-center mb-2">
                            <div>
                                <div>
                                    <span style="font-size: 18px; font-weight: bold;">{{$deal->title}}</span>
                                </div>
                                <div style="font-size: 14px;">{{$deal->description}}</div>
                            </div>
                            <div class="d-flex justify-content-around align-items-center" style="width:40%;">
                                <div>
                                    <div><span style="font-size: 16px; font-weight: bold;">Amount</span></div>
                                    <div><span style="font-size: 14px;"> ₱{{$deal->amount}}</span></div>
                                </div>
                                <div><select onchange="updateStatus2(this,{{$deal->id}})" name="status" style="font-size: 14px;"
                                        class="form-control">
                                        <option value="pending" {{$deal->status == "pending" ? "selected" : ""}}>Pending</option>
                                        <option value="won" {{$deal->status == "won" ? "selected" : ""}}>Won</option>
                                        <option value="lost" {{$deal->status == "lost" ? "selected" : ""}}>Lost</option>
                                    </select></div>

                                @if ($deal->status != "pending")
                                    <div> <a href="" onclick="confirmDelete2({{$deal->id}})" class="btn btn-danger btn-md"
                                            style="font-size: 14px;">Delete</a></div>
                                @else
                                    <div> <a href="{{route('editDeal', ['id' => $deal->id])}}" class="btn btn-warning btn-md text-white"
                                            style="font-size: 14px;">Edit</a></div>
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
                    <h4>Customers</h4>
                </div>
                <div class="w-100 shadow-sm " style="overflow-y: auto; height: 90%; max-height:90%;">
                    @foreach ($customers as $customer)
                        <div
                            class="rounded bg-white d-flex justify-content-between p-1 align-items-center mb-2 rounded shadow-sm">

                            <a href="{{route('viewCustomer', ['id' => $customer->id])}}"
                                style="font-size: 17px; text-decoration: none;">{{$customer->name}}</a>
                            <a href="{{route('editCustomer', ['id' => $customer->id])}}" class="btn btn-secondary btn-sm"
                                onclick="">Edit</a>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="container d-flex align-items-center justify-content-center" style="height: 15%;"><a
                    href="{{route('createCustomer')}}" class="btn btn-success">Add Customer</a></div>
        </div>
    </div>

    <script>
        document.getElementById('reload').addEventListener("change", function () {
            var val = this.value; // Get selected value

            // Redirect dynamically based on the selected option
            if (val === "Opportunity") {
                window.location.href = "/Opportunity";
            } else if (val === "Deal") {
                window.location.href = "/Deal";
            }
        });

        //opportunity
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete it?")) {

                window.location.href = "Opportunity/deleteOpportunity/" + id;
            }
        }

        function updateStatus(selected, id) {
            if (selected.value == "deal") {
                window.location.href = "Opportunity/UpdateOpportunityStatus/" + id + "/" + selected.value;
            } else if (selected.value == "open") {
                window.location.href = "Opportunity/UpdateOpportunityStatus/" + id + "/" + selected.value;
            }
        }

        //deal
        function confirmDelete2(id) {
            if (confirm("Are you sure you want to delete it?")) {

                window.location.href = "Deal/DeleteDeal/" + id;
            }
        }

        function updateStatus2(selected, id) {
            window.location.href = "Deal/UpdateDealStatus/" + id + "/" + selected.value;

        }
    </script>
@endsection

{{-- deal --}}


{{-- opportunity --}}







{{-- <div class="w-25 h-100 bg-success">
    <div class="h-50">
        <div>Activities</div>
        <div>
            <div>Nasus january</div>
            <div>Nasus january</div>
            <div>Nasus january</div>
        </div>
    </div>
    <div class="h-50 container bg-white d-flex flex-column">
        <div>Opportunities</div>
        <div class="w-100">
            <div class="rounded bg-white d-flex justify-content-between container align-items-center mb-2">
                <div class="w-75 ">
                    <div style="text-align:start; font-size: 20px;">
                        Title Here
                    </div>
                    <div style="text-align:start; font-size: 15px;">Description</div>
                </div>
                <div class="w-25">
                    <select name="" id="" class="form-control-sm">
                        <option value="">Open</option>
                        <option value="">Deal</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div> --}}