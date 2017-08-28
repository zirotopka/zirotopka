<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'trainings';
    protected $primaryKey = 'id';

	public function user()
	{
		return $this->belongsTo('App\User','user_id');
	}
}
