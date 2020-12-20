<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded = [];

    public function brand(){
        return $this->hasMany(Brand::class);
    }
}
