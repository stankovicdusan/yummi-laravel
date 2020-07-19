<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //this method returns maximum price of all products
    public function getMaxPrice()
    {
        return \DB::table('products')
            ->select('price')
            ->orderBy('price', 'desc')
            ->get()->first();
    }

    //this method returns minimum price of all products
    public function getMinPrice()
    {
        return \DB::table('products')
            ->select('price')
            ->orderBy('price', 'asc')
            ->get()->first();
    }

    //this method is triggered when ajax send request and then filter data
    public function filter($request)
    {
        $products = \DB::table('products');

        //this block of code is called if user use price range
        if ($request->has('price_range')) {
            $priceRange = explode(';', $request->input('price_range'));

            $products = $products->whereBetween('price', [$priceRange[0], $priceRange[1]]);
        }

        //this block of code is called if user write something in search input
        if ($request->has('search')) {
            $products = $products->where('name', 'like', '%' . $request->input('search') . '%');
        }

        //this block of code is called if user click on checkboxes
        if ($request->has('type_food')) {
            $products = $products->whereIn('food_type_id', $request->input('type_food'));
        }

        //this block of code is called if user click on checkboxes
        if ($request->has('type_meat')) {
            $products = $products->whereIn('type_meat_id', $request->input('type_meat'));
        }

        return $products->get();
    }
}
