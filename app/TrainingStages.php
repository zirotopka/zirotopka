<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingStages extends Model
{
    protected $table = 'training_stages';
    protected $primaryKey = 'id';

	public function training()
	{
		return $this->belongsTo('App\Training','training_id');
	}

	public function files()
    {
        return $this->morphMany('App\File', 'owner');
    }
}
