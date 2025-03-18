<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //

    public function home()
    {
        $deals = DB::select("select * from deals where id = ?", [Auth::id()]);
        return View('Customer.home', compact('deals'));
    }
}
