<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accrual extends Model
{
    protected $table = 'accruals';
    protected $primaryKey = 'id';

    public $accruals_good_types = [
        '453084' => 1, //програма
        '12345' => 2, //Иммунитет
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function type()
    {	
    	return $this->belongsTo('App\AccrualType','type_id');
    }
}
