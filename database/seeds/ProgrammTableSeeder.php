<?php

use Illuminate\Database\Seeder;

use App\Programm;
use App\ProgrammDay;
use App\ProgrammStage;

class ProgrammTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	Programm::truncate();
        ProgrammDay::truncate();
        ProgrammStage::truncate();

        $trainings = [
            ['slug' => 'r.one_start','name' => 'R.ONE START','description' => 'Программа тренировок подойдет для всех вне зависимости от уровня подготовки, в том числе для новичков или тех, кто очень давно не занимался спортом и только сейчас готов стать реформатором. Попробуйте бесплатно в течение тестового периода.', 'days' => 28, 'tranings' => 9, 'day_off' => 9, 'tasks' => 10, 'cost' => 2500, 'status' => 1,'logo' => '/image/program/r.one_start.png','lite' => 0],
            ['slug' => 'r.one_pro','name' => 'R.ONE PRO','description' => 'Программа предназначенная для Про', 'days' => 28, 'tranings' => 9, 'day_off' => 9, 'tasks' => 10, 'cost' => 2500, 'status' => 0,'logo' => '/image/program/r.one_pro.png','lite' => 0],
            ['slug' => 'r.one_runner','name' => 'R.ONE RUNNER','description' => 'Программа предназначенная для бега.', 'days' => 28, 'tranings' => 9, 'day_off' => 9, 'tasks' => 10, 'cost' => 2500, 'status' => 0,'logo' => '/image/program/r.one_run.png','lite' => 0],
        	['slug' => 'r.one_runner_plus','name' => 'R.ONE RUNNER +','description' => 'Программа предназначенная для бега с бонусами', 'days' => 28, 'tranings' => 9, 'day_off' => 9, 'tasks' => 10, 'cost' => 2500, 'status' => 0,'logo' => '/image/program/r.one_run+.png','lite' => 0],
        	['slug' => 'r.one_power','name' => 'R.ONE POWER','description' => 'Программа предназначенная для самых сильных', 'days' => 28, 'tranings' => 9, 'day_off' => 9, 'tasks' => 10, 'cost' => 2500, 'status' => 0,'logo' => '/image/program/r.one_power.png','lite' => 0],
            ['slug' => 'r.one_lite','name' => 'R.ONE Lite','description' => 'Программа тренировок по лайт-цене для всех, кто хочет попробовать свои силы и не любит отправлять отчеты, а также кто хочет больше внимания уделить бонусной системе', 'days' => 28, 'tranings' => 8, 'day_off' => 10, 'tasks' => 11, 'cost' => 2500, 'status' => 1,'logo' => '/image/program/r.one_lite.png','lite' => 1],
        ];

        foreach ( $trainings as $training ) {
        	$programm = new Programm;
        	$programm->slug = $training['slug'];
        	$programm->name = $training['name'];
        	$programm->description = $training['description'];
            $programm->cost = $training['cost'];
            $programm->days =$training['days'];
            $programm->trainings =$training['tranings'];
            $programm->day_off =$training['day_off'];
            $programm->tasks =$training['tasks'];
            $programm->status =$training['status'];
            $programm->logo =$training['logo'];
            $programm->lite =$training['lite'];

        	$programm->save();
        }
    }
}
