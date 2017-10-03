<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\User;
use App\Accrual;
use App\Balance;

class BonusDistribution implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   
        \Log::info($this->user_id);
        $newUser = User::select('id','first_name','surname')->where('id','=',$this->user_id)->first();

        if (empty($newUser)) {
            \Log::error('BonusDistribution: Пользователь с id '.$this->user_id.'не найден');

            return 1;
        }

        $parentsFirstLine = $newUser->parents;

        if (count($parentsFirstLine) > 0) {
            $parentFirstLine = $parentsFirstLine->first();

            if ($parentFirstLine->status == 0) {
                \Log::info('BonusDistribution: Родитель с id '.$parentFirstLine->id.' заблокирован');

                return 1;
            }

            $sum = 1000;

            $child_name = $newUser->first_name.' '.$newUser->surname;

            $this->addAccrual($parentFirstLine->id,$child_name,$sum);

            $parentsSecondLine = $parentFirstLine->parents;

            if (count($parentsSecondLine) > 0) {
                $parentSecondLine = $parentsSecondLine->first();

                if ($parentFirstLine->status == 0) {
                    \Log::info('BonusDistribution: Родитель с id '.$parentSecondLine->id.' заблокирован');

                    return 1;
                }

                $sum = 150;

                $child_name = $parentFirstLine->first_name.' '.$parentFirstLine->surname;

                $this->addAccrual($parentSecondLine->id,$child_name,$sum);

                $parentsThirtyLine = $parentSecondLine->parents;

                if (count($parentsThirtyLine) > 0) {
                    $parentThirtyLine = $parentsThirtyLine->first();

                    if ($parentFirstLine->status == 0) {
                        \Log::info('BonusDistribution: Родитель с id '.$parentThirtyLine->id.' заблокирован');

                        return 1;
                    }

                    $sum = 100;

                    $child_name = $parentSecondLine->first_name.' '.$parentSecondLine->surname;

                    $this->addAccrual($parentThirtyLine->id,$child_name,$sum);
                }
            }
        }

        return 1;
    }

    public function addAccrual ($user_id,$child_name,$sum) {
        $balance = Balance::select('id','sum','user_id')->where('user_id',$user_id)->first();

        if (empty($balance)) {
            \Log::error('BonusDistribution: У пользователя с id '.$user_id.'не найден баланс');

            $balance_id = 0;
        } else {
            $balance_id = $balance->id;
        }

        $accrual = new Accrual;
        $accrual->sum = $sum;
        $accrual->user_id = $user_id;
        $accrual->type_id = 1;
        $accrual->balance_id = $balance_id;
        $accrual->comment = 'Пополнение средств по бонусной системе от пользователя '.$child_name;
        $accrual->accruals_status = 0;

        if (!$accrual->save()) {
            \Log::error('BonusDistribution: У пользователя с id '.$user_id.' не сохранен платеж на сумму '.$sum);
        } else {
            \Log::info('BonusDistribution: У пользователя с id '.$user_id.' сохранен платеж на сумму '.$sum);
        }

        return 1;
    }
}
