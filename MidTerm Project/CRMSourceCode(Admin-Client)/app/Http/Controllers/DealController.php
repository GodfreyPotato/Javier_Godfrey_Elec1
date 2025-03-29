<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

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
        $deal = DB::select("select * from deals where id = ?", [$id]);
        return view("Admin.Update.Deal", compact('deal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'description' => 'required|string'
        ], [
            'title.required' => 'Title is required!',
            'amount.required' => 'Estimated value is required!',
            'description.required' => 'Description is required!'
        ]);


        try {
            DB::update("update deals set title = ?, amount =?, description = ? where id=?", [$validatedData['title'], $validatedData['amount'], $validatedData['description'], $id]);
            return redirect()->route("home")->with('success', "Modified Successfully!");
        } catch (Exception) {
            return redirect()->route("editOpportunity", ['id' => $id])->with('error', "Something went wrong!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, string $opId)
    {
        //
        DB::update("update opportunities set status = 'open' where id = ?", [$opId]);
        DB::delete("delete from deals where id = ?", [$id]);
        return redirect()->route('home')->with('success', "Deal deleted successfully!");
    }

    public function updateStatus(string $id, string $status)
    {
        DB::update("update deals set status= ? where id = ?", [$status, $id]);
        return redirect()->route("clientHome")->with("success", "Statuts updated!");
    }
}
