<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Deal;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $reports = Report::join('deals', 'reports.deal_id', 'deals.id')
            ->join('users as customer', 'deals.cust_id', 'customer.id')
            ->join('users as staff', 'deals.staff_id', 'staff.id')
            ->join('opportunities', 'deals.opportunity_id', 'opportunities.id')
            ->select('*', 'staff.name as staff_name', 'customer.name as customer_name', 'reports.updated_at as date', 'reports.comment as comment')
            ->orderBy('reports.updated_at', 'desc')
            ->simplePaginate(10);

        return view('Admin.viewReports', compact('reports'));
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
        $validator = Validator::make($request->all(), [
            'reason' => 'required|string',
            'comment' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $report = new Report;
        $report->comment = $request->comment;
        $report->reason = $request->reason;
        $report->cust_id = Auth::id();
        $report->deal_id = $request->deal_id;
        $report->save();

        $activity = new Activity;
        $activity->user_id = Auth::id();
        $activity->action = 'report deal';
        $activity->action_id = $request->deal_id;
        $activity->action_in = 'deals';
        $activity->save();

        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }

    public function reportDeal(Deal $deal)
    {

        $deal = Deal::join('opportunities', 'deals.opportunity_id', 'opportunities.id')
            ->join('users as staff', 'deals.staff_id', 'staff.id')
            ->where('deals.id', $deal->id)
            ->select('*', 'staff.name as staff_name', 'staff.id as staff_id', 'deals.id as deal_id')
            ->first();

        return view('Customer.reportDeal', compact('deal'));
    }
}
