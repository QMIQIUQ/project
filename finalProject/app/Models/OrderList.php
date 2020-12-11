<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    use HasFactory;
    protected $fillable=['id','OrderID','CartID','AddressID','UserID','OrderDetailID'];
}
