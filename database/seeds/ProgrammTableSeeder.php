<?php

use Illuminate\Database\Seeder;

use App\Programm;
use App\ProgrammDay;
use App\ProgrammExercive;
use App\ProgrammStage;
use App\File;

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
        File::truncate();

    	$exercive_array = [
    		['slug' => 'berpie', 'name' => 'Берпи с отжиманием', 'description' => 'Берпи с отжиманием Берпи с отжиманием Берпи с отжиманием Берпи с отжиманием Берпи с отжиманием Берпи с отжиманием', 'file_url' => '/video/trainings/birpie.mp4', 'preview' => '/image/test/preview1.png' ],
    		['slug' => 'jump', 'name' => 'Прыжки на скакалке', 'description' => 'Прыжки на скакалке', 'file_url' => '/video/trainings/jump.mp4', 'preview' => '/image/test/preview2.png'],
    	];

    	$programm_exercive_ids = [];

    	foreach ( $exercive_array as $exercive_row ) {
    		$programm_exercive = new ProgrammExercive;
        	$programm_exercive->slug = $exercive_row['slug'];
        	$programm_exercive->name = $exercive_row['name'];
        	$programm_exercive->description = $exercive_row['description'];

        	if ( $programm_exercive->save() ) {
        		$programm_exercive_ids[] = $programm_exercive->id;

                $programm_exercive->files()->create([
                    'file_url' => $exercive_row['file_url'],
                    'file_type' => 3,
                    'owner_id' => $programm_exercive->id,
                    'owner_type' => 'ProgrammExercive',
                ]);

                $programm_exercive->files()->create([
                    'file_url' => $exercive_row['preview'],
                    'file_type' => 2,
                    'owner_id' => $programm_exercive->id,
                    'owner_type' => 'ProgrammExercive',
                ]);
        	}
    	}

        $trainings = [
            ['slug' => 'r.one_start','name' => 'R.ONE START','description' => 'Программа предназначеная для новичков'],
            ['slug' => 'r.one_pro','name' => 'R.ONE PRO','description' => 'Программа предназначеная для Про'],
            ['slug' => 'r.one_runner','name' => 'R.ONE RUNNER','description' => 'Программа предназначеная для бега.'],
        	['slug' => 'r.one_runner_plus','name' => 'R.ONE RUNNER +','description' => 'Программа предназначеная для бега с бонусами'],
        	['slug' => 'r.one_power','name' => 'R.ONE POWER','description' => 'Программа предназначеная для самых сильных'],
        ];

        foreach ( $trainings as $training ) {
        	$programm = new Programm;
        	$programm->slug = $training['slug'];
        	$programm->name = $training['name'];
        	$programm->description = $training['description'];

        	if ( $programm->save() ) {
        		$programm_id = $programm->id;

        		$programm_days_array = [
        			['day' => 1, 'status' => 1, 'description' => 'wvwfw r fe er ', 'lead_time' => 234242, 'difficult' => 1],
        			['day' => 2, 'status' => 1, 'description' => 'wvwfw r fe er ', 'lead_time' => 123, 'difficult' => 2],
        			['day' => 3, 'status' => 1, 'description' => 'wvwfw r fe er ', 'lead_time' => 23, 'difficult' => 2],
        			['day' => 4, 'status' => 0, 'description' => 'wvwfw r fe er ', 'lead_time' => 234242, 'difficult' => 3],
        			['day' => 5, 'status' => 1, 'description' => 'wvwfw r fe er ', 'lead_time' => 432, 'difficult' => 3],
        			['day' => 6, 'status' => 1, 'description' => 'wvwfw r fe er ', 'lead_time' => 234242, 'difficult' => 1],
        			['day' => 7, 'status' => 1, 'description' => 'wvwfw r fe er ', 'lead_time' => 234242, 'difficult' => 3],
        			['day' => 8, 'status' => 0, 'description' => 'wvwfw r fe er ', 'lead_time' => 432, 'difficult' => 1],
        			['day' => 9, 'status' => 1, 'description' => 'wvwfw r fe er ', 'lead_time' => 234242, 'difficult' => 1],
        			['day' => 10, 'status' => 1, 'description' => 'wvwfw r fe er ', 'lead_time' => 123, 'difficult' => 2],

        			['day' => 11, 'status' => 0, 'description' => 'wvwfw r fe er ', 'lead_time' => 234242, 'difficult' => 1],
        			['day' => 12, 'status' => 1, 'description' => 'wvwfw r fe er ', 'lead_time' => 231, 'difficult' => 3],
        			['day' => 13, 'status' => 1, 'description' => 'wvwfw r fe er ', 'lead_time' => 234242, 'difficult' => 1],
        			['day' => 14, 'status' => 1, 'description' => 'wvwfw r fe er ', 'lead_time' => 324, 'difficult' => 1],
        			['day' => 15, 'status' => 0, 'description' => 'wvwfw r fe er ', 'lead_time' => 234242, 'difficult' => 2],
        			['day' => 16, 'status' => 1, 'description' => 'wvwfw r fe er ', 'lead_time' => 234242, 'difficult' => 3],
        			['day' => 17, 'status' => 1, 'description' => 'wvwfw r fe er ', 'lead_time' => 324, 'difficult' => 1],
        			['day' => 18, 'status' => 1, 'description' => 'wvwfw r fe er ', 'lead_time' => 123, 'difficult' => 1],
        			['day' => 19, 'status' => 0, 'description' => 'wvwfw r fe er ', 'lead_time' => 234242, 'difficult' => 2],
        			['day' => 20, 'status' => 1, 'description' => 'wvwfw r fe er ', 'lead_time' => 234242, 'difficult' => 3],

        			['day' => 21, 'status' => 1, 'description' => 'wvwfw r fe er ', 'lead_time' => 234242, 'difficult' => 1],
        			['day' => 22, 'status' => 1, 'description' => 'wvwfw r fe er ', 'lead_time' => 13, 'difficult' => 2],
        			['day' => 23, 'status' => 0, 'description' => 'wvwfw r fe er ', 'lead_time' => 234242, 'difficult' => 1],
        			['day' => 24, 'status' => 1, 'description' => 'wvwfw r fe er ', 'lead_time' => 234, 'difficult' => 2],
        			['day' => 25, 'status' => 1, 'description' => 'wvwfw r fe er ', 'lead_time' => 342, 'difficult' => 1],
        			['day' => 26, 'status' => 1, 'description' => 'wvwfw r fe er ', 'lead_time' => 234242, 'difficult' => 3],
        			['day' => 27, 'status' => 0, 'description' => 'wvwfw r fe er ', 'lead_time' => 14, 'difficult' => 1],
        			['day' => 28, 'status' => 1, 'description' => 'wvwfw r fe er ', 'lead_time' => 234242, 'difficult' => 2],
        		];

        		foreach ( $programm_days_array as $programm_day_row ) {
		        	$programm_day = new ProgrammDay;
		        	$programm_day->day = $programm_day_row['day'];
		        	$programm_day->status = $programm_day_row['status'];
		        	$programm_day->description = $programm_day_row['description'];
                    $programm_day->lead_time = $programm_day_row['lead_time'];
                    $programm_day->difficult = $programm_day_row['difficult'];
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
