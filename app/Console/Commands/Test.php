<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\Yandex;
use GeoIP;

use App\Mail\ProgramShipped;
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
        $user = User::first();
        try {
            $subject = 'Test';
            $text = 'Test';
            Mail::to('kasatka567@gmail.com')->queue(new ProgramShipped($user, $subject, $text));
        } catch (\Exception $e) {
            \Log::error($e);
        }

        return 1;
    }
}
