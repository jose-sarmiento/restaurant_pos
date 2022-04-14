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
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'image' => 'required',
            'address' => 'required',
        ]);
 
        $customer = Customer::create([
            "firstname" => $request->firstname,
            "lastname" => $request->lastname,
            "image" => $request->image,
            "address" => $request->address,
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
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'image' => 'required',
            'address' => 'required',
        ]);

        $customer = Customer::find($id);
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->image = $request->image;
        $customer->address = $request->address;
        $customer->save();

        return response()->json($customer);
    }

    public function destroy(Customer $customer)
    {
        $deleted_custmer = $customer->delete();
        return $deleted_custmer;
    }
}
