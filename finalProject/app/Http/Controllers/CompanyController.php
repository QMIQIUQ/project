<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\insertCompany;
use App\Models\User;
use Auth;
Use Session;

class CompanyController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'description'=>['required', 'string'],
            'address'=>['required', 'string'],
            'Tel'=>['required', 'string','max:11'],
            'image'=>['required','image'],
        ]);
    }

    public function store(){    
        $r=request(); 
        $user = User::find(Auth::id());  
        $image=$r->file('product-image'); 
        $image->move('images',$image->getClientOriginalName());               
        $imageName=$image->getClientOriginalName(); 
        insertCompany::create([
            'userID'=>Auth::id(),
            'name'=>$r->name,
            'description'=>$r->description,
            'address'=>$r->address,
            'Tel'=>$r->Tel,
            'ownerName'=>$r->ownerName,
            'image'=>$imageName,
        ]);
        $user->services=1;
        $user->save();

        Session::flash('success',"Register succesful!");
        return redirect()->to('/registerStatus');
    }


    public function show(){
        $company=insertCompany::leftjoin('users','userID','=','users.id')
        ->Select('insert_companies.*','users.name as userName','users.services as userServices')
        ->get();
        return view('showCompanyRequest')->with('company',$company);
    }

    public function approve($id){
        $user = User::find($id);  
        $user->admin=2;
        $user->services = 3;
        $user->save();
        Session::flash('approved',"Sucessfuly Approved");
        return redirect()->route('showRegisterCompany');

    }

    public function reject($id){
        $user = User::find($id);  
        $companies=insertCompany::where('userID','=',$id);
        $companies->delete();
        $user->services = 2;
        $user->save();
        Session::flash('rejected',"Sucessfuly rejected");
        return redirect()->route('showRegisterCompany');

    }

}
