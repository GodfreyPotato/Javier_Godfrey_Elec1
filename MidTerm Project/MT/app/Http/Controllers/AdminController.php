<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Deal;
use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $good = Deal::where('remark', 'good')->count();
        $bad = Deal::where('remark', 'bad')->count();
        $ongoing = Deal::where('remark', 'ongoing')->count();
        //
        $deals = Deal::whereIn('remark', ['good', 'bad', 'ongoing'])->orderBy('deals.updated_at', 'desc')
            ->join('opportunities', 'deals.opportunity_id', 'opportunities.id')
            ->join('users as staff', 'deals.staff_id', 'staff.id')
            ->join('users as customer', 'deals.cust_id', 'customer.id')
            ->select('*', 'staff.name as staff_name',  'customer.name as customer_name', 'deals.updated_at as date')
            ->get();

        return view('admin.home', compact('deals', 'good', 'bad', 'ongoing'));
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

    public function search(?string $word)
    {
        $data = "";
        if (strlen($word) > 0) {
            $results = Opportunity::where('title', 'like', "%$word%")->get();

            foreach ($results as $result) {
                $url = route('showOpportunity', ['opportunity' => $result]);
                $data .= "<a href='$url'><li style='font-size:16px;'>$result->title</li></a>";
            }
        }

        return $data;
    }

    public function showOpportunity(Opportunity $opportunity)
    {
        $deal = Deal::find($opportunity->id);

        if ($deal) {
            $opportunity = Deal::join('opportunities', 'deals.opportunity_id', 'opportunities.id')
                ->join('users as staff', 'deals.staff_id', 'staff.id')
                ->join('users as customer', 'deals.cust_id', 'customer.id')
                ->where('opportunity_id', $opportunity->id)
                ->select('*', 'customer.name as customer_name', 'staff.name as staff_name')
                ->first();
        } else {
            $opportunity = Opportunity::join('users as customer', 'opportunities.cust_id', 'customer.id')
                ->where('opportunities.id', $opportunity->id)
                ->select('*', 'name as customer_name')
                ->first();
        }

        return view('Admin.viewOpportunity', compact('opportunity'));
    }


}
