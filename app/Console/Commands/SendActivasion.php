<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Mail\ActivasionShipped;
use Mail;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Activation;

class SendActivasion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:send_activasion';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Рассылка активаций';

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
        $users = User::select('id');

        $users->chunk(100, function($users){
            foreach ($users as $user) {
                $userSentinel = Sentinel::findById($user->id);
                $activation = Activation::completed($userSentinel);

                if (!$activation) {
                    \DB::table('activations')->where('user_id','=',$userSentinel->id)->delete();

                    $newActivation = Activation::create($userSentinel);

                    $code = $newActivation->code;

                    Mail::to($userSentinel->email)
                        ->queue(new ActivasionShipped($userSentinel, null, $code));
                }
            }
        });
    }
}
