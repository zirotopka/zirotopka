<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Training;
use App\ProgrammDay;

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
        \Log::info('Программа запущена');
        $users_query = User::select([
            'id',
            'last_updated_at',
            'timezone',
            'current_day',
            'current_programm_id',
            'status',
        ])->where('program_is_start','=',1)->where('status','=',1);

        $users_query->chunk(100, function($users){
            foreach($users as $user) {
                $userTimezone = User::getTimezone($user);

                $userNow = Carbon::now($userTimezone);
                $last_updated_at = Carbon::parse($user->last_updated_at,$userTimezone);

                $lastDay = $last_updated_at->day;
                $nowDay = $userNow->day;

                $userHour = $userNow->hour;
                
                if ($userHour >= 22) {  
                    if ($nowDay > $lastDay) {
                        $trainings = $user->trainings()->where('program_day','=',$user->current_day)->first();

                        if (count($trainings) == 0) {
                            \Log::info('ProgramUpdating: User №'.$user->id.' get freezing by lack of training');

                            $user->status = 0;
                        } else {
                            $current_stages = $trainings->stages;

                            if (count($current_stages) <= 0) {
                                \Log::info('ProgramUpdating: User №'.$user->id.' get freezing by null stages');
                                $user->status = 0;
                            } else {
                                $current_program_day = ProgrammDay::select('id','day','status')
                                                            ->where('programm_id','=',$user->current_programm_id)
                                                            ->where('day','=',$user->current_day)
                                                            ->first();

                                if (!empty($current_program_day)) {
                                    if (!empty($current_program_day->status)) {
                                        //Обязательный день
                                        $programm_stages = ProgrammStage::select('id','status')
                                                            ->where('programm_day_id','=',$current_program_day->id)
                                                            ->with('exercive')
                                                            ->get();

                                        if (count($current_stages) < count($programm_stages)) {
                                            \Log::info('ProgramUpdating: User №'.$user->id.' get freezing by few stages');
                                            $user->status = 0;
                                        }
                                    }
                                } else {
                                    //Ошибка дня
                                    \Log::error('ProgramUpdating: User №'.$user->id.' has no program day');
                                }
                            }
                        }

                        $user->current_day = $user->current_day + 1;
                        $user->last_updated_at = $userNow;
                        $user->save();
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
}
