<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $fillable = ['id','user_id','product_id','oferta'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function subasta(){
        return $this->hasOne(Subasta::class);
    }


  
}

