<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function dishes() {
        return $this->belongsToMany('App\Dish')->withPivot('quantity', 'notes');
    }

    protected $fillable = [
        'order_number', 'customer_name', 'customer_surname', 'phone_number', 'street', 'cap', 'city', 'status', 'final_price'
    ];
}
