<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Deal;
use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class OpportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Customer.createOpportunity');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'amount' => 'required|numeric|min:1'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $opportunity = new Opportunity;
        $opportunity->title = $request->title;
        $opportunity->description = $request->description;
        $opportunity->cust_id = Auth::id();
        $opportunity->amount = $request->amount;
        $opportunity->save();

        $activity = new Activity;
        $activity->user_id = Auth::id();
        $activity->action = 'added opportunity';
        $activity->action_id = $opportunity->id;
        $activity->action_in = 'opportunities';
        $activity->save();

        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Opportunity $opportunity)
    {
        //

        return view('Staff.viewOpportunity', compact('opportunity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Opportunity $opportunity)
    {
        //
        return view('Customer.editOpportunity', compact('opportunity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Opportunity $opportunity)
    {
        //

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'amount' => 'required|numeric|min:1'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $opportunity->title = $request->title;
        $opportunity->description = $request->description;
        $opportunity->amount = $request->amount;
        $opportunity->save();

        $activity = new Activity;
        $activity->user_id = Auth::id();
        $activity->action = 'modified opportunity';
        $activity->action_id = $opportunity->id;
        $activity->action_in = 'opportunities';
        $activity->save();

        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function changeStatus(string $id)
    {
        $opportunity = Opportunity::find($id);
        $opportunity->status = 'ongoing';
        $opportunity->save();

        $deal = new Deal;
        $deal->opportunity_id = $id;
        $deal->cust_id = $opportunity->cust_id;
        $deal->staff_id = Auth::id();
        $deal->save();

        $activity = new Activity;
        $activity->user_id = Auth::id();
        $activity->action = 'accepted opportunity';
        $activity->action_id = $deal->id;
        $activity->action_in = 'deals';
        $activity->save();

        return redirect()->route('staff.index')->with('success', 'Opportunity Accepted');
    }
    public function destroy(Opportunity $opportunity)
    {
        //
    }
}
