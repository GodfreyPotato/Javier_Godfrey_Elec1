<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('registration');
    }
    public function home(string $select = "Opportunity")
    {
        $customers = DB::select("select * from customers");
        $selected = "";
        $home = [];
        if ($select == "Opportunity") {
            $selected = "Opportunity";
            $home = DB::table('opportunities')
                ->join('customers', 'opportunities.customer_id', '=', 'customers.id')
                ->select('opportunities.*', 'customers.name', 'opportunities.id as op_id')
                ->simplePaginate(5);
        } else {
            $selected = "Deal";
            $home = DB::table('deals')->simplePaginate(5);
        }
        return view("home", compact('customers', 'home', 'selected'));
    }

    public function search(?string $word)
    {
        $data = "";
        if (strlen($word) > 0) {
            $results = DB::select("select * from opportunities where title like '%$word%'");

            foreach ($results as $result) {
                $url = route('viewOpportunity', ['id' => $result->id]);
                $data .= "<a href='$url'><li style='font-size:16px;'>$result->title</li></a>";
            }
        }

        return $data;
    }
}
