<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function home(string $select = "Opportunity")
    {
        $customers = DB::select("select * from customers");
        $selected = "";
        $home = [];
        if ($select == "Opportunity") {
            $selected = "Opportunity";
            $home = DB::select("select *,  opportunities.id as op_id from opportunities join customers on opportunities.customer_id = customers.id");
        } else {
            $selected = "Deal";
            $home = DB::select("select * from deals");
        }

        return view("home", compact('customers', 'home', 'selected'));
    }
}
