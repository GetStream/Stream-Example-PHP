<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Follow extends Eloquent {
    use GetStream\StreamLaravel\Eloquent\ActivityTrait;
    use SoftDeletingTrait;

    protected $table = 'follows';
    protected $fillable = array('user_id', 'target_id');
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function target()
    {
        return $this->belongsTo('User');
    }

}
