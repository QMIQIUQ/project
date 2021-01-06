<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Phone; 
use App\Models\Category;
use Illuminate\Http\Request;

class welcomeController extends Controller
{
    public function index()
    {
        $products = Phone::take(8)->inRandomOrder()->get();

        return view('welcome')->with('products', $products);
    }
}
