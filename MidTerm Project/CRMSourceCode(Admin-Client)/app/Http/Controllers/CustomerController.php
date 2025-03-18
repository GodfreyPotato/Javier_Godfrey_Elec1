<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
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
        return view('Admin.Create.Customer');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validatedData = $request->validate([
            'name' => "required|string|max:255",
            'email' => "required|email",
            'address' => "required|string|max:255",
            'birthdate' => "required|date",
        ], [
            "name.required" => "Name is required!",
            "email.required" => "Email is required!",
            "address.required" => "Address is required!",
            "birthdate.required" => "Birthdate is required!",
        ]);
      
        try {
            DB::insert("insert into customers(name,email,address,birthdate,password,created_at, updated_at) values(?,?,?,?,?,?,?)", [$validatedData['name'], $validatedData['email'], $validatedData['address'], $validatedData['birthdate'], bcrypt("12345678"), now(), now()]);
            return redirect()->route("createCustomer")->with("success", "New Customer Added!");
        } catch (Exception) {

            return redirect()->route("createCustomer")->with("error", "Something went wrong!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
        $customer = DB::select("select * from customers where id = ?", [$id]);
        $customer[0]->created_at = Carbon::parse($customer[0]->created_at)->format('F j, Y');
        return view("Admin.Read.Customer", compact("customer"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
        $customer = DB::select("select * from customers where id = ?", [$id]);
        $customer[0]->created_at = Carbon::parse($customer[0]->created_at)->format('F j, Y');
        return view("Admin.Update.Customer", compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
        $validatedData = $request->validate([
            'name' => "required|string|max:255",
            'email' => "required|email",
            'address' => "required|string|max:255",
            'birthdate' => "required|date",
        ], [
            "name.required" => "Name is required!",
            "email.required" => "Email is required!",
            "address.required" => "Address is required!",
            "birthdate.required" => "Birthdate is required!",
        ]);

        try {
            DB::insert("update customers set name=?,email=?,address=?,birthdate=?, updated_at=? where id=?", [$validatedData['name'], $validatedData['email'], $validatedData['address'], $validatedData['birthdate'], now(), $id]);
            return redirect()->route("editCustomer", ['id' => $id])->with("success", "Customer updated!");
        } catch (Exception) {

            return redirect()->route("editCustomer", ['id' => $id])->with("error", "Something went wrong!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::delete("delete from customers where id = ?", [$id]);
        return redirect()->route("home")->with("delete", "Account Successfully Deleted!");
    }
}
