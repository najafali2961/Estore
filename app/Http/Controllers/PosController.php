<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
        $subtotal = 0; // Calculate subtotal
        $tax = 0;     // Calculate tax
        $total = 0;   // Calculate total
        $categories = Category::all();
        $products = Product::all();
        $customers = Customer::all();
        return view('admin.pos.index',compact('categories','products','customers','cartItems', 'subtotal', 'tax', 'total'));
        // $categories = Category::with('products')->get(); // Assuming your model and relationship are named 'Category' and 'products'

        // return view('your.view.name', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
