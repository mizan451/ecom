<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];


    public function category(){
         return $this->belongsTo(Category::class);
    }
//multiple color input database
    protected $casts = [
            'color' => 'json',
            'size' => 'json',
            
    ];

    

public function brand(){
        return $this->belongsTo(Brand::class);

   }

   protected $with = ['brand'];
}
