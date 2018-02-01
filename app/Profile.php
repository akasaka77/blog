<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = [
        'user_id', 'avatar', 'about', 'facebook', 'youtube',
    ];

    public function getAvatarAttribute($avatar){
        return asset($avatar);
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
