<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'title'
    ];
    public function products(){
        return $this->hasMany("App\Models\Product");
    }

}
