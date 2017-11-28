<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Training;
use App\ProgrammDay;
use App\ProgrammStage;
use App\Ban;

//use Illuminate\Bus\Queueable;
use Carbon\Carbon;

use App\Mail\ProgramShipped;
use Mail;

class ProgramUpdating extends Command
{   
    //use Queueable;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'program:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Программа обновления еженедельной программы, выставляем на каждый час';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {   

        \Log::info('Обновление программ запущенно');

        $users_query = User::select([
            'id',
            'email',
            'last_updated_at',
            'timezone',
            'current_day',
            'current_programm_id',
            'status',
            'first_name',
            'surname',
            'slug',
            'program_is_end',
        ])->whereNotNull('current_programm_id')->where('program_is_start','=',1)->where('program_is_end','=',0);

        $users_query->chunk(100, function($users){
            foreach($users as $user) {
                $userTimezone = User::getTimezone($user);

                $userNow = Carbon::now($userTimezone);

                $userNowStartDay = clone $userNow;
                $userNowStartDay->startOfDay();
                $last_updated_at = Carbon::parse($user->last_updated_at,$userTimezone)->startOfDay();

                $difference = $last_updated_at->diffInDays($userNowStartDay,false);

                if ($user->status == 1) {
                    if ($difference > 0) {           
                        //Разница в 1 день
                        $userHour = $userNow->hour;

                        if ($userHour >= 22) {

                            $current_program_day = ProgrammDay::select('id','day','status')
                                                    ->where('programm_id','=',$user->current_programm_id)
                                                    ->where('day','=',$user->current_day)
                                                    ->first(); 

                            $number_training = $user->current_day + 1;       

                            if (!empty($current_program_day)) {
                                if (!empty($current_program_day->status)) {
                                    //Обязательный день

                                    $trainings = $user->trainings()->where('program_day','=',$user->current_day)->first();

                                    if (count($trainings) == 0) {
                                        \Log::info('ProgramUpdating: User №'.$user->id.' get freezing by lack of training');

                                        $this->user_update ($user, $userNow, 0);

                                        $this->addBan($user->id);

                                        $subject = 'Обновление программы Reformator.One';
                                        $text = 'Вы не выполнили программу. Сожалеем, но ваш аккаунт заморожен.';

                                        $this->send_mail($user, $subject, $text);
                                    } else {
                                        $current_stages = $trainings->stages;
                                        
                                        if (count($current_stages) <= 0) {
                                            \Log::info('ProgramUpdating: User №'.$user->id.' get freezing by null stages');
                                            $this->user_update ($user, $userNow, 0);

                                            $this->addBan($user->id);

                                            $subject = 'Обновление программы Reformator.One';
                                            $text = 'Вы выполнили не все упражнения. Сожалеем, но ваш аккаунт заморожен.';

                                            $this->send_mail($user, $subject, $text);

                                        } else {
                                            $programm_stages_count = ProgrammStage::select('id','status')
                                                                ->where('programm_day_id','=',$current_program_day->id)
                                                                ->with('exercive')
                                                                ->count();

                                            if (count($current_stages) < count($programm_stages_count)) {
                                                \Log::info('ProgramUpdating: User №'.$user->id.' get freezing by few stages');

                                                $$subject = 'Обновление программы Reformator.One';
                                                $text = 'Вы выполнили не все упражнения. Сожалеем, но ваш аккаунт заморожен.';

                                                $this->send_mail($user, $subject, $text);

                                                $this->user_update ($user, $userNow, 0);

                                                $this->addBan($user->id);
                                            } else {
                                                $subject = 'Обновление программы Reformator.One';
                                                $text = 'Вам доступна новая тренировка за '.$number_training.'-й день.';

                                                $this->send_mail($user, $subject, $text);

                                                $this->user_update ($user, $userNow, 1);
                                            }
                                        }
                                    }
                                } else {
                                    $subject = 'Обновление программы Reformator.One';
                                    $text = 'Вам доступна новая тренировка за '.$number_training.'-й день.';

                                    $this->send_mail($user, $subject, $text);

                                    $this->user_update ($user, $userNow, 1);
                                }
                            } else {
                                //Ошибка дня
                                \Log::error('ProgramUpdating: User №'.$user->id.' has no program day');
                            }
                        }
                    }
                } else {
                    $userHour = $userNow->hour;

                    if ($userHour >= 22) {
                        if ($difference > 0) {
                            $subject = 'Напоминание от Reformator.One';
                            $text = 'Ваш аккаунт заморожен. Вы можете восстановить его и продолжить тренировки.';

                            $this->send_mail($user, $subject, $text);

                            $this->addBan($user->id);

                            $user->last_updated_at = $userNow;
                            $user->save();
                        }
                    }
                }
            }
        });

        //Начало программы
        $users_query = User::select([
            'id',
            'email',
            'program_is_start',
            'start_training_day',
            'timezone',
            'first_name',
            'surname',
            'slug',
            'program_is_end',
        ])->whereNotNull('current_programm_id')->where('program_is_start','=',0)->where('program_is_end','=',0);

        $users_query->chunk(100, function($users){
            foreach($users as $user) {
                $userTimezone = User::getTimezone($user);

                $start_training_day = Carbon::parse($user->start_training_day,$userTimezone);
                $start_training_day->hour = 22;
                $start_timestamp = $start_training_day->timestamp;

                $userNow = Carbon::now($userTimezone);
                $now_timestamp = $userNow->timestamp;

                if ($now_timestamp >= $start_timestamp) {
                    $user->program_is_start = 1;
                    $user->status = 1;
                    $user->last_updated_at = $userNow;
                    $user->save();

                    \Log::info('Пользователь №'.$user->id.' начал программу!');

                    $subject = 'Обновление программы Reformator.One';
                    $text = 'Вам доступна первая тренировка.';

                    $this->send_mail($user, $subject, $text);      
                } else {
                    $start_year = $start_training_day->year;
                    $start_month = $start_training_day->month;
                    $start_day = $start_training_day->day;

                    $now_year = $userNow->year;
                    $now_month = $userNow->month;
                    $now_day = $userNow->day;
                    $now_hour =  $userNow->hour;

                    if (($start_year == $now_year) && ($start_month == $now_month) && ($start_day == $now_day) && ($now_hour >= 22)) {
                        $user->program_is_start = 1;
                        $user->last_updated_at = $userNow;
                        $user->save();

                        \Log::info('Пользователь №'.$user->id.' начал программу!');

                        $subject = 'Обновление программы Reformator.One';
                        $text = ' Вам доступна первая тренировка.';

                        $this->send_mail($user, $subject, $text);     
                    }
                }
            }
        });

        //Начало программы
        $users_query = User::select([
            'id',
            'program_is_start',
            'start_training_day',
            'timezone',
        ])->where('program_is_start','=',0);

        $users_query->chunk(100, function($users){
            foreach($users as $user) {
                $userTimezone = User::getTimezone($user);

                $start_training_day = Carbon::parse($user->start_training_day,$userTimezone);
                $start_training_day->hour = 22;
                $start_timestamp = $start_training_day->timestamp;

                $userNow = Carbon::now($userTimezone);
                $now_timestamp = $userNow->timestamp;

                if ($now_timestamp >= $start_timestamp) {
                    $user->program_is_start = 1;
                    $user->last_updated_at = $userNow;
                    $user->save();

                    \Log::info('Пользователь №'.$user->id.' начал программу!');
                } else {
                    $start_training_day->subDay();
                    $start_year = $start_training_day->year;
                    $start_month = $start_training_day->month;
                    $start_day = $start_training_day->day;

                    $now_year = $userNow->year;
                    $now_month = $userNow->month;
                    $now_day = $userNow->day;
                    $now_hour =  $userNow->hour;

                    if (($start_year == $now_year) && ($start_month == $now_month) && ($start_day == $now_day) && ($now_hour >= 22)) {
                        $user->program_is_start = 1;
                        $user->last_updated_at = $userNow;
                        $user->save();

                        \Log::info('Пользователь №'.$user->id.' начал программу!');
                    }
                }
            }
        });
    }

    public function addBan($userId) {
        $bans = new Ban;
        $bans->user_id = $userId;
        $bans->save();

        return 1;
    }

    public function user_update ($user, $userNow, $status) {
        if ($user->current_days == 28) {
            //Последний день
            if ($status) {
                $user->program_is_end = 1;
            }
        } else {
            $user->current_day = $user->current_day + 1;
        }

        $user->status = $status;
        $user->last_updated_at = $userNow;
        $user->save();

        \Log::info('Пользователь №'.$user->id.' перешел на новый день програмы №'.$user->current_day);
    }

    public function send_mail($user, $subject, $text) {
        //$message = (new ProgramUpdating($user, $subject, $text))->onQueue('emails');
        try {
            //Mail::to($user->email)->queue(new ProgramShipped($user, $subject, $text));
        } catch (Exception $e) {
            \Log::error($e->getMessages());
        }

        return 1;
    }
}
