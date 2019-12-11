<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Laravel\Scout\Searchable;

class Registration extends Model
{
    //use Searchable;
    protected $fillable = ['name','full_name','email','password'];
}
