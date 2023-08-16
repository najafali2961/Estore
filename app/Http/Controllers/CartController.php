<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function index()
    {
        $customer = Customer::all();
        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
        $subtotal = 0; // Calculate subtotal
        $tax = 0;     // Calculate tax
        $total = 0;   // Calculate total
        $totoalitem = Cart::count();
        return view('admin.cart.index', compact('cartItems','customer', 'subtotal', 'tax', 'totoalitem','total'));
    }


    public function addToCart(Request $request)
{
    $productId = $request->input('product_id');
    $product = Product::find($productId);

    if (!$product) {
        return response()->json(['error' => 'Product not found.'], 404);
    }

    Cart::create([
        'user_id' => auth()->id(),
        'product_id' => $product->id,
        'quantity' => 1,
    ]);

    // You can also return updated cart data if needed
    $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
    $subtotal = 0; // Calculate subtotal
    $tax = 0;     // Calculate tax
    $total = 0;   // Calculate total

    return response()->json([
        'success' => 'Product added to cart.',
        'cartItems' => $cartItems,
        'subtotal' => $subtotal,
        'tax' => $tax,
        'total' => $total,
    ]);
}
    public function removeFromCart($cartItemId)
    {
        $cartItem = Cart::find($cartItemId);

        if (!$cartItem) {
            return redirect()->back()->with('error', 'Cart item not found.');
        }

        $cartItem->delete();

        return redirect()->route('admin.cart.index')->with('success', 'Product removed from cart.');
    }

}
