<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FoodType;

class HomeController extends Controller
{
    public function index()
    {
        $foodType = FoodType::all();

        return view('pages.home', [
            'foodtype' => $foodType
        ]);
    }
}
