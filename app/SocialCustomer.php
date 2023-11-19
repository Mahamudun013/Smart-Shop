<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialCustomer extends Model
{
    protected $fillable = ['name','email', 'password', 'provider', 'provider_id'];


//for firstname
 //    protected $fillable = [
 // 'name','firstName','lastName','email', 'password', 'provider', 'provider_id'
 //    ];
}
