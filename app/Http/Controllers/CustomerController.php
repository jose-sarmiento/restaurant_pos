<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return response()->json($customers);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
        ]);
 
        $customer = Customer::create([
            "name" => $request->name
        ]);

        return response()->json($customer, 201);
    }

    public function show(Customer $customer)
    {
        return response()->json($customer);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
        ]);

        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->save();

        return response()->json($customer);
    }

    public function destroy(Customer $customer)
    {
        $deleted_custmer = $customer->delete();
        return $deleted_custmer;
    }
}
