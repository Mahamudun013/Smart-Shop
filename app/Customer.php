<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $fillable = ['name','email', 'password', 'provider', 'provider_id'];
    
}
