<?php

class Item extends Eloquent {
    protected $table = 'items';

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function pins()
    {
        return $this->hasMany('Pin');
    }

    public function pinsFromMe()
    {
        return $this->hasMany('Pin')->where('user_id', '=', Auth::id());
    }

}
