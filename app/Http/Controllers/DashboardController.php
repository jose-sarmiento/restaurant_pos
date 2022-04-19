<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
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
    }
}
