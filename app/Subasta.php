<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subasta extends Model
{
    public function productos() {
        return $this->belongsTo(Product::class);
    }
}
