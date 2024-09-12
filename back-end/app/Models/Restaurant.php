<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'address',
        'latitude',
        'longitude',
        'user_ratings'
    ];



    // Define the many-to-many relationship with restaurants
    // Define the many-to-many relationship with dishes
    public function dishes()
    {
        return $this->belongsToMany(Dish::class, 'restaurant_dish');
    }
}
