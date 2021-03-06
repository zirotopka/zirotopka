<?php

namespace App;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Activation;

use Cartalyst\Sentinel\Users\EloquentUser as CartalystUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

use ElForastero\Transliterate\TransliterationFacade as Transliterate;

use Carbon\Carbon;

use App\AdjancyList;
use App\Balance;

use Mail;
use App\FreeAccess;

use App\Mail\PasswordShipped;

class User extends CartalystUser
{
    use Notifiable;

    use SoftDeletes;

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'sex', 'weight', 'growth', 'age', 'phone', 'user_ip', 'referer_code', 'slug',
    ];

    public static function getSlug($first_name, $last_name, $surname, $user_id = null, $nik = null) {
        $string = '';

        if (!empty($nik)) {
            $string .= $nik;

            $checkSlug = self::checkSlug($string,$user_id);
            \Log::info($checkSlug);
            if ($checkSlug) {
                return $checkSlug;
            }

            $string .= ' ';
        }

        if (!empty($surname)) {
            $string .= $surname;

            $checkSlug = self::checkSlug($string,$user_id);

            if ($checkSlug) {
                return $checkSlug;
            }

            $string .= ' ';
        }

        if (!empty($first_name)) {
            $string .= $first_name;

            $checkSlug = self::checkSlug($string,$user_id);

            if ($checkSlug) {
                return $checkSlug;
            }

            $string .= ' ';
        }

        if (!empty($last_name)) {
            $string .= $last_name;

            $checkSlug = self::checkSlug($string,$user_id);

            if ($checkSlug) {
                return $checkSlug;
            }

            $string .= ' ';
        }
        

        if (!empty($oldUser)) {
            $string .= '_'.uniqid();

            $checkSlug = self::checkSlug($string,$user_id);

            if ($checkSlug) {
                return $checkSlug;
            }
        }

        return md5(uniqid().time());
    }

    public static function checkSlug($string,$user_id) {
        $slug = Transliterate::make($string, ['type' => 'filename', 'lowercase' => true]);

        $oldUserQuery = self::where('slug','=',$slug);

        if (!empty($user_id)) {
            $oldUserQuery->where('id','!=',$user_id);
        }
        
        $oldUser = $oldUserQuery->count();

        if ($oldUser != 0) {
            return false;
        } else {
            //return trim($slug,'_');
            return $slug;
        }
    }

    public static function createBySocialProvider($providerUser)
    {   
        $password = self::generatePath();

        $credentials = [
            'email'    => $providerUser->getEmail(),
            'password' => $password,
        ];

        $user = Sentinel::register($credentials);

        if ($user) {
           
            self::sendPassword($user, $password);

            $nameArray = explode(' ',$providerUser->getName());
            $nik = $providerUser->getNickname();

            if (count($nameArray) > 0) {
                $user->first_name = $nameArray[0];

                if (isset($nameArray[1])) {
                    $user->surname = $nameArray[1];
                }

                $user->referer_code = md5( date('Y-m-d').uniqid(rand(), true) );

                $activation = Activation::create($user);
                $activation->completed = 1;
                $activation->save();

                $slug = User::getSlug($user->first_name, $user->last_name, $user->surname, null, $nik);

                $user->slug = $slug;

                $user->status = 1;
                $user->save();

                $role = Sentinel::findRoleBySlug("client");
                $role->users()->attach($user);

                Balance::create([
                    'user_id' => $user->id,
                    'sum' => 0,
                ]);

                //referer_code
                if (session()->has('ref')) {
                    $reverralSlug = $request->session()->pull('ref');
                    $referral = User::select('id','first_name','surname','slug')->where('slug','=',$reverralSlug)->first();

                    if (!empty($referral) && ($user->id != $referral->id)) {
                        $adjancy = new AdjancyList;
                        $adjancy->user_id = $user->id;
                        $adjancy->pid = $referral->id;
                        $adjancy->save();
                    }
                }

                //Бесплатный доступ
                if (session()->has('freeAccess')) {
                    $freeAccess = $request->session()->pull('freeAccess');

                    $freeAccessModel = FreeAccess::where('id','=',$freeAccess)->whereNull('user_id')->first();

                    if (!empty($freeAccessModel)) {
                        $user->is_programm_pay = 1;
                        if ($user->save()) {
                            $freeAccessModel->user_id = $user->id;
                            $freeAccessModel->save();
                        }
                    }
                }

                return $user;
            } else {
                \Log::error('createBySocialProvider: Пустое имя');
                return false;
            }
        }

        \Log::error('createBySocialProvider: Отсутствует пользователь');
        return false;
    }

    public static function sendPassword($user, $password) {
        Mail::to($user->email)
                ->queue(new PasswordShipped($password));

        return 1;
    }

    public static function generatePath() {
        return md5(uniqid(rand(), true));
    }

    public static function getTimezone($user) {
        if (!empty($user->user_timezone)) {
            return $user->user_timezone;
        } else {
            return 'Africa/Nairobi';
        }
    }

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

    public function parents()
    {
        return $this->belongsToMany('App\User','adjancy_lists','user_id','pid');
    }

    public function children()
    {
        return $this->belongsToMany('App\User','adjancy_lists','pid','user_id');
    }

    public function accruals()
    {
        return $this->hasMany('App\Accrual','user_id');
    }

    public function accruals_input()
    {
        return $this->hasMany('App\Accrual','user_id')->where('comment','=','За приглашенного пользователя');
    }

    public function accruals_output()
    {
        return $this->hasMany('App\Accrual','user_id')->where('comment','=','Вывод средств c личного счета');
    }

    public function trainings()
    {
        return $this->hasMany('App\Training','user_id');
    }

    public function income_messages()
    {
        return $this->hasMany('App\Message', 'recipient_id', 'id')->with('files')->orderBy('created_at','desc');
    }

    public function output_messages()
    {
        return $this->hasMany('App\Message', 'sender_id', 'id')->with('files')->orderBy('created_at','desc');
    }

    public function current_program()
    {
        return $this->belongsTo('App\Programm','current_programm_id');
    }

    public function current_program_day_status()
    {
        return $this->belongsTo('App\ProgrammDay','current_day')->select('status');
    }
}
