<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function orders() {
        return $this->belongsToMany('App\Order')->withPivot('quantity', 'notes');
    }

    protected $fillable = [
        'name', 'description', 'ingredients', 'allergies', 'price', 'available', 'user_id'
    ];
}
