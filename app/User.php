<?php

namespace App;

use Cartalyst\Sentinel\Users\EloquentUser as CartalystUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends CartalystUser
{
    use Notifiable;

    use SoftDeletes;

    protected $table = 'users';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'sex', 'weight', 'growth', 'age', 'phone', 'user_ip', 'referer_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function balance()
    {
        return $this->hasOne('App\Balance','user_id');
    }

    public function accruals()
    {
        return $this->hasMany('App\Accrual','user_id');
    }

    public function income_messages()
    {
        return $this->hasMany('App\Message', 'recipient_id', 'id')->with('files')->orderBy('created_at','desc');
    }

    public function output_messages()
    {
        return $this->hasMany('App\Message', 'sender_id', 'id')->with('files')->orderBy('created_at','desc');
    }
}
