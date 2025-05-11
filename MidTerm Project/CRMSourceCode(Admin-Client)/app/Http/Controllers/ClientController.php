<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //

    public function home()
    {
        $customer = DB::select("select * from customers where id = ?", [Auth::id()]);
        $opportunities = DB::select("select * from opportunities where customer_id = ? and status = ? ", [Auth::id(), "open"]);
        $deals = DB::select("select * from deals where customer_id = ? and status = ?", [Auth::id(), "pending"],);
        $rates = DB::select("select * from deals where customer_id = ? and status != ?", [Auth::id(), "pending"]);
        return View('Customer.home', compact('deals', 'opportunities', 'rates', 'customer'));
    }
    //create Opportunity in client side
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'title' => "required|max:255|string",
            'description' => "required|string",
            "estimated_value" => "required|numeric|min:1"
        ],);

        try {

            DB::insert("insert into activities(interaction_type, created_at, updated_at) values(?,?,?)", ['web', now(), now()]);
            $activityId = DB::getPdo()->lastInsertId();
            DB::insert("insert into opportunities(customer_id,activity_id,title,description,estimated_value,created_at,updated_at) values(?,?,?,?,?,?,?)", [Auth::id(), $activityId, $validatedData['title'], $validatedData['description'], $validatedData['estimated_value'], now(), now()]);
            return redirect()->route("clientHome");
        } catch (Exception) {
            return redirect()->route("clientHome");
        }
    }

    public function createOpportunity()
    {
        return View('customer.createOpportunity');
    }
    public function edit(string $id)
    {
        //
        $deal = DB::select("select * from deals where id = ?", [$id]);
        return view("Customer.updateDeal", compact('deal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'description' => 'required|string'
        ]);


        try {
            DB::update("update deals set title = ?, amount =?, description = ? where id=?", [$validatedData['title'], $validatedData['amount'], $validatedData['description'], $id]);
            return redirect()->route("clientHome")->with('success', "Modified Successfully!");
        } catch (Exception) {
            return redirect()->route("clientHome")->with('error', "Something went wrong!");
        }
    }
}
