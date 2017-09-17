<?php

namespace App;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;//Временно
use Cartalyst\Sentinel\Users\EloquentUser as CartalystUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

use ElForastero\Transliterate\TransliterationFacade as Transliterate;

class User extends CartalystUser
{
    use Notifiable;

    use SoftDeletes;

    protected $table = 'users';
    protected $primaryKey = 'id';

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
        'first_name', 'last_name', 'email', 'password', 'sex', 'weight', 'growth', 'age', 'phone', 'user_ip', 'referer_code',
    ];

    public static function getSlug($first_name, $last_name, $surname, $user_id = null, $nik = null) {
        $string = '';

        if (!empty($nik)) {
            $string .= $nik;

            $checkSlug = self::checkSlug($string,$user_id);

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
        $credentials = [
            'email'    => $providerUser->getEmail(),
            'password' => null,
        ];

        $user = Sentinel::register($credentials);

        if ($user) {
            $nameArray = explode(' ',$providerUser->getName());
            $nik = $providerUser->getNickname();

            if (count($nameArray) > 0) {
                $user->first_name = $nameArray[0];

                if (isset($nameArray[1])) {
                    $user->surname = $nameArray[1];
                }

                $user->save();

                User::addAdditionalData($user);

                $slug = User::getSlug($user->first_name, $user->last_name, $user->surname, null, $nik);

                $user->slug = $slug;
                $user->save();

                $activation = Activation::create($user);
                $activation->completed = 1;
                $activation->save();

                $role = Sentinel::findRoleBySlug("client");
                $role->users()->attach($user);

                Balance::create([
                    'user_id' => $user->id,
                    'sum' => 0,
                ]);

                Sentinel::authenticateAndRemember([ 'email' => $providerUser->getEmail(), 'password' => null ]);

                return $user;
            } else {
                \Log::error('createBySocialProvider: Пустое имя');
                return false;
            }
        }

        \Log::error('createBySocialProvider: Отсутствует пользователь');
        return false;
    }

    public static function addAdditionalData(User $user)
    {
        $user->user_ip = $_SERVER["REMOTE_ADDR"];
        $user->referer_code = md5( date('Y-m-d').uniqid(rand(), true) );

        $user->save();
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
