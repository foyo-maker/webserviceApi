<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal_Free_Gift extends Model
{
    use HasFactory;
    
    protected $fillable = ['meal_id','freegift_id'];

    public function freeGift() {
        return $this->belongsTo(Free_Gift::class);
    }
}
