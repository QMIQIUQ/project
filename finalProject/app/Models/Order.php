<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['userID','amount','paymentStatus','AddressID'];
    public function phone(){

        return $this->hasMany('App\Phone');

    }

    public function user(){

        return $this->belongsTo('App\User');

    }
}
