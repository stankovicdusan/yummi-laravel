<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FoodType;
use App\TypeOfMeat;

class HomeController extends Controller
{
    public function index()
    {
        $foodType = FoodType::all();
        $typeMeat = TypeOfMeat::all();

        return view('pages.home', [
            'foodtype' => $foodType,
            'typeMeat' => $typeMeat
        ]);
    }
}
