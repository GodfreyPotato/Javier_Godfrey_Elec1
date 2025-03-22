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
            "estimated_value" => "required|numeric"
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
}
