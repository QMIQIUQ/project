<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\insertCompany;
use App\Models\repairShop;
use App\Models\rating;
use Auth;
Use Session;
class ShopController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'ZIPcode' => ['required', 'string', 'max:255'],           
            'phoneNumber' => ['required', 'string', 'max:255'],
        ]);
    }
    public function create(){
        $companyID=insertCompany::where('insert_companies.userID','=',Auth::id())->get();
        return view('insertrepairShop')->with('companyID',$companyID);

    }
    public function store(){    
        $r=request(); 
        
        $addShop=repairShop::create([   
            'id'=>$r->ID,
            'companyID'=>$r->company,
            'name'=>$r->name, 
            'address'=>$r->address, 
            'city'=>$r->city,
            'state'=>$r->state,
            'country'=>$r->country,
            'ZIPcode'=>$r->ZIPcode,
            'phoneNumber'=>$r->phoneNumber,
            'ratingPoints'=>0,
            'ratingUser'=>0,
          
            
        ]);
        
        Session::flash('success',"Shop create succesful!");

        return redirect()->route('insertShop');
    }

    public function show(){
        $shops=repairShop::all();
    
        return view('showShop')->with('shops',$shops);
    }

    public function edit($id){
       
        $shops =repairShop::all()->where('id',$id);
        
        
        return view('editShop')->with('shops',$shops)
                                ->with('insert_companies',insertCompany::all());
    }

    public function delete($id){
        $shops=repairShop::find($id);
        $shops->delete();
        Session::flash('deleteSuccess',"Shop deleted succesful!");
        return redirect()->route('showShop');
    }

     public function update(){
        $r=request();//retrive submited form data
        $shops =repairShop::find($r->id);  //get the record based on product ID      
        $shops->name=$r->name;
        $shops->address=$r->address;
        $shops->city=$r->city;
        $shops->state=$r->state;
        $shops->country=$r->country;
        $shops->ZIPcode=$r->ZIPcode;
        $shops->phoneNumber=$r->phoneNumber;
        $shops->save(); //run the SQL update statment
        Session::flash('Success'," edit succesful!");
        return redirect()->route('showShop');
    }
    public function showShopDetail($id){
        $r=request();
        $shops =repairShop::all()->where('id',$id);
        $rating=rating::where('phoneID',$id)->get();
       
        //select * from products where id='$id'
        
        return view('shopdetail')->with('shops',$shops)
                                ->with('rating',$rating)
                                ->with('phoneID',$id)
                                ->with('insert_companies',insertCompany::all());
    }
}
