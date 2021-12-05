<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function item() {
        return $this->belongsTo('App\Item');
    }
}
