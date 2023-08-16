<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:20',
            'country' => 'nullable',
            'city' => 'nullable',
            'address' => 'required|max:255',
            'description' => 'nullable',

        ]);

        $customer = new Customer;
        $customer->customer_name = $validatedData['customer_name'];
        $customer->email = $validatedData['email'];
        $customer->phone = $validatedData['phone'];
        $customer->country = $validatedData['country'];
        $customer->city = $validatedData['city'];
        $customer->address = $validatedData['address'];
        $customer->description = $validatedData['description'];



        $customer->save();

        return redirect()->route('admin.customer.index')->with('success', 'Customer added successfully!');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'customer_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:20',
            'country' => 'nullable',
            'city' => 'nullable',
            'address' => 'required|max:255',
            'description' => 'nullable',

        ]);
        $customer = Customer::findOrFail($id);
        $customer->customer_name = $validatedData['customer_name'];
        $customer->email = $validatedData['email'];
        $customer->phone = $validatedData['phone'];
        $customer->country = $validatedData['country'];
        $customer->city = $validatedData['city'];
        $customer->address = $validatedData['address'];
        $customer->description = $validatedData['description'];


        $customer->update();

        return redirect()->route('admin.customer.index')->with('success', 'Customer updated successfully!');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();


    }
}
