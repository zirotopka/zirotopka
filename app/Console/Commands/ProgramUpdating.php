<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Training;
use App\ProgrammDay;
use App\ProgrammStage;

use Carbon\Carbon;

class ProgramUpdating extends Command
{
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
            'last_updated_at',
            'timezone',
            'current_day',
            'current_programm_id',
            'status',
        ])->whereNotNull('current_programm_id','=',0)->where('program_is_start','=',1)->where('status','=',1);

        $users_query->chunk(100, function($users){
            foreach($users as $user) {
                $userTimezone = User::getTimezone($user);

                $userNow = Carbon::now($userTimezone);
                $userNowStartDay = clone $userNow;
                $userNowStartDay->startOfDay();
                $last_updated_at = Carbon::parse($user->last_updated_at,$userTimezone)->startOfDay();
                $difference = $last_updated_at->diffInDays($userNowStartDay,false);
                
                if ($difference > 0) {           
                    //Разница в 1 день
                    $userHour = $userNow->hour;

                    if ($userHour >= 22) {
                        $current_program_day = ProgrammDay::select('id','day','status')
                                                ->where('programm_id','=',$user->current_programm_id)
                                                ->where('day','=',$user->current_day)
                                                ->first();        

                        if (!empty($current_program_day)) {
                            if (!empty($current_program_day->status)) {
                                //Обязательный день

                                $trainings = $user->trainings()->where('program_day','=',$user->current_day)->first();

                                if (count($trainings) == 0) {
                                    \Log::info('ProgramUpdating: User №'.$user->id.' get freezing by lack of training');

                                    $this->user_update ($user, $userNow, 0);
                                } else {
                                    $current_stages = $trainings->stages;
                                    
                                    if (count($current_stages) <= 0) {
                                        \Log::info('ProgramUpdating: User №'.$user->id.' get freezing by null stages');
                                        $this->user_update ($user, $userNow, 0);
                                    } else {
                                        $programm_stages_count = ProgrammStage::select('id','status')
                                                            ->where('programm_day_id','=',$current_program_day->id)
                                                            ->with('exercive')
                                                            ->count();

                                        if (count($current_stages) < count($programm_stages_count)) {
                                            \Log::info('ProgramUpdating: User №'.$user->id.' get freezing by few stages');
                                            $this->user_update ($user, $userNow, 0);
                                        } else {
                                            $this->user_update ($user, $userNow, 1);
                                        }
                                    }
                                }
                            } else {
                                $this->user_update ($user, $userNow, 1);
                            }
                        } else {
                            //Ошибка дня
                            \Log::error('ProgramUpdating: User №'.$user->id.' has no program day');
                        }
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
        ])->whereNotNull('current_programm_id','=',0)->where('program_is_start','=',0);

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
                    }
                }
            }
        });
    }

    public function user_update ($user, $userNow, $status) {
        $user->status = $status;
        $user->current_day = $user->current_day + 1;
        $user->last_updated_at = $userNow;
        $user->save();

        \Log::info('Пользователь №'.$user->id.' перешел на новый день програмы №'.$user->current_day);
    }
}
