<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

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
            'timezone'
        ]);
        //->where('status','=',1);

        $users_query->chunk(100, function($users){
            foreach($users as $user) {
                if (!empty($user->timezone)) {
                    $timezone = $user->timezone;
                } else {
                    $timezone = 'Africa/Nairobi';
                }
                $now = Carbon::now($timezone);

                if (!empty($user->last_updated_at)) {    
                    $nowDay = $now->day;
                    $last_updated_at = Carbon::parse($user->last_updated_at);
                    $lastDay = $last_updated_at->day;

                    if ($nowDay > $lastDay) {
                        
                    }
                } else {
                    $user->last_updated_at = $now;
                    $user->save();
                }
            }
        });
    }
}
