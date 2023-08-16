<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('admin.suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'supplier_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:20',
            'country' => 'nullable',
            'city' => 'nullable',
            'address' => 'required|max:255',
            'description' => 'nullable',

        ]);

        $supplier = new Supplier;
        $supplier->supplier_name = $validatedData['supplier_name'];
        $supplier->email = $validatedData['email'];
        $supplier->phone = $validatedData['phone'];
        $supplier->country = $validatedData['country'];
        $supplier->city = $validatedData['city'];
        $supplier->address = $validatedData['address'];
        $supplier->description = $validatedData['description'];



        $supplier->save();

        return redirect()->route('admin.supplier.index')->with('success', 'supplier added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('admin.suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'supplier_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:20',
            'country' => 'nullable',
            'city' => 'nullable',
            'address' => 'required|max:255',
            'description' => 'nullable',

        ]);
        $supplier = Supplier::findOrFail($id);
        $supplier->supplier_name = $validatedData['supplier_name'];
        $supplier->email = $validatedData['email'];
        $supplier->phone = $validatedData['phone'];
        $supplier->country = $validatedData['country'];
        $supplier->city = $validatedData['city'];
        $supplier->address = $validatedData['address'];
        $supplier->description = $validatedData['description'];


        $supplier->update();

        return redirect()->route('admin.supplier.index')->with('success', 'supplier updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

    }
}
