<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categories';

    public function Products(){
    	return $this->hasMany(Product::class);

    }
}
