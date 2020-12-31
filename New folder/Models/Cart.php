<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=['ProductID','orderID','userID','quantity'];
    public function category(){

        return $this->belongsTo('App\Category');

    }
    public function phone(){

        return $this->belongsTo('App\Phone');

    }

    public function user(){

        return $this->belongsTo('App\User');

    }
}
