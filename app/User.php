<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'birth_year', 'birth_month', 'user_desc',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function item() {
        return $this->hasMany('App\Item');
    }

    public function bid() {
        return $this->hasMany('App\Bid');
    }

    public function fav_items() {
        return $this->belongsToMany('App\Item');
    }

}

class User extends Model
{
    public function item() {
        return $this->hasMany('App\Item');
    }

    public function bid() {
        return $this->hasMany('App\Bid');
    }

    public function fav_items() {
        return $this->belongsToMany('App\Item');
}
}