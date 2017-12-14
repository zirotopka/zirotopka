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
        '12345' => 3, //Выплаты
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function type()
    {	
    	return $this->belongsTo('App\AccrualType','type_id');
    }

    public static function storeAccrual($sum, $userId, $typeId, $balanceId, $accrualDescription) {
        $accruals = new self;
        $accruals->sum = $sum;
        $accruals->user_id = $userId;
        $accruals->type_id = $typeId;
        $accruals->balance_id = $balanceId;
        $accruals->comment = $accrualDescription;

        if ($accruals->save()) {
            return $accruals;
        } else {
            return null;
        }
    } 
}
