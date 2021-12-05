<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Item extends Model
{
    public function user() {
        return $this -> belongsTo('App\User');
    }

    public function bid() {
        return $this -> hasMany('App\Bid');
    }


    public function fav_user() {
        return $this->belongsToMany('App\User');
    }

    public function bid_user() {
        return $this->belongsToMany('App\User');
    }
}
