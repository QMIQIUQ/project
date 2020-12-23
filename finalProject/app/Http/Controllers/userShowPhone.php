<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Phone; 
use App\Models\Category;
Use Session;
class userShowPhone extends Controller
{
    public function show(){
        $products=Phone::paginate(4);
    
        return view('userShowPhone')->with('products',$products);
    }
    
}
