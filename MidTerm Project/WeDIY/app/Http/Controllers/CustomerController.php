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
        $opportunities = Opportunity::where('id', Auth::id())->get();
        $deals = Deal::where('id', '=', Auth::id(), 'and', 'remark', '=', 'ongoing')->get();
        $rates = Deal::where('id', '=', Auth::id(), 'and', 'remark', '!=', 'ongoing')->get();
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
