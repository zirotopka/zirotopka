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
        $users = User::select([
            'id',
            'last_updated_at',
            'timezone'
        ])->where('status','=',1);

        // $users->chunk(100, function(){

        // })
    }
}
