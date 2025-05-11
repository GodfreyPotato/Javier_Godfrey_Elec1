@extends('Customer.master')

@section('content')

    <div class="bg-white w-100  d-flex" style="height: 80%;">
        <div class="w-25 h-100 rounded shadow">

            <div class=" container bg-white d-flex flex-column" style="height: 80%;">
                <div class="text-start my-2 ">
                    <h4>History</h4>
                </div>
                <div class="w-100 shadow-sm " style="overflow-y: auto; height: 90%; max-height:90%;">
                    @foreach ($rates as $rate)
                        <div
                            class="rounded {{$rate->remark == 'good' ? 'bg-success' : 'bg-danger'}} text-white d-flex justify-content-between p-1 align-items-center mb-2 rounded shadow-sm">

                            <div>{{$rate->title}}</div>

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


                            {{-- <span style="font-size: 18px; font-weight: bold;"><a
                                    href="{{route('clientHome', ['id' => $deal->id])}}">{{$deal->title}}</a></span> --}}
                            <div style="font-size: 14px;">{{$deal->description}}</div>
                        </div>
                        <div class="d-flex  align-items-center" style="width:40%;">
                            <div style="flex:1;">
                                <div><span style="font-size: 16px; font-weight: bold;">Amount</span></div>
                                <div><span style="font-size: 14px;"> ₱{{$deal->amount}}</span></div>
                            </div>
                            <div style="flex:1;">
                                <select onchange="updateStatus2(this,{{$deal->id}})" name="status"
                                    style="font-size: 14px; width: 90%;" class="form-control ">
                                    <option disabled {{$deal->status == "pending" ? "selected" : ""}}>Pending
                                    </option>
                                    <option value="good" {{$deal->status == "good" ? "selected" : ""}}>Good</option>
                                    <option value="bad" {{$deal->status == "bad" ? "selected" : ""}}>Bad</option>
                                </select>
                            </div>

                            @if ($deal->status == "pending")
                                {{-- <div style="flex:1;"> <a href="{{route('editDeal', ['id' => $deal->id])}}"
                                        class="btn btn-warning btn-md" style="font-size: 14px;">Edit</a>
                                </div> --}}
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

                            <div style="font-size: 18px;">{{$opportunity->title}}</div>

                        </div>
                    @endforeach

                </div>
            </div>
            {{-- <div class="container d-flex align-items-center justify-content-center" style="height: 15%;"><a
                    href="{{route('logout')}}" class="btn btn-danger">Log Out</a></div> --}}
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
            window.location.href = "/Deal/UpdateDealStatus/" + id + "/" + selected.value;

        }
    </script>

@endsection
@section('name')
    Welcome {{$customer[0]->name}}!
@endsection