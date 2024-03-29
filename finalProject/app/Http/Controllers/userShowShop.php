<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\insertCompany;
use App\Models\repairShop;

class userShowShop extends Controller
{
    public function show(){
        
        $shops=repairShop::paginate(6);
        
        return view('userShowShop')->with('shops',$shops);
    }

   
    public function search(){
        $r=request();//retrive submited form data
        $keyword=$r->searchShop;
        $shops =DB::table('repair_shops')
        ->leftjoin('insert_companies', 'insert_companies.id', '=', 'repair_shops.companyID')
        ->select('insert_companies.name as comname','insert_companies.id as comid','repair_shops.*')
        ->Where('repair_shops.name', 'like', '%' . $keyword . '%')
        ->orwhere('repair_shops.address', 'like', '%' . $keyword . '%')
        ->orWhere('repair_shops.city', 'like', '%' . $keyword . '%')
        ->orWhere('repair_shops.state', 'like', '%' . $keyword . '%')
        ->paginate(6);
        
               
        return view('userShowShop')->with('shops',$shops);

    }
}
