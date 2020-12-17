<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['id','CategoryID','categoryName','image'];  // enable use upadate the field

    public function product(){
        return $this->hasMany('App\Models\Phone');
    }
}
