<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    use HasFactory;
    protected $fillable=['userID','phoneID','username','ratingPoints','comment'];
    public function phone(){
        return $this->belongsTo('App\Models\Phone');
    }
}
