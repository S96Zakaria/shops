<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Shop extends Model
{
    public function likes(){
        return $this->hasMany('App\Like');
    }


    // public function getDistance(){
    //     $user_lat = Auth::user()->lat;
    //     $user_lng = Auth::user()->lng;
    //     $store_lat= $this->lat;
    //     $user_lng= $this->lng;

    //     $var = sqrt(pow(user_lat-store_lat,2)+pow(user_lng-user_lng,2));
    //     return $var;
    // }
}
