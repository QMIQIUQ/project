<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use App\Models\Phone;
Use Session;
use Auth;


class CategoryController extends Controller
{
        /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'image'=>['required','image'],
        ]);
    }
    //hello noob
    public function store(){    
        


        $r=request(); 
        $image=$r->file('product-image'); 
        $image->move('images',$image->getClientOriginalName());               
        $imageName=$image->getClientOriginalName(); 
        Category::create([

            'name'=>$r->name,
            'image'=>$imageName,
        ]);
        Session::flash('success',"Category create succesful!");
        Return view('insertCategory');
    }

    public function show(){
        $categories=Category::all();//instead SQL select * from categories
        return view('showCategory')->with('categories',$categories);
    }

    public function delete($id){
        $categories=Category::find($id);
        Phone::where('categoryID',$id)->delete();

        $categories->delete(); //apply delete from categories where id='$id'
        Session::flash('deleteSuccess',"Product deleted succesful!");
        return redirect()->route('showCategory');
        
    }

}
