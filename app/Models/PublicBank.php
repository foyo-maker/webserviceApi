<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicBank extends Model
{
    use HasFactory;
    protected $fillable =['user_id','account_number','user_name','account_sign','account_type','password','user_ic','user_email','total_asset'];
}
