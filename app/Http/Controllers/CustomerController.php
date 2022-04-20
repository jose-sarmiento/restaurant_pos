<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $sortBy = $request->query('sortby');

        $customers = DB::table('customers')
            ->leftJoin('orders', 'orders.customer_id', '=', 'customers.id')
            ->select('customers.*', DB::raw('COUNT(orders.customer_id) as no_of_orders'))
            ->groupBy('customers.id')
            ->paginate(15);
        return response()->json($customers);
    }

    public function search(Request $request)
    {
        $keyword = $request->query('q');
        $customers = Customer::where('firstname', 'like', '%' . $keyword . '%')
            ->orWhere('lastname', 'like', '%' . $keyword . '%')
            ->paginate(15);

        return response()->json(["result" => $customers]);
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

    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'address' => 'required',
        ]);

        $data = $request->all();
        $customer = Customer::create($data);
        return response()->json($customer, 201);
    }

    public function show(Customer $customer)
    {
        return response()->json($customer);
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

    public function update(Request $request, Customer $customer)
    {
        $this->validate($request, [
            'firstname' => 'min:2',
            'lastname' => 'min:2',
        ]);

        if ($request->has('firstname')) $customer->firstname = $request->firstname;
        if ($request->has('lastname')) $customer->lastname = $request->lastname;
        if ($request->has('image')) $customer->image = $request->image;
        if ($request->has('address')) $customer->address = $request->address;

        if (!$customer->isDirty()) {
           return response()->json([
                "error" => "You need to specify another value", 
                "code" => 422
            ], 422); 
        }

        $customer->save();
        return response()->json($customer);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json(["message" => "success"]);
    }
}
