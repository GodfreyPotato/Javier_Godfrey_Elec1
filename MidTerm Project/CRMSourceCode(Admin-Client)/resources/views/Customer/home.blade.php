@extends('Customer.master')

@section('content')

    <div class="bg-white w-100  d-flex" style="height: 80%;">

        <div class="w-75 d-flex flex-column align-items-center px-5 container h-100">
            <div class="w-100 d-flex align-items-center my-4">

                <h2>Accepted Opportunities</h2>
                @if(session('success'))
                    <span class="text-success">{{session('success')}}</span>
                @else @if(session('delete'))
                    <span class="text-success">{{session('delete')}}</span>
                @endif
                @endif
            </div>
            <div class=" w-100 d-flex flex-column align-items-center h-75">
                @foreach ($deals as $deal)
                    <div class="w-100 rounded shadow-sm bg-white d-flex justify-content-between p-2 align-items-center mb-2">
                        <div>

                            <span style="font-size: 18px; font-weight: bold;"><a
                                    href="{{route('clientHome', ['id' => $deal->id])}}">{{$deal->title}}</a></span>

                            <div style="font-size: 14px;">{{$deal->name}}</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center" style="width:40%;">
                            <div>
                                <div><span style="font-size: 16px; font-weight: bold;">Amount</span></div>
                                <div><span style="font-size: 14px;"> ₱{{$deal->amount}}</span></div>
                            </div>

                            <div><a href="" onclick="confirmDelete({{$deal->op_id}})" class="btn btn-danger btn-md"
                                    style="font-size: 14px;">Delete</a></div>
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
                    <h4>Customers</h4>
                </div>
                <div class="w-100 shadow-sm " style="overflow-y: auto; height: 90%; max-height:90%;">
                    {{-- @foreach ($customers as $customer)
                    <div
                        class="rounded bg-white d-flex justify-content-between p-1 align-items-center mb-2 rounded shadow-sm">

                        <a href="{{route('viewCustomer', ['id' => $customer->id])}}"
                            style="font-size: 17px; text-decoration: none;">{{$customer->name}}</a>
                        <a href="{{route('editCustomer', ['id' => $customer->id])}}" class="btn btn-secondary btn-sm"
                            onclick="">Edit</a>
                    </div>
                    @endforeach --}}

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
                window.location.href = "/home/Opportunity";
            } else if (val === "Deal") {
                window.location.href = "/home/Deal";
            }
        });

        //opportunity
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete it?")) {

                window.location.href = "/Opportunity/deleteOpportunity/" + id;
            }
        }

        function updateStatus(selected, id) {
            if (selected.value == "deal") {
                window.location.href = "/Opportunity/UpdateOpportunityStatus/" + id + "/" + selected.value;
            } else if (selected.value == "open") {
                window.location.href = "/Opportunity/UpdateOpportunityStatus/" + id + "/" + selected.value;
            }
        }

        //deal
        function confirmDelete2(id) {
            if (confirm("Are you sure you want to delete it?")) {

                window.location.href = "/Deal/DeleteDeal/" + id;
            }
        }

        function updateStatus2(selected, id) {
            window.location.href = "/Deal/UpdateDealStatus/" + id + "/" + selected.value;

        }
    </script>

@endsection