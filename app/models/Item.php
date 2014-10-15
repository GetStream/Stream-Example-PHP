<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Item extends Eloquent {
    use SoftDeletingTrait;

    protected $table = 'items';
    protected $dates = ['deleted_at'];

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
