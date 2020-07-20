<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\PaymentMethod;
use Illuminate\Support\Facades\Redis;

class ProductController extends Controller
{
    //this method returns only one product
    public function show($id)
    {
        $product = Product::find($id);

        return view('pages.single-product', [
            'product' => $product
        ]);
    }

    public function addToCart($id, Request $request)
    {
        $product = Product::find($id);

        $cart = session()->get('shop-cart');

        $cart[$product->id] = [
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->input('quantity'),
            'image' => $product->small_image,
            'pizza-size' => $request->input('pizza-size'),
            'pasta-weight' => $request->input('pasta-weight'),
            'addition' => $request->input('addition')
        ];

        try {
            session()->put('shop-cart', $cart);

            return redirect()->back()->with('success', 'Successfuly added to cart, go to checkout to complete your order!');
        } catch (\Exception $ex) {
            \Log::critical('Something went wrong with shopping cart: ' . $ex->getMessage());
            return redirect()->back()->with('error', 'Something went wrong, please try again later');
        }
    }

    public function delete($id)
    {
        session()->forget('shop-cart.' . $id);

        return redirect()->back();
    }

    public function checkout()
    {
        $payment_methods = PaymentMethod::all();

        return view('pages.checkout', [
            'payment_methods' => $payment_methods
        ]);
    }
}
