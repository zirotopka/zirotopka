<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgrammStage extends Model
{
    protected $table = 'programm_stages';
    protected $primaryKey = 'id';

    public function exercive()
    {
        return $this->belongsTo('App\ProgrammExercive','exercise_id')->with('files');
    }
}
