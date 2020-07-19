<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FoodType;
use App\TypeOfMeat;
use App\Product;

class HomeController extends Controller
{
    //constructor with created object on Product class, this is done because we don't want code to repeat
    //this way on just one place we create object and later use it on our methods
    private $model;
    public function __construct()
    {
        $this->model = new Product();
    }

    //main method, returns categories, products, min and max price to the homepage
    public function index()
    {
        $foodType = FoodType::all();
        $typeMeat = TypeOfMeat::all();

        $products = Product::all();

        $maxPrice = $this->model->getMaxPrice();
        $minPrice = $this->model->getMinPrice();

        return view('pages.home', [
            'foodtype' => $foodType,
            'typeMeat' => $typeMeat,
            'products' => $products,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice
        ]);
    }

    //this method is used for filtering data on homepage
    public function filter(Request $request)
    {
        if ($request->ajax()) {
            $products = $this->model->filter($request);

            return $products;
        }
    }
}
