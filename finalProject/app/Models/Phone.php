<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    protected $fillable=['userID','CategoryID','name','description','image','quantity','price','username'];
    
    
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
}
