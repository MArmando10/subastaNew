<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function articles()
    {
        return $this->hasMany('App\Product');
    }

    public function producto() {
    	return $this->HasOne('App\Product');
    }

    public function subasta(){
        return $this->hasMany(Subasta::class);
    }
}
