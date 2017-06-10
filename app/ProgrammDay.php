<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgrammDay extends Model
{
    protected $table = 'programm_days';
    protected $primaryKey = 'id';

    public static $difficult_array = [
    	1 => ['text' => 'Легко','color' => 'text-success'],
    	2 => ['text' => 'Средне','color' => 'text-warning'],
    	3 => ['text' => 'Сложно','color' => 'text-danger'],
    ];
}
