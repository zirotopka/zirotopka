<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\Yandex;
use GeoIP;

use App\Mail\ProgramShipped;
use App\Mail\WelcomeShipped;
use Mail;

use App\User;

use App\Classes\Yandex\CommonHTTP3Example;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $users = User::query();

        $users->chunk(100,function($users){
            foreach ($users as $user) {
                Mail::to($user->email)->queue(new WelcomeShipped($user));
            }
        });

        return 1;
    }
}
