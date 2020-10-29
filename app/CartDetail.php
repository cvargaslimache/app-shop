<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    // cartDeail N      1product
    //metodo product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
