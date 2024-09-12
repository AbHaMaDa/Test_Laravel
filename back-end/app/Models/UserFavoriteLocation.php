<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavoriteLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tourist_locations_id',
    ];



    public function user(){

        return $this->belongsTo(User::class);

    }


    public function touristLocation(){
        return $this->belongsTo(TouristLocation::class);
    }
}
