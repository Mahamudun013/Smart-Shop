<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable=['fullName','email','address','phoneNumber','districtName'];
}
