<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    //
    public function login()
    {
        return view('login');
    }

    // Handle Login Request
    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        $adminEmail = "admin@admin.com";
        $adminPassword = "adminadmin";


        if ($credentials['email'] === $adminEmail && $credentials['password'] === $adminPassword) {
            Session::put('auth_admin', true);
            return redirect()->route('home');
        } else {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('clientHome');
            }
        }


        return back()->withErrors([
            'email' => 'Invalid credentials. Please try again.',
        ]);
    }


    // Show Registration Form
    public function register()
    {
        return view('registration');
    }

    // Handle Registration Request
    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:6|confirmed',
            'birthdate' => 'required|date',
            'address' => 'required|string',

        ]);

        // Insert customer into the database
        DB::insert(
            "insert into customers(name,email,password,birthdate,address, created_at, updated_at) values (?,?,?,?,?,?,?)",
            [$validated['name'], $validated['email'], bcrypt($validated['password']), $validated['birthdate'], $validated['address'], now(), now()]
        );
        return redirect()->route('login'); // Redirect to home after registration
    }


    public function logout(Request $request)
    {
        // Manually logout by forgetting session data
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
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
                ->select('opportunities.*', 'customers.name', 'opportunities.id as op_id', "opportunities.created_at as created")
                ->where('status', '=', 'open')
                ->orderBy('created_at', 'desc')
                ->simplePaginate(5);

            foreach ($home as $op) {
                $op->created = Carbon::parse($op->created)->format('F j, Y');
            }
        } else {
            $selected = "Deal";
            $home = DB::table('deals')->select("deals.*", 'opportunities.id as opId')->join('opportunities', 'deals.opportunity_id', '=', 'opportunities.id')->where('deals.status', '=', 'pending')->orderBy('deals.created_at', 'desc')->simplePaginate(5);
            foreach ($home as $op) {
                $op->created_at = Carbon::parse($op->created_at)->format('F j, Y');
            }
        }
        return view("Admin.home", compact('customers', 'home', 'selected'));
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


    public function history()
    {
        $deals = DB::table('deals')->where('status', '!=', 'pending')->simplePaginate(5);

        return View('admin.read.history', compact('deals'));
    }
}
