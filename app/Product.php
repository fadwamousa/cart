<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    protected $fillable = ['name','image','price','type','description'];

    /*public function getPriceAttribute($value){

        return '$'.$value;
    }*/
}
