<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
        return $this->hasMany(Category::class);
    }

    public function imagenes(){
    	return $this->hasMany(Image::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function ofertas() {
        return $this->hasMany(Offers::class);
    }
}