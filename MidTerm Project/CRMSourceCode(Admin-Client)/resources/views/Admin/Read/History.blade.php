@extends('Admin.master')
@section('content')
    @php
        $good = DB::select("select count(*) as good from deals where status = 'good'");
        $bad = DB::select("select count(*) as bad from deals where status = 'bad'");
    @endphp
    <div class="px-4">
        <div class="d-flex justify-content-center align-items-center">
            <div>
                <h1 class="text-dark text-start pt-3 px-2 ">History from Deals</h1>
                <h2>{{number_format($good[0]->good / ($good[0]->good + $bad[0]->bad) * 100, 2)}}% Succeess Transaction</h2>
            </div>
            <canvas id="myChart" style="width:100%;max-width:500px"></canvas>
        </div>
        <div class="py-3 px-2 text-white d-flex flex-column align-items-center">r

            @foreach ($deals as $deal)
                <div
                    class=" w-100 rounded p-2 shadow-sm {{$deal->status == 'good' ? 'bg-success' : 'bg-danger'}} d-flex justify-content-between p-2 align-items-center mb-2">
                    <div>
                        <div>
                            <span style="font-size: 18px; font-weight: bold;">{{$deal->title}}</span>
                        </div>
                        <div style="font-size: 14px;">{{$deal->description}}</div>
                    </div>
                    <div class="d-flex justify-content-around align-items-center" style="width:40%;">
                        <div style="flex:1;">
                            <div><span style="font-size: 16px; font-weight: bold;">Amount</span></div>
                            <div><span style="font-size: 14px;"> ₱{{$deal->amount}}</span></div>
                        </div>
                        <div style="flex:1;">{{strtoupper($deal->status)}}</div>

                        <div style="flex:1;"> <a href="" onclick="confirmDelete2({{$deal->id}},{{$deal->opportunity_id}})"
                                class="btn btn-warning btn-md" style="font-size: 14px;">Delete</a></div>


                    </div>
                </div>

            @endforeach
            <div class="mt-2 text-dark">{{$deals->links()}}</div>
        </div>
    </div>
    <script>
        function confirmDelete2(id, opId) {
            if (confirm("Are you sure you want to delete it?")) {

                window.location.href = "/Deal/DeleteDeal/" + id + "/" + opId;
            }
        }
    </script>
@endsection