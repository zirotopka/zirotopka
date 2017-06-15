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

    public function previews()
    {
        return $this->morphMany('App\File', 'owner')->where('file_type',2);
    }

    public function videos()
    {
        return $this->morphMany('App\File', 'owner')->where('file_type',3);
    }

    public function stages()
    {
        return $this->hasMany('App\ProgrammStage','exercise_id');
    }
}
