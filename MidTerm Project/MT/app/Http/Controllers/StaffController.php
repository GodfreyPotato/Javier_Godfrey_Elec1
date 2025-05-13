<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Deal;
use App\Models\Opportunity;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $selected = "Opportunity")
    {
        //
        $home = [];

        $deals = Deal::where('staff_id', Auth::id())
            ->join('opportunities', 'deals.opportunity_id', 'opportunities.id')
            ->whereIn('remark', ['good', 'bad', 'done'])
            ->orderBy('deals.created_at', 'desc')
            ->select('*', 'deals.id as id')
            ->get();
        if ($selected == "Opportunity") {
            $home = Opportunity::join('users', 'opportunities.cust_id', '=', 'users.id')
                ->select("*", 'opportunities.id as id')->where('status', 'pending')
                ->orderBy('opportunities.created_at', 'desc')->simplePaginate(5);
        } else {
            $selected = "Deal";
            $home = Deal::join('users', 'deals.staff_id', 'users.id')
                ->join('opportunities', 'opportunities.id', 'deals.opportunity_id')
                ->where('deals.staff_id', Auth::id())
                ->where('remark', 'ongoing')
                ->select("*", 'deals.id as id')
                ->orderBy('deals.created_at', 'desc')->simplePaginate(5);
        }


        return view('staff.home', compact('selected', 'deals', 'home'));
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
