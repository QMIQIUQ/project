<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Phone; 
use App\Models\Category;
Use Session;
use Auth;
use Illuminate\Http\Request;

class randomPhoneController extends Controller
{
    public function show()
    {
        $products = Phone::take(8)->inRandomOrder()->get();

        return view('random')->with('products',$products);
    }
}
