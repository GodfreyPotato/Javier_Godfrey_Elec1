<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $customer = User::where('id', Auth::id())->get();
        $opportunities = Opportunity::where('cust_id', Auth::id())
            ->where('status', 'pending')
            ->get();
        $deals = Deal::join('opportunities', 'deals.opportunity_id', 'opportunities.id')
            ->join('users', 'deals.staff_id', 'users.id')
            ->where('deals.cust_id', '=', Auth::id())
            ->whereIn('remark', ['ongoing', 'done'])
            ->orderBy('deals.created_at', 'desc')
            ->select('*', 'users.name as staff', 'deals.created_at as date', 'deals.id as id')
            ->get();
        $rates = Deal::where('deals.cust_id', '=', Auth::id(),)
            ->join('opportunities', 'deals.opportunity_id', 'opportunities.id')
            ->join('users', 'deals.staff_id', 'users.id')
            ->orderBy('deals.updated_at', 'desc')
            ->select('*', 'deals.updated_at as date', 'users.name as staff', 'deals.id as id')
            ->whereIn('remark', ['good', 'bad'])->get();
        return view('Customer.home', compact('deals', 'opportunities', 'rates', 'customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
