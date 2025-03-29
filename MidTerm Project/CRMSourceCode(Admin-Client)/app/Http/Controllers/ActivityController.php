<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $activities = DB::table('opportunities')
            ->join("activities", "opportunities.activity_id", "=", "activities.id")
            ->join("customers", "customers.id", "=", "opportunities.customer_id")
            ->select("*", "activities.created_at as created", "opportunities.id as opportunity_id")

            ->orderBy("activities.created_at", "Desc")
            ->simplePaginate(5);

        foreach ($activities as $activity) {
            $activity->created = Carbon::parse($activity->created)->format("F j, Y");
        }

        return view("Admin.Read.Activities", compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(?string $id = null)
    {
        //
        $customers = DB::select("select * from customers");
        if (!empty($id)) {
            $selected = DB::select("select * from customers where id = ?", [$id]);
            return view("Admin.Create.Interaction", compact('customers', 'selected'));
        }
        return view("Admin.Create.Interaction", compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'title' => "required|max:255|string",
            'description' => "required|string",
            'customer_id' => "required",
            'interaction_type' => "required",
            "estimated_value" => "required|numeric"
        ], [
            'title.required' => "Title is required!",
            'description.required' => "Description is required!",
            'customer_id.required' => "Customer is required!",
            'interaction_type.required' => "Interaction is required!",
            "estimated_value.required" => "Estimated Value is required!"
        ]);

        try {
            DB::insert("insert into activities(interaction_type, created_at, updated_at) values(?,?,?)", [$validatedData["interaction_type"], now(), now()]);
            $activityId = DB::getPdo()->lastInsertId();
            DB::insert("insert into opportunities(customer_id,activity_id,title,description,estimated_value,created_at,updated_at) values(?,?,?,?,?,?,?)", [$validatedData['customer_id'], $activityId, $validatedData['title'], $validatedData['description'], $validatedData['estimated_value'], now(), now()]);
            return redirect()->route("createInteraction", ['id', $request->customer_id])->with("success", "Interaction recorded!");
        } catch (Exception) {
            return redirect()->route("createInteraction", ['id', $request->customer_id])->with("error", "Something went wrong!");
        }
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
