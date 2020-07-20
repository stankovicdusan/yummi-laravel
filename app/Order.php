<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $email;
    public $firstName;
    public $lastName;
    public $address;
    public $city;
    public $postcode;
    public $phoneNumber;
    public $paymentMethod;

    //method creates order
    public function insert()
    {
        \DB::transaction(function () {
            $id = \DB::table('orders')->insertGetId([
                'email' => $this->email,
                'first_name' => $this->firstName,
                'last_name' => $this->lastName,
                'address' => $this->address,
                'city' => $this->city,
                'postcode' => $this->postcode,
                'phone_number' => $this->phoneNumber,
                'payment_method_id' => $this->paymentMethod
            ]);

            foreach (session()->get('shop-cart') as $key => $product) {
                \DB::table('order_products')->insert([
                    'product_id' => $key,
                    'order_id' => $id,
                    'quantity' => $product['quantity']
                ]);
            }
        });
    }
}
