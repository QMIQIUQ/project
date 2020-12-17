<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    protected $fillable=['id','ProductID','CategoryID','BrandID','productName','description','productImage'];
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
}
