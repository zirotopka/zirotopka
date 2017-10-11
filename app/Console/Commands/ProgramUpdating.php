<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Training;

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
        ]);
        //->where('status','=',1);

        $users_query->chunk(100, function($users){
            foreach($users as $user) {
                $userTimezone = User::getTimezone($user);

                $userNow = Carbon::now($userTimezone);
                $userHour = $userNow->hour;
                $nowDay = $userNow->day;

                if ($userHour >= 22) {
                    $last_updated_at = Carbon::parse($user->last_updated_at,$userTimezone);
                    $lastDay = $last_updated_at->day;

                    if ($nowDay > $lastDay) {
                        $trainings = $user->trainings()->where('program_day')->get();

                        if (count($trainings) == 0) {
                            $user->status = 0;
                        }

                        $user->current_day = $user->current_day + 1;
                        $user->last_updated_at = $now;
                        $user->save();
                    }
                }
            }
        });
    }
}
