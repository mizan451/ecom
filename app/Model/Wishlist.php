<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $guarded = [];

    protected $with = ['product'];
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
