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
    		['id' => 1, 'slug' => '', 'name' => 'Выпады назад на месте', 'description' => 'Бедро ниже параллели, колено не выходит вперед', 'file_url' => '/video/trainings/ROneStart/01_Prisedaniya_na_meste.mp4', 'preview' => '/image/preview/выпады-назад-на-месте.jpg' ],
    		['id' => 2, 'slug' => '', 'name' => 'Приседания на месте', 'description' => 'Бедро ниже параллели, спина прямая.', 'file_url' => '/video/trainings/ROneStart/02_Vipady_nazad_na_meste.mp4', 'preview' => '/image/preview/приседания-на-месте.jpg' ],
    		['id' => 3, 'slug' => '', 'name' => 'Выпады назад крест-накрест', 'description' => 'Осанка прямая', 'file_url' => '/video/trainings/ROneStart/03_Vipady_nazad_krest-nakrest.mp4', 'preview' => '/image/preview/выпады-назад-крест-накрест.jpg' ],
    		['id' => 4, 'slug' => '', 'name' => 'Боковая планка', 'description' => 'Никаких прогибов.', 'file_url' => '/video/trainings/ROneStart/04_planka_bokovaya.mp4', 'preview' => '/image/preview/планка-боковая.jpg' ],
    		['id' => 5, 'slug' => '', 'name' => 'Планка классическая стойка на предплечьях', 'description' => 'Осанка ровная, в пояснице без прогиба, ноги на ширине таза.', 'file_url' => '/video/trainings/ROneStart/05_planka_classic.mp4', 'preview' => '/image/preview/планка-классическая.jpg' ],
    		['id' => 6, 'slug' => '', 'name' => 'Подъем корпуса вперед', 'description' => 'Руки касаются пола или внутренней части стопы.', 'file_url' => '/video/trainings/ROneStart/06_podem_korpusa_vpered.mp4', 'preview' => '/image/preview/подъем-корпуса-вперед.jpg' ],
    		['id' => 7, 'slug' => '', 'name' => 'Подъем ног лежа', 'description' => 'Руки под ягодицами, ноги прямые.', 'file_url' => '/video/trainings/ROneStart/07_podem_nog_leza.mp4', 'preview' => '/image/preview/подъем-ног-лежа.jpg' ],
    		['id' => 8, 'slug' => '', 'name' => 'Скручивание на полу', 'description' => '', 'file_url' => '/video/trainings/ROneStart/08_skruchivanie_na_polu.mp4', 'preview' => '/image/preview/скручивания-на-полу.jpg' ],
    		['id' => 9, 'slug' => '', 'name' => 'Ягодичный мост', 'description' => '', 'file_url' => '/video/trainings/ROneStart/09_yagodichniy_most.mp4', 'preview' => '/image/preview/ягодичный-мост.jpg' ],
    		['id' => 10, 'slug' => '', 'name' => 'Книжка', 'description' => 'Больше работа корпусом, движения ногами минимальны.', 'file_url' => '/video/trainings/ROneStart/10_knizka.mp4', 'preview' => '/image/preview/книжка.jpg' ],
    		['id' => 11, 'slug' => '', 'name' => 'Ножницы', 'description' => 'Ноги прямые, носки вытянуты.', 'file_url' => '/video/trainings/ROneStart/11_noznicy.mp4', 'preview' => '/image/preview/ножницы.jpg' ],
    		['id' => 12, 'slug' => '', 'name' => 'Склепка', 'description' => 'Работа рук и ног одновременная.', 'file_url' => '/video/trainings/ROneStart/12_sklepka.mp4', 'preview' => '/image/preview/склёпка.jpg' ],
    		['id' => 13, 'slug' => '', 'name' => 'Выпады на месте вперед', 'description' => ' Прямая осанка, колено за носки не выходит.', 'file_url' => '/video/trainings/ROneStart/13_Vipady_na_meste_vpered.mp4', 'preview' => '/image/preview/выпады-вперед-на-месте.jpg' ],
    		['id' => 14, 'slug' => '', 'name' => 'Присед + выпад назад', 'description' => 'Не спешить, движения четкие.', 'file_url' => '/video/trainings/ROneStart/14_prised_vipad_nazad.mp4', 'preview' => '/image/preview/присед+выпад-назад.jpg' ],
    		['id' => 15, 'slug' => '', 'name' => 'Скалолаз', 'description' => 'Колено касается локтя.', 'file_url' => '/video/trainings/ROneStart/15_skalolaz.mp4', 'preview' => '/image/preview/скалолаз.jpg' ],
    		['id' => 16, 'slug' => '', 'name' => 'Джампинг Джек', 'description' => 'При преземлении ноги чуть согнуты в коленях, хлопок над головой.', 'file_url' => '/video/trainings/ROneStart/16_djamping_djek.mp4', 'preview' => '/image/preview/джампинг-джек.jpg' ],

    		['id' => 17, 'slug' => '', 'name' => 'Отжимания от пола', 'description' => 'Грудью касаемся пола, упращенный вариант упор с колен.', 'file_url' => '/video/trainings/ROneStart/17_otzimaniya_ot_pola.mp4', 'preview' => '/image/preview/отжимания-от-пола' ],
    		['id' => 18, 'slug' => '', 'name' => 'Перекрестное движение рук к ногам', 'description' => 'Руки касаются внещней части стопы.', 'file_url' => '/video/trainings/ROneStart/18_perekrestnoe_dvizenie_ot_ruk_k_nogam.mp4', 'preview' => '/image/preview/перекрестное-движение-от-рук-к-ногам.jpg' ],
    		['id' => 19, 'slug' => '', 'name' => 'Альпинист', 'description' => 'Ходьба в упоре лёжа, движения как можно шире.', 'file_url' => '/video/trainings/ROneStart/19_alpinist.mp4', 'preview' => '/image/preview/альпинист.jpg' ],
    		['id' => 20, 'slug' => '', 'name' => 'Упор лежа: Вставание на локти и обратно', 'description' => 'Сохранение прямой осанки без прогибов.', 'file_url' => '/video/trainings/ROneStart/20_upor_leza_vstavanie_na_lokti.mp4', 'preview' => '/image/preview/упор-лежа-вставание-на-локти-и-обратно.jpg' ],
    		['id' => 21, 'slug' => '', 'name' => 'Упор лежа: С перекрестным движением рук к плечу', 'description' => '', 'file_url' => '/video/trainings/ROneStart/21_upor_s _perekrestnym.mp4', 'preview' => '/image/preview/упор-лежа-с-перекрестными-движениями-рук-к-плечу.jpg' ],
    		['id' => 22, 'slug' => '', 'name' => 'Крабик', 'description' => 'Шаги в сторону не широко, бедра параллельны полу.', 'file_url' => '/video/trainings/ROneStart/22_krabik.mp4', 'preview' => '/image/preview/крабик.jpg' ],
    		['id' => 23, 'slug' => '', 'name' => 'Стульчик', 'description' => 'Бедро параллельно полу, прямой угол в коленном суставе.', 'file_url' => '/video/trainings/ROneStart/23_stulchik.mp4', 'preview' => '/image/preview/стульчик.jpg' ],

    		['id' => 24, 'slug' => '', 'name' => 'Разножка', 'description' => 'Амплитуда как можно шире, Ровная осанка.', 'file_url' => '/video/trainings/ROneStart/24_raznozka.mp4', 'preview' => '/image/preview/разножка-на-месте.jpg' ],
    		['id' => 25, 'slug' => '', 'name' => 'Выпрыгивание с хлопком', 'description' => '', 'file_url' => '/video/trainings/ROneStart/25_viprigivanie_s_hlopkom.mp4', 'preview' => '/image/preview/выпрыгивание-вверх-с-хлопком-над-головой.jpg' ],
    		['id' => 26, 'slug' => '', 'name' => 'Присед и махи', 'description' => 'Вперед, назад, в стороны. Соблюдаем все основные правила писеданий.', 'file_url' => '/video/trainings/ROneStart/26_prised_i_mahi.mp4', 'preview' => '/image/preview/присед+махи-в-разные-стороны.jpg' ],
    		['id' => 27, 'slug' => '', 'name' => 'Прыжки на скакалке', 'description' => '', 'file_url' => '/video/trainings/ROneStart/27_prizki_na_skakalke.mp4', 'preview' => '/image/preview/прыжки-на-скакалке.jpg' ],
    		['id' => 28, 'slug' => '', 'name' => 'Колобок', 'description' => 'Упор лежа, одна рука за голову и встречное движение противоположному колену с паузой 1сек..', 'file_url' => '/video/trainings/ROneStart/28_kolobok.mp4', 'preview' => '/image/preview/колобок.jpg' ],
    		['id' => 29, 'slug' => 'Руки за головой или вытянуты перед собой, ноги стараться не отрывать.', 'name' => 'Гиперэкстензия', 'description' => '', 'file_url' => '/video/trainings/ROneStart/29_giperextensia.mp4', 'preview' => '/image/preview/гиперэкстензия.jpg' ],
    		['id' => 30, 'slug' => '', 'name' => 'Разминка', 'description' => '', 'file_url' => '/video/trainings/ROneStart/30_razminka.mp4', 'preview' => '/image/preview/разминка.jpg' ],
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
                    'preview_url' => $exercive_row['preview'],
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
