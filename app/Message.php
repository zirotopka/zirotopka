<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $primaryKey = 'id';

    public function incomes()
    {
        return $this->belongsTo('App\User', 'recipient_id', 'id');
    }

    public function outputs()
    {
        return $this->belongsTo('App\User',  'sender_id', 'id');
    }

    public function files()
    {
        return $this->morphMany('App\File', 'owner');
    }
}
