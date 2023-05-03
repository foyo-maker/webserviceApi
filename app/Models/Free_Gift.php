<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Free_Gift extends Model
{
    use HasFactory;

    protected $fillable = ['name','qty', 'description','image','status'];
   
    public function freeGifts()
    {
        return $this->hasMany(Meal_Free_Gift::class, 'freegift_id');
    }
}

