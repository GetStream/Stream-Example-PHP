<?php

class Follow extends Eloquent {
    protected $table = 'follows';
    protected $fillable = array('user_id', 'target_id');

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function target()
    {
        return $this->belongsTo('User');
    }

    public function toActivity()
    {
        return array(
            'actor' => $this->user_id,
            'verb' => 'follow',
            'object' => "follow:$this->id",
            'foreign_id' => "follow:$this->user_id:$this->target_id"
        );
    }
}
