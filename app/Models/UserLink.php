<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLink extends Model
{
    protected $table = 'users_links';
    //
    protected $fillable = [
        'user_id',
        'link_id'
    ];

    
    public function link(){
        return $this->belongsTo("\App\Models\Link");
    }

    
    public function user()
    {
        return $this->belongsTo("\App\User");
    }
}
