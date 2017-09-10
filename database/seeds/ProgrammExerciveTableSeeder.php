<?php

use Illuminate\Database\Seeder;

use App\ProgrammExercive;
use App\File;

class ProgrammExerciveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	$programExercive = ProgrammExercive::all();

    	foreach ($programExercive as $exercive) {
    		File::where('owner_id','=',$exercive->id)->delete();
    		$exercive->delete();
    	}

        $exercive_array = [
    		['id' => 1, 'slug' => '', 'name' => 'Выпады назад на месте', 'description' => '', 'file_url' => '/video/trainings/ROneStart/01_Prisedaniya_na_meste.mp4', 'preview' => '' ],
    		['id' => 2, 'slug' => '', 'name' => 'Приседания на месте', 'description' => '', 'file_url' => '/video/trainings/ROneStart/02_Vipady_nazad_na_meste.mp4', 'preview' => '' ],
    		['id' => 3, 'slug' => '', 'name' => 'Выпады назад крест-накрест', 'description' => '', 'file_url' => '/video/trainings/ROneStart/03_Vipady_nazad_krest-nakrest.mp4', 'preview' => '' ],
    		['id' => 4, 'slug' => '', 'name' => 'Боковая планка', 'description' => '', 'file_url' => '/video/trainings/ROneStart/04_planka_bokovaya.mp4', 'preview' => '' ],
    		['id' => 5, 'slug' => '', 'name' => 'Планка классическая стойка на предплечьях', 'description' => '', 'file_url' => '/video/trainings/ROneStart/05_planka_classic.mp4', 'preview' => '' ],
    		['id' => 6, 'slug' => '', 'name' => 'Подъем корпуса вперед', 'description' => '', 'file_url' => '/video/trainings/ROneStart/06_podem_korpusa_vpered.mp4', 'preview' => '' ],
    		['id' => 7, 'slug' => '', 'name' => 'Подъем ног лежа', 'description' => '', 'file_url' => '/video/trainings/ROneStart/07_podem_nog_leza.mp4', 'preview' => '' ],
    		['id' => 8, 'slug' => '', 'name' => 'Скручивание на полу', 'description' => '', 'file_url' => '/video/trainings/ROneStart/08_skruchivanie_na_polu.mp4', 'preview' => '' ],
    		['id' => 9, 'slug' => '', 'name' => 'Ягодичный мост', 'description' => '', 'file_url' => '/video/trainings/ROneStart/09_yagodichniy_most.mp4', 'preview' => '' ],
    		['id' => 10, 'slug' => '', 'name' => 'Книжка', 'description' => '', 'file_url' => '/video/trainings/ROneStart/10_knizka.mp4', 'preview' => '' ],
    		['id' => 11, 'slug' => '', 'name' => 'Ножницы', 'description' => '', 'file_url' => '/video/trainings/ROneStart/11_noznicy.mp4', 'preview' => '' ],
    		['id' => 12, 'slug' => '', 'name' => 'Склепка', 'description' => '', 'file_url' => '/video/trainings/ROneStart/12_sklepka.mp4', 'preview' => '' ],
    		['id' => 13, 'slug' => '', 'name' => 'Выпады на месте вперед', 'description' => '', 'file_url' => '/video/trainings/ROneStart/13_Vipady_na_meste_vpered.mp4', 'preview' => '' ],
    		['id' => 14, 'slug' => '', 'name' => 'Присед + выпад назад', 'description' => '', 'file_url' => '/video/trainings/ROneStart/14_prised_vipad_nazad.mp4', 'preview' => '' ],
    		['id' => 15, 'slug' => '', 'name' => 'Скалолаз', 'description' => '', 'file_url' => '/video/trainings/ROneStart/15_skalolaz.mp4', 'preview' => '' ],
    		['id' => 16, 'slug' => '', 'name' => 'Джампинг Джек', 'description' => '', 'file_url' => '/video/trainings/ROneStart/16_djamping_djek.mp4', 'preview' => '' ],

    		['id' => 17, 'slug' => '', 'name' => 'Отжимания от пола', 'description' => '', 'file_url' => '/video/trainings/ROneStart/17_otzimaniya_ot_pola.mp4', 'preview' => '' ],
    		['id' => 18, 'slug' => '', 'name' => 'Перекрестное движение рук к ногам', 'description' => '', 'file_url' => '/video/trainings/ROneStart/18_perekrestnoe_dvizenie_ot_ruk_k_nogam.mp4', 'preview' => '' ],
    		['id' => 19, 'slug' => '', 'name' => 'Альпинист', 'description' => '', 'file_url' => '/video/trainings/ROneStart/19_alpinist.mp4', 'preview' => '' ],
    		['id' => 20, 'slug' => '', 'name' => 'Упор лежа: Вставание на локти и обратно', 'description' => '', 'file_url' => '/video/trainings/ROneStart/20_upor_leza_vstavanie_na_lokti.mp4', 'preview' => '' ],
    		['id' => 21, 'slug' => '', 'name' => 'Упор лежа: С перекрестным движением рук к плечу', 'description' => '', 'file_url' => '/video/trainings/ROneStart/21_upor_s _perekrestnym.mp4', 'preview' => '' ],
    		['id' => 22, 'slug' => '', 'name' => 'Крабик', 'description' => '', 'file_url' => '/video/trainings/ROneStart/22_krabik.mp4', 'preview' => '' ],
    		['id' => 23, 'slug' => '', 'name' => 'Стульчик', 'description' => '', 'file_url' => '/video/trainings/ROneStart/23_stulchik.mp4', 'preview' => '' ],

    		['id' => 24, 'slug' => '', 'name' => 'Разножка', 'description' => '', 'file_url' => '/video/trainings/ROneStart/24_raznozka.mp4', 'preview' => '' ],
    		['id' => 25, 'slug' => '', 'name' => 'Выпрыгивание с хлопком', 'description' => '', 'file_url' => '/video/trainings/ROneStart/25_viprigivanie_s_hlopkom.mp4', 'preview' => '' ],
    		['id' => 26, 'slug' => '', 'name' => 'Присед и махи', 'description' => '', 'file_url' => '/video/trainings/ROneStart/26_prised_i_mahi.mp4', 'preview' => '' ],
    		['id' => 27, 'slug' => '', 'name' => 'Прыжки на скакалке', 'description' => '', 'file_url' => '/video/trainings/ROneStart/27_prizki_na_skakalke.mp4', 'preview' => '' ],
    		['id' => 28, 'slug' => '', 'name' => 'Колобок', 'description' => '', 'file_url' => '/video/trainings/ROneStart/28_kolobok.mp4', 'preview' => '' ],
    		['id' => 29, 'slug' => '', 'name' => 'Гиперэкстензия', 'description' => '', 'file_url' => '/video/trainings/ROneStart/29_giperextensia.mp4', 'preview' => '' ],
    		['id' => 30, 'slug' => '', 'name' => 'Разминка', 'description' => '', 'file_url' => '/video/trainings/ROneStart/30_razminka.mp4', 'preview' => '' ],
    	];

    	$programm_exercive_ids = [];

    	foreach ( $exercive_array as $exercive_row ) {
    		$programm_exercive = new ProgrammExercive;
    		$programm_exercive->id = $exercive_row['id'];
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

                // $programm_exercive->files()->create([
                //     'file_url' => $exercive_row['preview'],
                //     'file_type' => 2,
                //     'owner_id' => $programm_exercive->id,
                //     'owner_type' => 'ProgrammExercive',
                // ]);
        	}
    	}
    }
}
