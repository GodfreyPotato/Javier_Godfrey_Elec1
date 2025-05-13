<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Deal;
use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DealController extends Controller
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
    public function show(Deal $deal)
    {

        $deal = Deal::join('users', 'deals.staff_id', 'users.id')
            ->join('opportunities', 'opportunities.id', 'deals.opportunity_id')
            ->where('deals.id', $deal->id)->first();

        return view('Staff.viewComment', compact('deal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deal $deal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deal $deal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function changeStatus(string $id)
    {
        $deal = Deal::find($id);
        $deal->remark = "done";
        $deal->save();

        $opportunity = Opportunity::find($deal->opportunity_id);
        $opportunity->status = "done";
        $opportunity->save();

        $activity = new Activity;
        $activity->user_id = Auth::id();
        $activity->action = 'finished task';
        $activity->action_id = $deal->id;
        $activity->action_in = 'deals';
        $activity->save();

        return back();
    }

    public function rateDeal(Request $request)
    {
        $deal = Deal::find($request->deal_id);
        $deal->remark = $request->deal_remark;
        $deal->comment = $request->comment;
        $deal->save();

        $activity = new Activity;
        $activity->user_id = Auth::id();
        $activity->action = 'rated deal';
        $activity->action_id = $deal->id;
        $activity->action_in = 'deals';
        $activity->save();

        return redirect()->back();
    }

    public function cancel(string $id)
    {
        $deal = Deal::find($id);

        $opportunity = Opportunity::find($deal->opportunity_id);
        $opportunity->status = "pending";
        $opportunity->save();

        $activity = new Activity;
        $activity->user_id = Auth::id();
        $activity->action = 'cancel deal';
        $activity->action_id = $deal->id;
        $activity->action_in = 'deals';
        $activity->save();

        $deal->delete();

        return back()->with('success', 'Deal Cancelled');
    }
    public function destroy(Deal $deal)
    {
        //
    }
}
