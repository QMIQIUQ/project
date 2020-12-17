<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracelTrack extends Model
{
    use HasFactory;
    protected $fillable=['id','parcelTrackID','UserID','OrderID','phoneStatus','ShippingTime','ShippingDate'];
}
