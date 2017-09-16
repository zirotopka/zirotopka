<?php

use Illuminate\Database\Seeder;

use App\Programm;
use App\ProgrammDay;
use App\ProgrammExercive;
use App\ProgrammStage;
use App\File;

class ROneStartTableSeeder extends Seeder
{	
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	$program = Programm::where('slug','=','ROneStart')->first();

    	if (!empty($program)) {
    		$programDays = ProgrammDay::where('programm_id','=',$program->id)->get();

    		foreach ($programDays as $day) {
    			ProgrammStage::where('programm_day_id','=',$day)->delete();
    			$day->delete();
    		}

    		$program->delete();
    	}

    	$program = Programm::where('id','=',1)->first();

    	if (!empty($program)) {
    		$programDays = ProgrammDay::where('programm_id','=',$program->id)->get();

    		foreach ($programDays as $day) {
    			ProgrammStage::where('programm_day_id','=',$day)->delete();
    			$day->delete();
    		}

    		$program->delete();
    	}

    	$programm = new Programm;
    	$programm->id = 1;
    	$programm->slug = 'ROneStart';
    	$programm->name = 'R.ONE START';
    	$programm->description = 'Программа тренировок подойдет для всех вне зависимости от уровня подготовки, в том числе для новичков или тех, кто очень давно не занимался спортом и только сейчас готов стать реформатором. Попробуйте бесплатно в течение тестового периода.';
        $programm->cost = 2500;
        $programm->days =28;
        $programm->trainings =9;
        $programm->day_off =8;
        $programm->tasks =9;

        if ( $programm->save() ) {
    		$programm_id = $programm->id;

    		$programm_days_array = [
    			['day' => 1, 'status' => 0, 'description' => '1-й день программы тренировок задействует все основные мышцы в организме и сегодня контрольный тест – все упражнения делаете по максимуму, сколько сможете.
Перед выполнением всех упражнений сразу или по отдельности рекомендуется сделать общую разминку, а после окончания выполнения тренировки – растяжку.', 'lead_time' => '','interest' => 1, 'difficult' => 2, 'lead_time' => '< 20 мин', 'stages' => [
					['description' => 'Приседания на месте', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => 'максимуму','status' => 1, 'exercise_id' => 2],
					['description' => 'Планка классическая стойка на предплечьях', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => 'максимум', 'status' => 1, 'exercise_id' => 5],
					['description' => 'Стульчик у опоры', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => 'максимум', 'status' => 1, 'exercise_id' => 23],
					['description' => 'Отжимание от пола', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => 'максимум', 'status' => 1, 'exercise_id' => 17],
				]],
				['day' => 2, 'status' => 0, 'description' => '"Вспомогательная тренировка для укрепления всего организма. Развивается общая выносливость и помощь в ускорении обмена веществ. Каждое упражнение выполняется в течение 1 минуты, отдых между переходом на другое упражнение 10-15 сек. Выполняется 3 круга."', 'lead_time' => '< 20 мин','interest' => 0, 'difficult' => 1, 'stages' => [
					['description' => 'Крабик', 'interest' => 1, 'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему.', 'repeat_count' => '2 круга','status' => 0, 'exercise_id' => 22],
					['description' => 'Перекрестное движение рук к ногам', 'interest' => 1, 'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему.', 'repeat_count' => '2 круга', 'status' => 0, 'exercise_id' => 18],
					['description' => 'Выпрыгивание вверх, хлопок над головой', 'interest' => 1, 'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему.', 'repeat_count' => '2 круга', 'status' => 0, 'exercise_id' => 25],
					['description' => 'Планка классическая', 'interest' => 1, 'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему.', 'repeat_count' => '2 круга', 'status' => 0, 'exercise_id' => 5],
				]],
				['day' => 3, 'status' => 0, 'description' => 'Выходной', 'lead_time' => '','interest' => 0, 'difficult' => 0, 'stages' => []],
				['day' => 4, 'status' => 1, 'description' => 'Тренировка направлена на укрепление мышц ног и пресса.', 'lead_time' => '< 20 мин','interest' => 0, 'difficult' => 1, 'stages' => [
					['description' => 'Выпады назад на месте', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 30 повторений','status' => 0, 'exercise_id' => 1],
					['description' => 'Разножка на месте', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 30 повторений', 'status' => 0, 'exercise_id' => 24],
					['description' => 'Стульчик у опоры', 'interest' => 1, 'time_exercive' => '1 минута', 'repeat_count' => '2 подхода', 'status' => 0, 'exercise_id' => 23],
					['description' => 'Подъем ног лежа', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 20 повторений', 'status' => 0, 'exercise_id' => 7],
				]],
				['day' => 5, 'status' => 0, 'description' => 'Выходной', 'lead_time' => '','interest' => 0, 'difficult' => 0, 'stages' => []],
				['day' => 6, 'status' => 1, 'description' => 'Более глубокая проработка мышечной ткани и хороший жиросжигательный эффект!', 'lead_time' => '< 40 мин','interest' => 1, 'difficult' => 2, 'stages' => [
					['description' => 'Легкий бег или хаотичные прыжки в сторону', 'interest' => 1, 'time_exercive' => '15 минут бег или 150 прыжков', 'repeat_count' => '','status' => 1, 'exercise_id' => null],
					['description' => 'Присед + различные махи в стороны', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 20 повторений', 'status' => 1, 'exercise_id' => 26],
					['description' => 'Скалолаз', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 15 повторений', 'status' => 1, 'exercise_id' => 15],
					['description' => 'Альпинист', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 15 повторений', 'status' => 1, 'exercise_id' => 19],
				]],
				['day' => 7, 'status' => 1, 'description' => 'Легкое повышение нагрузки на организм, переход на следующую ступень', 'lead_time' => '< 30 мин','interest' => 0, 'difficult' => 2, 'stages' => [
					['description' => 'Приседания на месте', 'interest' => 1, 'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему.', 'repeat_count' => 'Всего 3 круга','status' => 0, 'exercise_id' => 2],
					['description' => 'Боковая планка', 'interest' => 1,  'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему.', 'repeat_count' => 'Всего 3 круга', 'status' => 0, 'exercise_id' => 4],
					['description' => 'Упор лежа: вставание на локти и обратно', 'interest' => 1,  'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему.', 'repeat_count' => 'Всего 3 круга', 'status' => 0, 'exercise_id' => 20],
					['description' => 'Выпрыгивание вверх , хлопок над головой', 'interest' => 1,  'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему.', 'repeat_count' => 'Всего 3 круга', 'status' => 0, 'exercise_id' => 25],
				]],
				['day' => 8, 'status' => 0, 'description' => 'Выходной', 'lead_time' => '','interest' => 0, 'difficult' => 0, 'stages' => []],
				['day' => 9, 'status' => 1, 'description' => 'Тренировка направлена на укрепление верхнего плечевого пояса и мышц пресса.', 'lead_time' => '< 40 мин','interest' => 1, 'difficult' => 2, 'stages' => [
					['description' => 'Легкий бег', 'interest' => 1, 'time_exercive' => '15 минут', 'repeat_count' => '','status' => 1, 'exercise_id' => null],
					['description' => 'Отжимание от пола', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 15 повторений', 'status' => 1, 'exercise_id' => 17],
					['description' => 'Упор лежа с перекрестным движением рук к плечу', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 20 повторений', 'status' => 1, 'exercise_id' => 21],
					['description' => 'Ножницы', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 20 повторений', 'status' => 1, 'exercise_id' => 11],
				]],
				['day' => 10, 'status' => 1, 'description' => '', 'lead_time' => '< 30 мин','interest' => 0, 'difficult' => 2, 'stages' => [
					['description' => 'Прыжки на скакалке', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '150 прыжков','status' => 1, 'exercise_id' => 27],
					['description' => 'Разножка на месте', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 30 повторений', 'status' => 1, 'exercise_id' => 24],
					['description' => 'Присед + выпад назад', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 30 повторений', 'status' => 1, 'exercise_id' => 14],
					['description' => 'Стульчик у опоры', 'interest' => 1, 'time_exercive' => '2 минуты', 'repeat_count' => '', 'status' => 1, 'exercise_id' => 23],
				]],

				['day' => 11, 'status' => 0, 'description' => 'Выходной', 'lead_time' => '','interest' => 0, 'difficult' => 0, 'stages' => []],
				['day' => 12, 'status' => 1, 'description' => '12-й день тренировки помогает поддерживать общий тонус ваших мышц', 'lead_time' => '< 40 мин','interest' => 0, 'difficult' => 1, 'stages' => [
					['description' => 'Легкий бег', 'interest' => 1, 'time_exercive' => '15 минут', 'repeat_count' => '','status' => 1, 'exercise_id' => null],
					['description' => 'Прыжки на скакалке', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '150 раз', 'status' => 1, 'exercise_id' => 27],
					['description' => 'Перекрестное движение рук к ногам', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 20 повторений', 'status' => 1, 'exercise_id' => 18],
					['description' => 'Подъем корпуса вперед', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 20 повторений', 'status' => 1, 'exercise_id' => 6],
				]],
				['day' => 13, 'status' => 1, 'description' => 'Сегодняшний день тренировки заметно покажет, насколько вы преуспели в своем развитии', 'lead_time' => '< 40 мин','interest' => 1, 'difficult' => 3, 'stages' => [
					['description' => 'Книжка', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '50 повторений, отдых 10-15 сек, переход к следующему. Всего 2 круга.','status' => 1, 'exercise_id' => 10],
					['description' => 'Присед + различные махи в стороны', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '50 повторений, отдых 10-15 сек, переход к следующему. Всего 2 круга.', 'status' => 1, 'exercise_id' => 26],
					['description' => 'Упор лежа: вставание на локти и обратно', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '50 повторений, отдых 10-15 сек, переход к следующему. Всего 2 круга.', 'status' => 1, 'exercise_id' => 20],
					['description' => 'Планка', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '50 повторений, отдых 10-15 сек, переход к следующему. Всего 2 круга.', 'status' => 1, 'exercise_id' => 5],
				]],
				['day' => 14, 'status' => 0, 'description' => 'Выходной', 'lead_time' => '','interest' => 0, 'difficult' => 0, 'stages' => []],
				['day' => 15, 'status' => 1, 'description' => 'Глубокая проработка мышц ног', 'lead_time' => '< 40 мин','interest' => 1, 'difficult' => 2, 'stages' => [
					['description' => 'Легкий бег', 'interest' => 1, 'time_exercive' => '20 минут', 'repeat_count' => '','status' => 1, 'exercise_id' => null],
					['description' => 'Приседания на месте', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 60 повторений', 'status' => 1, 'exercise_id' => 2],
					['description' => 'Выпрыгивание вверх, хлопок над головой', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 60 повторений', 'status' => 1, 'exercise_id' => 25],
					['description' => 'Выпады назад крест-накрест', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 60 повторений', 'status' => 1, 'exercise_id' => 3],
				]],
				['day' => 16, 'status' => 1, 'description' => 'Укрепление всех мышечных групп организма', 'lead_time' => '< 30 мин','interest' => 0, 'difficult' => 2, 'stages' => [
					['description' => 'Крабик', 'interest' => 1, 'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему. Всего 3 круга.', 'repeat_count' => '','status' => 1, 'exercise_id' => 22],
					['description' => 'Перекрестное движение рук к ногам', 'interest' => 1, 'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему. Всего 3 круга.', 'repeat_count' => '', 'status' => 1, 'exercise_id' => 18],
					['description' => 'Выпрыгивание вверх, хлопок над головой', 'interest' => 1, 'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему. Всего 3 круга.', 'repeat_count' => '', 'status' => 1, 'exercise_id' => 25],
					['description' => 'Планка', 'interest' => 1, 'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему. Всего 3 круга.', 'repeat_count' => '', 'status' => 1, 'exercise_id' => 5],
				]],
				['day' => 17, 'status' => 0, 'description' => 'Выходной', 'lead_time' => '','interest' => 0, 'difficult' => 0, 'stages' => []],
				['day' => 18, 'status' => 1, 'description' => 'Поддержание мышечного тонуса ног', 'lead_time' => '< 40 мин','interest' => 0, 'difficult' => 3, 'stages' => [
					['description' => 'Выпады назад на месте', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 30 повторений','status' => 1, 'exercise_id' => 1],
					['description' => 'Разножка на месте', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 40 повторений', 'status' => 1, 'exercise_id' => 24],
					['description' => 'Стульчик у опоры', 'interest' => 1, 'time_exercive' => '1,5 минуты', 'repeat_count' => '3 подхода', 'status' => 1, 'exercise_id' => 23],
					['description' => 'Подъем ног лежа', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 30 повторений', 'status' => 1, 'exercise_id' => 7],
				]],
				['day' => 19, 'status' => 1, 'description' => 'Продолжаем развивать вашу двигательную активность', 'lead_time' => '< 40 мин','interest' => 2, 'difficult' => 1, 'stages' => [
					['description' => 'Скручивание на полу', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 30 повторений','status' => 1, 'exercise_id' => 8],
					['description' => 'Отжимания от пола', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 20 повторений', 'status' => 1, 'exercise_id' => 17],
					['description' => 'Приседания на месте', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 60 повторений', 'status' => 1, 'exercise_id' => 2],
					['description' => 'Джампинг Джек', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 40 повторений', 'status' => 1, 'exercise_id' => 16],
				]],
				['day' => 20, 'status' => 0, 'description' => 'Выходной', 'lead_time' => '','interest' => 0, 'difficult' => 0, 'stages' => []],

				['day' => 21, 'status' => 1, 'description' => 'Общая тренировка и хорошая проработка рук и мышц кора', 'lead_time' => '< 40 мин','interest' => 1, 'difficult' => 2, 'stages' => [
					['description' => 'Легкий бег', 'interest' => 1, 'time_exercive' => '15 минут', 'repeat_count' => '','status' => 1, 'exercise_id' => null],
					['description' => 'Отжимания от пола', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 30 повторений', 'status' => 1, 'exercise_id' => 17],
					['description' => 'Гиперэкстензия', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 20 повторений', 'status' => 1, 'exercise_id' => 29],
					['description' => 'Ножницы ', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 20 повторений', 'status' => 1, 'exercise_id' => 11],
				]],
				['day' => 22, 'status' => 1, 'description' => 'Тренировка на выносливость', 'lead_time' => '< 50 мин','interest' => 0, 'difficult' => 3, 'stages' => [
					['description' => 'Приседания на месте', 'interest' => 1, 'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему. ', 'repeat_count' => 'Всего 4 круга.','status' => 1, 'exercise_id' => 2],
					['description' => 'Боковая планка', 'interest' => 1, 'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему. ', 'repeat_count' => 'Всего 4 круга.', 'status' => 1, 'exercise_id' => 4],
					['description' => 'Упор лежа: вставание на локти и обратно', 'interest' => 1, 'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему. ', 'repeat_count' => 'Всего 4 круга.', 'status' => 1, 'exercise_id' => 20],
					['description' => 'Выпрыгивание вверх, хлопок над головой ', 'interest' => 1, 'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему. ', 'repeat_count' => 'Всего 4 круга.', 'status' => 1, 'exercise_id' => 25],
				]],
				['day' => 23, 'status' => 0, 'description' => 'Выходной', 'lead_time' => '','interest' => 0, 'difficult' => 0, 'stages' => []],
				['day' => 24, 'status' => 1, 'description' => 'Поддержание мышечного тонуса ног', 'lead_time' => '< 40 мин','interest' => 0, 'difficult' => 2, 'stages' => [
					['description' => 'Прыжки на скакалке', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '200 прыжков','status' => 1, 'exercise_id' => 27],
					['description' => 'Разножка на месте', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 30 повторений', 'status' => 1, 'exercise_id' => 24],
					['description' => 'Присед + выпад назад', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 30 повторений', 'status' => 1, 'exercise_id' => 14],
					['description' => 'Скалолаз ', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 30 повторений', 'status' => 1, 'exercise_id' => 15],
				]],
				['day' => 25, 'status' => 1, 'description' => 'Хорошая проработка мышц пресса ног и рук', 'lead_time' => '< 40 мин','interest' => 1, 'difficult' => 2, 'stages' => [
					['description' => 'Прыжки на скакалке', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '250 прыжков','status' => 1, 'exercise_id' => 27],
					['description' => 'Скручивание на полу', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 30 повторений', 'status' => 1, 'exercise_id' => 8],
					['description' => 'Отжимания от пола', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 30 повторений', 'status' => 1, 'exercise_id' => 17],
					['description' => 'Приседания на месте ', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 30 повторений', 'status' => 1, 'exercise_id' => 2],
				]],
				['day' => 26, 'status' => 0, 'description' => 'Выходной', 'lead_time' => '','interest' => 0, 'difficult' => 0, 'stages' => []],
				['day' => 27, 'status' => 1, 'description' => 'Общая тренировка и хорошая проработка ног и мышц кора', 'lead_time' => '< 40 мин','interest' => 0, 'difficult' => 2, 'stages' => [
					['description' => 'Прыжки на скакалке', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '200 прыжков','status' => 1, 'exercise_id' => 27],
					['description' => 'Присед + выпад назад', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 30 повторений', 'status' => 1, 'exercise_id' => 14],
					['description' => 'Скалолаз', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 30 повторений', 'status' => 1, 'exercise_id' => 15],
					['description' => 'Стульчик у опоры ', 'interest' => 1, 'time_exercive' => '2 минуты', 'repeat_count' => '1 подход', 'status' => 1, 'exercise_id' => 23],
				]],
				['day' => 28, 'status' => 1, 'description' => 'Финальный день твоей программы тренировок и сегодня контрольный тест (постарайся вспомнить результаты контрольного теста в 1-й день и сравни с сегодняшними результатами)', 'lead_time' => '< 60 мин','interest' => 1, 'difficult' => 3, 'stages' => [
					['description' => 'Приседания на месте', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '&#8734;','status' => 1, 'exercise_id' => 2],
					['description' => 'Планка классическая стойка на предплечьях', 'interest' => 1, 'time_exercive' => '&#8734;', 'repeat_count' => '', 'status' => 1, 'exercise_id' => 5],
					['description' => 'Стульчик у опоры', 'interest' => 1, 'time_exercive' => '&#8734;', 'repeat_count' => '', 'status' => 1, 'exercise_id' => 23],
					['description' => 'Отжимание от пола', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '&#8734;', 'status' => 1, 'exercise_id' => 17],
				]],
    		];

    		foreach ( $programm_days_array as $programm_day_row ) {
	        	$programm_day = new ProgrammDay;
	        	$programm_day->day = $programm_day_row['day'];
	        	$programm_day->status = $programm_day_row['status'];
	        	$programm_day->description = $programm_day_row['description'];
                $programm_day->lead_time = $programm_day_row['lead_time'];
                $programm_day->difficult = $programm_day_row['difficult'];
                $programm_day->interest = $programm_day_row['interest'];
	        	$programm_day->programm_id = $programm_id;

	        	if ( $programm_day->save() ) {
	        		$programm_day_id = $programm_day->id;

	        		if (count($programm_day_row['stages']) > 0) {
	        			foreach ( $programm_day_row['stages'] as $programm_stages_row ) {
	        				$programm_stage = new ProgrammStage;
				        	$programm_stage->time_exercive = $programm_stages_row['time_exercive'];
				        	$programm_stage->repeat_count = $programm_stages_row['repeat_count'];
				        	$programm_stage->description = $programm_stages_row['description'];
				        	$programm_stage->exercise_id = $programm_stages_row['exercise_id'];
				        	$programm_stage->status = $programm_stages_row['status'];
				        	$programm_stage->programm_day_id = $programm_day_id;
				        	$programm_stage->save();
				        }
	        		}
	        	}
	        }
        }
    }
}
