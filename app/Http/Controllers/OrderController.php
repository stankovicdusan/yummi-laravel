<?php

namespace App\Http\Controllers;

use App\Order;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    public function store(OrderRequest $request)
    {
        $model = new Order();
        $model->email = $request->input('email');
        $model->firstName = $request->input('firstName');
        $model->lastName = $request->input('lastName');
        $model->address = $request->input('address');
        $model->city = $request->input('city');
        $model->postcode = $request->input('postcode');
        $model->phoneNumber = $request->input('phoneNumber');
        $model->paymentMethod = $request->input('pay_method');

        try {
            $model->insert();
            session()->forget('shop-cart');
            return redirect()->route('home')->with('success', 'Your order has completed successfuly!');
        } catch (\Exception $ex) {
            \Log::critical('Something is wrong with creating an order: ' . $ex->getMessage());
            return redirect()->route('home')->with('error', 'Something failed with your order, please try again later!');
        }
    }
}
