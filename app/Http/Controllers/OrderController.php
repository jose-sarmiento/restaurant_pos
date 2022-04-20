<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $payment_method = $request->query('pm');
        $status = $request->query('status');
        $type = $request->query('type');
        $byDate = $request->query('bydate');

        $orders = DB::table('orders')
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->join('menus', 'menus.id', '=', 'orders.menu_id')
            ->select(
                'orders.*', 
                DB::raw('CONCAT(customers.firstname," ",customers.lastname) as customer, customers.image as customer_image'), 
                DB::raw('menus.name as menu, menus.image as menu_image')
            )
            ->when($payment_method, function ($query, $payment_method) {
                    $query->where('payment_method', "=", $payment_method);
                })
            ->when($type, function ($query, $type) {
                    $query->where('type', "=", $type);
                })
            ->when($status, function ($query, $status) {
                    $query->where('status', "=", $status);
                })
            ->when($byDate === 'day', function ($query, $byDate) {
                    $query->whereDate('orders.created_at', Carbon::today());
                })
            ->when($byDate === 'week', function ($query, $byDate) {
                    $query->whereBetween("orders.created_at", [
                       Carbon::now()->startOfWeek()->format('Y-m-d'), 
                       Carbon::now()->endOfWeek()->format('Y-m-d')
                    ]);
                })
            ->when($byDate === 'month', function ($query, $byDate) {
                    $query->whereMonth('orders.created_at', Carbon::now()->month);
                })
            ->when($byDate === 'year', function ($query, $byDate) {
                    $query->whereYear('orders.created_at', Carbon::now()->year);
                })
            ->paginate(15);
            
        return response()->json($orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "customer_id" => 'required',
            "menu_id" => 'required',
            "total_payment" => 'required',
            "payment_method" => 'required',
            "qty" => 'required',
            "status" => [
                'required', 
                Rule::in(['completed', 'preparing', 'pending'])
            ],
            "type" => [
                'required', 
                Rule::in(['dine in', 'to go', 'delivery'])
            ]
        ]);
        $data = $request->all();
        $order = Order::create($data);
        return response()->json($order, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = DB::table('orders')
            ->where('orders.id', '=', $id)
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->join('menus', 'menus.id', '=', 'orders.menu_id')
            ->select(
                'orders.*', 
                DB::raw('CONCAT(customers.firstname," ",customers.lastname) as customer, customers.image as customer_image'), 
                DB::raw('menus.name as menu, menus.image as menu_image')
            )
            ->get();
        return response()->json($orders[0]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $this->validate($request, [
            "status" => Rule::in(['completed', 'preparing', 'pending']),
            "type" => Rule::in(['dine in', 'to go', 'delivery'])
        ]);

        if ($request->has('total_payment')) $order->total_payment = $request->total_payment;
        if ($request->has('payment_method')) $order->payment_method = $request->payment_method;
        if ($request->has('qty')) $order->qty = $request->qty;
        if ($request->has('status')) $order->status = $request->status;
        if ($request->has('type')) $order->type = $request->type;

        $order->save();
        return response()->json($order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json(["message" => "success"]);
    }
}
