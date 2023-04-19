<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicBank extends Model
{
    use HasFactory;
    protected $fillable =['user_id','user_name','account_sign','password','user_ic','user_email','total_asset'];
}
