<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'region',
        'image',
        'user_ratings'
    ];

      // Define the many-to-many relationship with restaurants
      public function restaurants()
      {
          return $this->belongsToMany(Restaurant::class, 'restaurant_dish');
      }

   // Define the many-to-many relationship with users (who marked this dish as favorite)
   public function favoritedByUsers()
   {
       return $this->belongsToMany(User::class, 'user_favorite_dishes');
   }




}
