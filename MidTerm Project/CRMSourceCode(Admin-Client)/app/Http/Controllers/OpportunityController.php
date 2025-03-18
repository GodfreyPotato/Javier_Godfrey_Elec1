<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OpportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        //
        $opportunity = DB::select("select *, opportunities.id as op_id, opportunities.updated_at as updated from customers join opportunities on customers.id=opportunities.customer_id join activities on opportunities.activity_id = activities.id where opportunities.id = ? ", [$id]);
        $opportunity[0]->updated = Carbon::parse($opportunity[0]->updated)->format('F j, Y');

        return view('Admin.Read.Opportunity', compact('opportunity'));
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
        $opportunity = DB::select("select * from opportunities where activity_id = ?", [$id]);
        return view("Admin.Update.Opportunity", compact('opportunity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'estimated_value' => 'required|numeric',
            'description' => 'required|string'
        ], [
            'title.required' => 'Title is required!',
            'estimated_value.required' => 'Estimated value is required!',
            'description.required' => 'Description is required!'
        ]);


        try {
            DB::update("update opportunities set title=?, estimated_value =?, description = ? where id=?", [$validatedData['title'], $validatedData['estimated_value'], $validatedData['description'], $id]);
            return redirect()->route("viewOpportunity", ['id' => $id])->with('success', "Modified Successfully!");
        } catch (Exception) {
            return redirect()->route("editOpportunity", ['id' => $id])->with('error', "Something went wrong!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        DB::delete("delete from opportunities where id = ?", [$id]);
        return redirect()->route('home')->with('success', "Opportunity deleted successfully!");
    }

    public function updateStatus(string $id, string $status)
    {
        DB::update("update opportunities set status= ? where id = ?", [$status, $id]);
        if ($status == "deal") {
            $dataFromOpportunities = DB::select("select * from opportunities where id = ?", [$id]);
            DB::insert("insert into deals(opportunity_id,title,description,amount, created_at, updated_at) values (?,?,?,?,?,?)", [$dataFromOpportunities[0]->id, $dataFromOpportunities[0]->title, $dataFromOpportunities[0]->description, $dataFromOpportunities[0]->estimated_value, now(), now()]);
            return redirect()->route("home")->with("success", "Statuts updated!");
        } else if ($status == "open") {
            try {
                DB::delete("delete from deals where opportunity_id = ?", [$id]);
                return redirect()->route("home")->with("success", "Statuts updated!");
            } catch (Exception) {
                return redirect()->route("home")->with("success", "Statuts updated!");
            }
        }
    }
}
