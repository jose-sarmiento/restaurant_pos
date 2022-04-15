<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return response()->json(["data" => $customers]);
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
        return response()->json(["data" => $customer]);
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
        return response()->json(["data" => $customer]);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json(["message" => "success"]);
    }
}
