<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgrammExercive extends Model
{
    protected $table = 'programm_exercives';
    protected $primaryKey = 'id';

    public function files()
    {
        return $this->morphMany('App\File', 'owner');
    }

    public function stages()
    {
        return $this->hasMany('App\ProgrammStage','exercise_id');
    }
}
