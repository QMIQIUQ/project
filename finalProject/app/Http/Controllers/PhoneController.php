<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Phone; 
use App\Models\Category;
Use Session;

class PhoneController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'quantity' => ['required', 'integer', 'max:255'],
            'price' => ['required', 'double', 'max:255'],
        ]);
    }
    public function create(){
        return view('insertPhone') ->with('categories',Category::all());
    }
    public function store(){    //step 2 
        $r=request(); //step 3 get data from HTML
        $image=$r->file('product-image');   //step to upload image get the file input
        $image->move('images',$image->getClientOriginalName());   //images is the location                
        $imageName=$image->getClientOriginalName(); 

        $addCategory=Phone::create([    //step 3 bind data
            'id'=>$r->ID, //add on 
            'CategoryID'=>$r->category,
            'name'=>$r->name, //fullname from HTML
            'description'=>$r->description,
            'image'=>$imageName,
            'quantity'=>$r->quantity,
            'price'=>$r->price,
            
        ]);
        Session::flash('success',"Product create succesful!");

        return redirect()->route('insertPhone');
    }

    public function show(){
        $products=Phone::paginate(4);
        
        return view('showPhone')->with('products',$products);
    }

    public function edit($id){
       
        $products =Phone::all()->where('id',$id);
        //select * from products where id='$id'
        
        return view('editPhone')->with('products',$products)
                                ->with('categories',Category::all());
    }

    public function delete($id){
        $products=Phone::find($id);
        $products->delete();
        Session::flash('deleteSuccess',"Product deleted succesful!");
        return redirect()->route('showPhone');
    }

     public function update(){
        $r=request();//retrive submited form data
        $products =Phone::find($r->ID);  //get the record based on product ID      
        if($r->file('product-image')!=''){
            $image=$r->file('product-image');        
            $image->move('images',$image->getClientOriginalName());                   
            $imageName=$image->getClientOriginalName(); 
            $products->image=$imageName;
            }         
        $products->name=$r->name;
        $products->description=$r->description;
        $products->categoryID=$r->category;
        $products->price=$r->price;
        $products->quantity=$r->quantity;
        $products->save(); //run the SQL update statment
        return redirect()->route('showPhone');
    }
}