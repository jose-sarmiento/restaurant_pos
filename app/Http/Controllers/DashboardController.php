<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
=======
use DB;
>>>>>>> origin/master
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
<<<<<<< HEAD
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
=======
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $total_revenue = DB::table('orders')->sum('total_payment');
        $total_orders = DB::table('orders')->count();
        $total_customers = DB::table('customers')->count();
            
        return response()->json([
            "total" => [
                "revenue" => $total_revenue,
                "orders" => $total_orders,
                "customers" => $total_customers,
            ]
        ]);
>>>>>>> origin/master
    }
}
