<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $primaryKey = 'id';

    public function incomes()
    {
        return $this->belongsTo('App\User', 'id', 'recipient_id');
    }

    public function outputs()
    {
        return $this->belongsTo('App\User', 'id', 'sender_id');
    }
}
