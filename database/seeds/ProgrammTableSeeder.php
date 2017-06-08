<?php

use Illuminate\Database\Seeder;

use App\Programm;
use App\ProgrammDay;
use App\ProgrammExercive;
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
    	ProgrammExercive::truncate();
    	ProgrammStage::truncate();

    	$exercive_array = [
    		['slug' => 'berpie', 'name' => 'Берпи с отжиманием', 'description' => 'Берпи с отжиманием'],
    		['slug' => 'jump', 'name' => 'Прыжки на скакалке', 'description' => 'Прыжки на скакалке'],
    	];

    	$programm_exercive_ids = [];

    	foreach ( $exercive_array as $exercive_row ) {
    		$programm_exercive = new ProgrammExercive;
        	$programm_exercive->slug = $exercive_row['slug'];
        	$programm_exercive->name = $exercive_row['name'];
        	$programm_exercive->description = $exercive_row['description'];

        	if ( $programm_exercive->save() ) {
        		$programm_exercive_ids[] = $programm_exercive->id;
        	}
    	}

        $trainings = [
        	['slug' => 'test_men','name' => 'Тестовая тренировка для мужчин','description' => 'wihvbw8bvwbviboabviubivu rvn iur euviu eir einvi eirvn iernvi enrie unv ioenrvijenrn '],
        	['slug' => 'test_woman','name' => 'Тестовая тренировка для женщин','description' => 'wihvbw8bvwbviboabviubivu rvn iur euviu eir einvi eirvn iernvi enrie unv ioenrvijenrn '],
        ];

        foreach ( $trainings as $training ) {
        	$programm = new Programm;
        	$programm->slug = $training['slug'];
        	$programm->name = $training['name'];
        	$programm->description = $training['description'];

        	if ( $programm->save() ) {
        		$programm_id = $programm->id;

        		$programm_days_array = [
        			['day' => 1, 'status' => 1, 'description' => 'wvwfw r fe er '],
        			['day' => 2, 'status' => 1, 'description' => 'wvwfw r fe er '],
        			['day' => 3, 'status' => 1, 'description' => 'wvwfw r fe er '],
        			['day' => 4, 'status' => 0, 'description' => 'wvwfw r fe er '],
        			['day' => 5, 'status' => 1, 'description' => 'wvwfw r fe er '],
        			['day' => 6, 'status' => 1, 'description' => 'wvwfw r fe er '],
        			['day' => 7, 'status' => 1, 'description' => 'wvwfw r fe er '],
        			['day' => 8, 'status' => 0, 'description' => 'wvwfw r fe er '],
        			['day' => 9, 'status' => 1, 'description' => 'wvwfw r fe er '],
        			['day' => 10, 'status' => 1, 'description' => 'wvwfw r fe er '],

        			['day' => 11, 'status' => 0, 'description' => 'wvwfw r fe er '],
        			['day' => 12, 'status' => 1, 'description' => 'wvwfw r fe er '],
        			['day' => 13, 'status' => 1, 'description' => 'wvwfw r fe er '],
        			['day' => 14, 'status' => 1, 'description' => 'wvwfw r fe er '],
        			['day' => 15, 'status' => 0, 'description' => 'wvwfw r fe er '],
        			['day' => 16, 'status' => 1, 'description' => 'wvwfw r fe er '],
        			['day' => 17, 'status' => 1, 'description' => 'wvwfw r fe er '],
        			['day' => 18, 'status' => 1, 'description' => 'wvwfw r fe er '],
        			['day' => 19, 'status' => 0, 'description' => 'wvwfw r fe er '],
        			['day' => 20, 'status' => 1, 'description' => 'wvwfw r fe er '],

        			['day' => 21, 'status' => 1, 'description' => 'wvwfw r fe er '],
        			['day' => 22, 'status' => 1, 'description' => 'wvwfw r fe er '],
        			['day' => 23, 'status' => 0, 'description' => 'wvwfw r fe er '],
        			['day' => 24, 'status' => 1, 'description' => 'wvwfw r fe er '],
        			['day' => 25, 'status' => 1, 'description' => 'wvwfw r fe er '],
        			['day' => 26, 'status' => 1, 'description' => 'wvwfw r fe er '],
        			['day' => 27, 'status' => 0, 'description' => 'wvwfw r fe er '],
        			['day' => 28, 'status' => 1, 'description' => 'wvwfw r fe er '],
        		];

        		foreach ( $programm_days_array as $programm_day_row ) {
		        	$programm_day = new ProgrammDay;
		        	$programm_day->day = $programm_day_row['day'];
		        	$programm_day->status = $programm_day_row['status'];
		        	$programm_day->description = $programm_day_row['description'];
		        	$programm_day->programm_id = $programm_id;

		        	if ( $programm_day->save() ) {
		        		$programm_day_id = $programm_day->id;

		        		$programm_stages_array = [
        					['description' => 'rververve', 'time_exercive' => '12345', 'repeat_count' => null],
        					['description' => 'wvwr', 'time_exercive' => null, 'repeat_count' => 23],
        					['description' => 'wrverer', 'time_exercive' => '32', 'repeat_count' => null],
        					['description' => 'rverwvwverve', 'time_exercive' => null, 'repeat_count' => 100],
        				];

        				foreach ( $programm_stages_array as $programm_stages_row ) {
	        				$programm_stage = new ProgrammStage;
				        	$programm_stage->time_exercive = $programm_stages_row['time_exercive'];
				        	$programm_stage->repeat_count = $programm_stages_row['repeat_count'];
				        	$programm_stage->description = $programm_stages_row['description'];
				        	$programm_stage->exercise_id = $programm_exercive_ids[rand(0,1)];
				        	$programm_stage->status = 1;
				        	$programm_stage->programm_day_id = $programm_day_id;
				        	$programm_stage->save();
				        }
		        	}
		        }
        	}
        }
    }
}
