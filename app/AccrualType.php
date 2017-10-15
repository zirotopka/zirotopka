<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccrualType extends Model
{
    protected $table = 'accrual_types';
    protected $primaryKey = 'id';

    public function accrual()
    {
        return $this->hasMany('App\Accrual','type_id');
    }
}
