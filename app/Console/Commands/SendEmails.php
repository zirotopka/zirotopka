<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\MoneyShipped;
use Mail;
use App\Accrual;

use App\User;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send_money';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Рассылка писем';

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

        $users->chunk(100, function($users){
            foreach ($users as $user) {
                $balance = $user->balance;

                if (!empty($balance)) {
                    $balance->sum = $balance->sum + 500;
                    $balance->save();

                    $accruals = new Accrual;
                    $accruals->sum = 500;
                    $accruals->user_id = $user->id;
                    $accruals->type_id = 1;
                    $accruals->balance_id = $balance->id;
                    $accruals->comment = 'Подарочные средства';

                    $accruals->save();

                    $user->immunity_count = 5;
                    $user->save();

                    //$this->send_mail($user);  
                }  
            }
        });
    }

    public function send_mail($user) {
        try {
            Mail::to($user->email)->queue(new MoneyShipped($user));
        } catch (\Exception $e) {
            \Log::error($e->getMessages());
        }

        return 1;
    }
}
