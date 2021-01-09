<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class repairShop extends Model
{
    use HasFactory;
    protected $fillable=['companyID','name','address','city','state','country','ZIPcode','ratingPoints','ratingUser','phoneNumber'];
  
    public function insertCompany(){
        return $this->belongsTo('App\Models\insertCompany');
    }
}
