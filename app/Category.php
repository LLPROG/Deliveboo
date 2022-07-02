<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function users() {

        return $this->belongsToMany('App\User')->withPivot('category_id', 'user_id');
    }
}
