<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TouristLocation extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
        'address',
        'latitude',
        'longitude',
        'type',
        'image',
        'user_ratings',
        'number_of_visitors'

    ];


}
