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
        $users_query = User::select([
            'id',
            'last_updated_at',
            'timezone',
            'current_day',
            'current_programm_id',
        ])->where('status','=',1);

        $users_query->chunk(100, function($users){
            foreach($users as $user) {
                $userTimezone = User::getTimezone($user);

                $userNow = Carbon::now($userTimezone);
                $userHour = $userNow->hour;
                $nowDay = $userNow->day;

                //if ($userHour >= 22) {
                    $last_updated_at = Carbon::parse($user->last_updated_at,$userTimezone);
                    $lastDay = $last_updated_at->day;

                    if ($nowDay > $lastDay) {
                        $trainings = $user->trainings()->where('program_day','=',$user->current_day)->first();

                        if (empty($trainings)) {
                            \Log::info('ProgramUpdating: User №'.$user->id.' get freezing by lack of training');

<<<<<<< HEAD
                        if (count($trainings) == 0) {
                            \Log::info('ProgramUpdating: User №'.$user->id.' get freezing by lack of training');

=======
>>>>>>> 3f4ca19604620caa0e4a346a5058ae735f6d9d18
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
                //}
            }
        });
    }
}
