<?php

class Pin extends Eloquent {
    protected $table = 'pins';
    protected $fillable = array('user_id', 'item_id', 'influencer_id');

    public function item()
    {
        return $this->belongsTo('Item');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function toActivity()
    {
        return array(
            'actor' => $this->user_id,
            'verb' => 'pin',
            'object' => "pin:$this->id",
            'foreign_id' => "pin:$this->id"
        );
    }
}
