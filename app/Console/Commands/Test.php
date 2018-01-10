<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\Yandex;
use GeoIP;

use App\User;

use App\Mail\CustomShipped;
use Mail;

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
        $user = User::first();
        $subject = 'Новости Reformator.One';
        Mail::to($user->email)->queue(new CustomShipped($user, $subject));
    }
}
