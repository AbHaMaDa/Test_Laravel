<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantDish extends Model
{
    use HasFactory;




    protected $fillable = [
        'restaurant_id',
        'dish_id',
    ];



    public function restaurant(){

        return $this->belongsTo(Restaurant::class);

    }


    public function dish(){

        return $this->belongsTo(Dish::class);

    }

}
