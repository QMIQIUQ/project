<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class insertCompany extends Model
{
    use HasFactory;
    protected $fillable=['userID','name','description','address','Tel','ownerName','image'];

}
