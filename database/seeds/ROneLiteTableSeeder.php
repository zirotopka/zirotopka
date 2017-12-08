<?php

use Illuminate\Database\Seeder;

use App\Programm;
use App\ProgrammDay;
use App\ProgrammExercive;
use App\ProgrammStage;
use App\File;

class ROneLiteTableSeeder extends Seeder
{	
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	$programm = Programm::where('slug','=','r.one_lite')->first();

        if ( $programm->save() ) {
    		$programm_id = $programm->id;

    		$programm_days_array = [
    			['day' => 1, 'status' => 1, 'description' => '1-й день программы тренировок задействует все основные мышцы в организме и сегодня контрольный тест – все упражнения делаете по максимуму, сколько сможете.
Перед выполнением всех упражнений сразу или по отдельности рекомендуется сделать общую разминку, а после окончания выполнения тренировки – растяжку.', 'feed' => 'Начинаем неспешно , но продуктивно!) Кушаем в первый день маленькими порциями, стараемся есть больше белка (яйца, творог, сыр). Обедаем и ужинаем очень легко. Из мяса желательно кролик, курица или рыба. От гарнира желательно отказаться, заменить растительным белком (зелёная фасоль, бобовые). Перекусываем после тренировки молочным коктейлем или орехами.','interest' => 1, 'difficult' => 2, 'lead_time' => '< 20 мин', 'stages' => [
					['description' => 'Приседания на месте', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => 'максимум','status' => 1, 'exercise_id' => 2],
					['description' => 'Планка классическая стойка на предплечьях', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => 'максимум', 'status' => 1, 'exercise_id' => 5],
					['description' => 'Стульчик у опоры', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => 'максимум', 'status' => 1, 'exercise_id' => 23],
					['description' => 'Отжимание от пола', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => 'максимум', 'status' => 1, 'exercise_id' => 17],
				]],
				['day' => 2, 'status' => 0, 'description' => 'Вспомогательная тренировка для укрепления всего организма. Развивается общая выносливость и помощь в ускорении обмена веществ. Каждое упражнение выполняется в течение 1 минуты.', 'feed' => 'Перед тренировкой, за час - скушайте кусок чёрного зернового хлеба с чаем/водой. Это даст вас углеводный запас и энергию для Старта!) После тренировки (через мин 15)  желательно выпить молочный коктейль/фрукт или же выпить свежевыжатый сок . Все это пополнит запас гликогена быстро и безвредно для фигуры', 'lead_time' => '< 20 мин','interest' => 0, 'difficult' => 1, 'stages' => [
					['description' => 'Крабик', 'interest' => 1, 'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему.', 'repeat_count' => '1 круг','status' => 0, 'exercise_id' => 22],
					['description' => 'Перекрестное движение рук к ногам', 'interest' => 1, 'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему.', 'repeat_count' => '1 круг', 'status' => 0, 'exercise_id' => 18],
					['description' => 'Выпрыгивание вверх, хлопок над головой', 'interest' => 1, 'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему.', 'repeat_count' => '1 круг', 'status' => 0, 'exercise_id' => 25],
					['description' => 'Планка классическая', 'interest' => 1, 'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему.', 'repeat_count' => '1 круг', 'status' => 0, 'exercise_id' => 5],
				]],
				['day' => 3, 'status' => 0, 'description' => 'Выходной', 'feed' => 'Даём мышцам отдых и восстанавливаем баланс полиненасыщенных жиров. Добавляем в еду ягоды/орехи. Больше томатов. И стараемся воздержаться от ужина в этот день.', 'lead_time' => '','interest' => 0, 'difficult' => 0, 'stages' => []],
				['day' => 4, 'status' => 1, 'description' => 'Тренировка направлена на укрепление мышц ног и пресса.', 'feed' => 'Нагрузка на ноги, поэтому больше пьём воды! Перед тренировкой за час выпить стакан чёрного кофе или крепкий зелёный чай. После тренировки хорошо будет перекусить творогом (не жирный 5%) с 2-3 ч ложками мёда.', 'lead_time' => '< 20 мин','interest' => 0, 'difficult' => 1, 'stages' => [
					['description' => 'Выпады назад на месте', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 10 повторений','status' => 0, 'exercise_id' => 1],
					['description' => 'Разножка на месте', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 10 повторений', 'status' => 0, 'exercise_id' => 24],
					['description' => 'Стульчик у опоры', 'interest' => 1, 'time_exercive' => '1 минута', 'repeat_count' => '2 подхода * 1 минута', 'status' => 0, 'exercise_id' => 23],
					['description' => 'Подъем ног лежа', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 10 повторений', 'status' => 0, 'exercise_id' => 7],
				]],
				['day' => 5, 'status' => 0, 'description' => 'Выходной', 'feed' => 'Отдыхаем. В обед/ужин лучше всего красное мясо или бобовые/соя. Прием пищи 4 раза в день, НО маленькими порциями.  Кто хочет набрать мышечную массу, то 3 раза в день, стандартными порциями.', 'lead_time' => '','interest' => 0, 'difficult' => 0, 'stages' => []],
				['day' => 6, 'status' => 1, 'description' => 'Более глубокая проработка мышечной ткани и хороший жиросжигательный эффект!', 'feed' => 'Помним! Жир горит с 20 минуты! Тренируемся умеренно, но продолжительно. Увеличиваем количество белка ДО и ПОСЛЕ тренировки. Исключаем в этот день сладкое полностью. Желательно отказаться от гарнира в пользу зелени.', 'lead_time' => '< 40 мин','interest' => 1, 'difficult' => 2, 'stages' => [
					['description' => 'Легкий бег или хаотичные прыжки в сторону', 'interest' => 1, 'time_exercive' => '10 минут бег или 100 прыжков', 'repeat_count' => '','status' => 0, 'exercise_id' => null],
					['description' => 'Присед + различные махи в стороны', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 10 повторений', 'status' => 1, 'exercise_id' => 26],
					['description' => 'Скалолаз', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 10 повторений', 'status' => 1, 'exercise_id' => 15],
					['description' => 'Альпинист', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 10 повторений', 'status' => 1, 'exercise_id' => 19],
				]],
				['day' => 7, 'status' => 1, 'description' => 'Легкое повышение нагрузки на организм, переход на следующую ступень', 'feed' => 'Перед тренировкой, за час - скушайте кусок чёрного зернового хлеба с чаем/водой. Это даст вас углеводный запас и энергию для Старта!) После тренировки (через мин 15)  желательно выпить молочный коктейль/фрукт или же выпить свежевыжатый сок. Пополняем запасы гликогена в мышцах и даём витаминчиков.', 'lead_time' => '< 30 мин','interest' => 0, 'difficult' => 2, 'stages' => [
					['description' => 'Приседания на месте', 'interest' => 1, 'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему.', 'repeat_count' => 'Всего 1 круга','status' => 0, 'exercise_id' => 2],
					['description' => 'Боковая планка', 'interest' => 1,  'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему.', 'repeat_count' => 'Всего 1 круг', 'status' => 0, 'exercise_id' => 4],
					['description' => 'Упор лежа: вставание на локти и обратно', 'interest' => 1,  'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему.', 'repeat_count' => 'Всего 1 круг', 'status' => 0, 'exercise_id' => 20],
					['description' => 'Выпрыгивание вверх , хлопок над головой', 'interest' => 1,  'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему.', 'repeat_count' => 'Всего 1 круг', 'status' => 0, 'exercise_id' => 25],
				]],
				['day' => 8, 'status' => 0, 'description' => 'Выходной', 'feed' => '««Важно не то, насколько усердно вы тренируетесь, а насколько полноценно вы отдыхаете». В этот день исключаем углеводы и животные жиры. Кушаем белок и растительные жиры (орехи/арахис/семена льна/вишня).».', 'lead_time' => '','interest' => 0, 'difficult' => 0, 'stages' => []],
				['day' => 9, 'status' => 1, 'description' => 'Тренировка направлена на укрепление верхнего плечевого пояса и мышц пресса.', 'feed' => 'Животик должен быть плоским! Утром - стакан кефира/киселя. После тренировки еще один стакан кефира. Кушаем 3 раза в день и уходим с чувством "голода". Тратим ненужные отложения. На ночь - снова стакан кефира.', 'lead_time' => '< 40 мин','interest' => 1, 'difficult' => 2, 'stages' => [
					['description' => 'Легкий бег', 'interest' => 1, 'time_exercive' => '10 минут', 'repeat_count' => '','status' => 0, 'exercise_id' => null],
					['description' => 'Отжимание от пола', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 15 повторений', 'status' => 1, 'exercise_id' => 17],
					['description' => 'Упор лежа с перекрестным движением рук к плечу', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 20 повторений', 'status' => 1, 'exercise_id' => 21],
					['description' => 'Ножницы', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 20 повторений', 'status' => 1, 'exercise_id' => 11],
				]],
				['day' => 10, 'status' => 1, 'description' => '10-й день тренировки помогает поддерживать общий тонус ваших мышц', 'feed' => 'Увеличиваем количество животного белка, особенно мясо/птица. Гарнира не более 2 столовых ложек на порцию.', 'lead_time' => '< 30 мин','interest' => 0, 'difficult' => 2, 'stages' => [
					['description' => 'Прыжки на скакалке', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '100 прыжков','status' => 1, 'exercise_id' => 27],
					['description' => 'Разножка на месте', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 30 повторений', 'status' => 1, 'exercise_id' => 24],
					['description' => 'Присед + выпад назад', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 30 повторений', 'status' => 1, 'exercise_id' => 14],
					['description' => 'Стульчик у опоры', 'interest' => 1, 'time_exercive' => '1 минута', 'repeat_count' => '', 'status' => 1, 'exercise_id' => 23],
				]],

				['day' => 11, 'status' => 0, 'description' => 'Выходной', 'feed' => 'Отдыхаем. Пьём много воды в этот день. Исключаем мясо, едим гарнир (кроме картофеля)  и зелень.', 'lead_time' => '','interest' => 0, 'difficult' => 0, 'stages' => []],
				['day' => 12, 'status' => 1, 'description' => '12-й день тренировки помогает поддерживать общий тонус ваших мышц', 'feed' => 'Питаемся в привычном режиме. Но исключаем животные жиры. На ночь хорошо будет маложирный творог с фруктами.', 'lead_time' => '< 40 мин','interest' => 0, 'difficult' => 1, 'stages' => [
					['description' => 'Легкий бег', 'interest' => 1, 'time_exercive' => '10 минут', 'repeat_count' => '','status' => 0, 'exercise_id' => null],
					['description' => 'Прыжки на скакалке', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '100 раз', 'status' => 1, 'exercise_id' => 27],
					['description' => 'Перекрестное движение рук к ногам', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 20 повторений', 'status' => 1, 'exercise_id' => 18],
					['description' => 'Подъем корпуса вперед', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 20 повторений', 'status' => 1, 'exercise_id' => 6],
				]],
				['day' => 13, 'status' => 1, 'description' => 'Сегодняшний день тренировки заметно покажет, насколько вы преуспели в своем развитии', 'feed' => 'Наступает тот момент, когда тело привыкает к нагрузкам и ему требует больше белков и углеводов для полноценных тренировок и восстановления после. Кушаем больше мясных и рыбных продуктов сочетая их с гарниром/овощами. Предпочтения отдаём нежирным сортам рыбы. Добавляем в рацион отруби/орехи/ягоды.', 'lead_time' => '< 40 мин','interest' => 1, 'difficult' => 3, 'stages' => [
					['description' => 'Книжка', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '50 повторений, отдых 10-15 сек, переход к следующему. Всего 1 круг.','status' => 1, 'exercise_id' => 10],
					['description' => 'Присед + различные махи в стороны', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '50 повторений, отдых 10-15 сек, переход к следующему. Всего 1 круг.', 'status' => 1, 'exercise_id' => 26],
					['description' => 'Упор лежа: вставание на локти и обратно', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '50 повторений, отдых 10-15 сек, переход к следующему. Всего 1 круг.', 'status' => 1, 'exercise_id' => 20],
					['description' => 'Планка', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '50 повторений, отдых 10-15 сек, переход к следующему. Всего 1 круг.', 'status' => 1, 'exercise_id' => 5],
				]],
				['day' => 14, 'status' => 0, 'description' => 'Выходной', 'feed' => 'Делаем небольшой разгрузочных день! Утром и на ночь стакан нежирного кефира. А в течении дня лёгкую белковую пищу. Хорошо будет авокадо с сыром/оливковым маслом с различными гарнирами.', 'lead_time' => '','interest' => 0, 'difficult' => 0, 'stages' => []],
				['day' => 15, 'status' => 1, 'description' => 'Глубокая проработка мышц ног', 'feed' => 'Предстоит побегать!) Значит ДО тренировки - лёгкий завтрак /перекус. Крепкий зелёный чай/чёрный кофе или нежирный творог. После - восполняем потраченные запасы. Питьевой йогурт без добавок будет идеален.', 'lead_time' => '< 40 мин','interest' => 1, 'difficult' => 2, 'stages' => [
					['description' => 'Легкий бег', 'interest' => 1, 'time_exercive' => '20 минут', 'repeat_count' => '','status' => 0, 'exercise_id' => null],
					['description' => 'Приседания на месте', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 20 повторений', 'status' => 1, 'exercise_id' => 2],
					['description' => 'Выпрыгивание вверх, хлопок над головой', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 15 повторений', 'status' => 1, 'exercise_id' => 25],
					['description' => 'Выпады назад крест-накрест', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 15 повторений', 'status' => 1, 'exercise_id' => 3],
				]],
				['day' => 16, 'status' => 1, 'description' => 'Укрепление всех мышечных групп организма', 'feed' => 'Не забываем про полезные углеводы! Добавляем в рацион кукурузу/картофель. В течение дня - хорошо будет чай с мёдом.', 'lead_time' => '< 30 мин','interest' => 0, 'difficult' => 2, 'stages' => [
					['description' => 'Крабик', 'interest' => 1, 'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему.', 'repeat_count' => 'Всего 2 круга.','status' => 1, 'exercise_id' => 22],
					['description' => 'Перекрестное движение рук к ногам', 'interest' => 1, 'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему.', 'repeat_count' => 'Всего 2 круга.', 'status' => 1, 'exercise_id' => 18],
					['description' => 'Выпрыгивание вверх, хлопок над головой', 'interest' => 1, 'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему.', 'repeat_count' => 'Всего 2 круга.', 'status' => 1, 'exercise_id' => 25],
					['description' => 'Планка', 'interest' => 1, 'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему.', 'repeat_count' => 'Всего 2 круга.', 'status' => 1, 'exercise_id' => 5],
				]],
				['day' => 17, 'status' => 0, 'description' => 'Выходной', 'feed' => 'Снова переходим на завтрак и обед (то есть от ужина постараться отказаться). Из гарнира - любые виды бобовых в сочетании с нежирной индейкой/уткой/курицей.', 'lead_time' => '','interest' => 0, 'difficult' => 0, 'stages' => []],
				['day' => 18, 'status' => 1, 'description' => 'Поддержание мышечного тонуса ног', 'feed' => 'Перед тренировкой за 30-40 мин съедаем кусок чёрного зернового хлеба или хлебец с чаем. После - восполняем баланс белков творогом с фруктами. Питаемся в привычном Вам режиме.', 'lead_time' => '< 40 мин','interest' => 0, 'difficult' => 3, 'stages' => [
					['description' => 'Выпады назад на месте', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 15 повторений','status' => 1, 'exercise_id' => 1],
					['description' => 'Разножка на месте', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 20 повторений', 'status' => 1, 'exercise_id' => 24],
					['description' => 'Стульчик у опоры', 'interest' => 1, 'time_exercive' => '1,5 минуты', 'repeat_count' => '3 подхода * 0,5 минуты', 'status' => 1, 'exercise_id' => 23],
					['description' => 'Подъем ног лежа', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '3 подхода * 15 повторений', 'status' => 1, 'exercise_id' => 7],
				]],
				['day' => 19, 'status' => 1, 'description' => 'Продолжаем развивать вашу двигательную активность', 'feed' => 'Не забываем про воду! От 2 литров в день. Стараемся легко поужинать, чтобы сохранить тонус и прорисовку мышц. Добавляем в рацион гречку.', 'lead_time' => '< 40 мин','interest' => 2, 'difficult' => 1, 'stages' => [
					['description' => 'Скручивание на полу', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 15 повторений','status' => 1, 'exercise_id' => 8],
					['description' => 'Отжимания от пола', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 15 повторений', 'status' => 1, 'exercise_id' => 17],
					['description' => 'Приседания на месте', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 30 повторений', 'status' => 1, 'exercise_id' => 2],
					['description' => 'Джампинг Джек', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 20 повторений', 'status' => 1, 'exercise_id' => 16],
				]],
				['day' => 20, 'status' => 0, 'description' => 'Выходной', 'feed' => 'Даём послабления!) НО до середины дня ~ 15.00. Допускаются любые слабости)', 'lead_time' => '','interest' => 0, 'difficult' => 0, 'stages' => []],

				['day' => 21, 'status' => 1, 'description' => 'Общая тренировка и хорошая проработка рук и мышц кора', 'feed' => 'Утром сразу стакан кефира. После тренировки - снова. Это поможет правильно "распределить" съеденное накануне. В течении дня хорошо будет выпить ещё 1-2 раза кефир. Едим сухие гарниры с нежирным мясом. Желательно исключить яйца. Допускается съесть кусок чёрного хлеба или хлебец.', 'lead_time' => '< 40 мин','interest' => 1, 'difficult' => 2, 'stages' => [
					['description' => 'Легкий бег', 'interest' => 1, 'time_exercive' => '10 минут', 'repeat_count' => '','status' => 0, 'exercise_id' => null],
					['description' => 'Отжимания от пола', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 30 повторений', 'status' => 1, 'exercise_id' => 17],
					['description' => 'Гиперэкстензия', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 20 повторений', 'status' => 1, 'exercise_id' => 29],
					['description' => 'Ножницы ', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 20 повторений', 'status' => 1, 'exercise_id' => 11],
				]],
				['day' => 22, 'status' => 1, 'description' => 'Тренировка на выносливость', 'feed' => 'Предстоит интенсивная тренировка! Для этого необходима лёгкость! Завтракаем хлебцем с сыром. После тренировки - чай/кофе/вода. Через час-1,5 кусок телятины/кролика/курицы с гречкой. ', 'lead_time' => '< 50 мин','interest' => 0, 'difficult' => 3, 'stages' => [
					['description' => 'Приседания на месте', 'interest' => 1, 'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему.', 'repeat_count' => 'Всего 2 круга.','status' => 1, 'exercise_id' => 2],
					['description' => 'Боковая планка', 'interest' => 1, 'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему.', 'repeat_count' => 'Всего 2 круга.', 'status' => 1, 'exercise_id' => 4],
					['description' => 'Упор лежа: вставание на локти и обратно', 'interest' => 1, 'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему.', 'repeat_count' => 'Всего 2 круга.', 'status' => 1, 'exercise_id' => 20],
					['description' => 'Выпрыгивание вверх, хлопок над головой ', 'interest' => 1, 'time_exercive' => '1 минута, отдых 10-15 сек, переход к следующему.', 'repeat_count' => 'Всего 2 круга.', 'status' => 1, 'exercise_id' => 25],
				]],
				['day' => 23, 'status' => 0, 'description' => 'Выходной', 'feed' => 'Отдыхаем и душой и телом! Стараемся есть лёгкие углеводы/растительные белки и жиры. Больше едим орехов/ягод/фруктов.', 'lead_time' => '','interest' => 0, 'difficult' => 0, 'stages' => []],
				['day' => 24, 'status' => 1, 'description' => 'Поддержание мышечного тонуса ног', 'feed' => 'Перед интенсивными тренировками не пьём много воды. Перед - кушаем фрукт (лучше яблоко/груша/клубника) и закрепляем молочным белковым напитком, предпочтение отдаём сывороточному (не больше 1/2 стакана).', 'lead_time' => '< 40 мин','interest' => 0, 'difficult' => 2, 'stages' => [
					['description' => 'Прыжки на скакалке', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '100 прыжков','status' => 1, 'exercise_id' => 27],
					['description' => 'Разножка на месте', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 30 повторений', 'status' => 1, 'exercise_id' => 24],
					['description' => 'Присед + выпад назад', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 30 повторений', 'status' => 1, 'exercise_id' => 14],
					['description' => 'Скалолаз ', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 30 повторений', 'status' => 1, 'exercise_id' => 15],
				]],
				['day' => 25, 'status' => 1, 'description' => 'Хорошая проработка мышц пресса ног и рук', 'feed' => 'Нагрузка будет на пресс, значит не стоит "сильно" завтракать перед тренировкой. Предпочтение отдаём фруктам или авокадо. В течение дня стараемся не есть большими порциями. Едим в привычном Вам рационе. ', 'lead_time' => '< 40 мин','interest' => 1, 'difficult' => 2, 'stages' => [
					['description' => 'Прыжки на скакалке', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '150 прыжков','status' => 1, 'exercise_id' => 27],
					['description' => 'Скручивание на полу', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 30 повторений', 'status' => 1, 'exercise_id' => 8],
					['description' => 'Отжимания от пола', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 30 повторений', 'status' => 1, 'exercise_id' => 17],
					['description' => 'Приседания на месте ', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 80 повторений', 'status' => 1, 'exercise_id' => 2],
				]],
				['day' => 26, 'status' => 0, 'description' => 'Выходной', 'feed' => 'Пополняем запасы белка! Утром и вечером хорошо будет маложирный творог со сметаной и орехами. Из мяса предпочтение говядина/баранина.', 'lead_time' => '','interest' => 0, 'difficult' => 0, 'stages' => []],
				['day' => 27, 'status' => 1, 'description' => 'Общая тренировка и хорошая проработка ног и мышц кора', 'feed' => 'Нужно подсушиться! Снова переходим только на завтрак и обед. Из гарнира - любые виды бобовых в сочетании с нежирной индейкой/уткой/курицей. У кого есть возможность - желательно отказаться в этот день от мяса полностью. Добавляем свёклу в рацион.', 'lead_time' => '< 40 мин','interest' => 0, 'difficult' => 2, 'stages' => [
					['description' => 'Прыжки на скакалке', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '200 прыжков','status' => 1, 'exercise_id' => 27],
					['description' => 'Присед + выпад назад', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 30 повторений', 'status' => 1, 'exercise_id' => 14],
					['description' => 'Скалолаз', 'interest' => 1, 'time_exercive' => '', 'repeat_count' => '2 подхода * 20 повторений', 'status' => 1, 'exercise_id' => 15],
					['description' => 'Стульчик у опоры ', 'interest' => 1, 'time_exercive' => '2 минуты', 'repeat_count' => '1 подход', 'status' => 1, 'exercise_id' => 23],
				]],
				['day' => 28, 'status' => 1, 'description' => 'Финальный день твоей программы тренировок и сегодня контрольный тест (постарайся вспомнить результаты контрольного теста в 1-й день и сравни с сегодняшними результатами)', 'feed' => 'Продолжаем сушиться! Также не ужинаем (или ужинаем, но только творогом или питьевым йогуртом). Пьём воду/чай/кофе. Едим вкусные гарниры из круп и овощей. Снова желательно добавлять свёклу в обед. И проверяем результаты!', 'lead_time' => '< 60 мин','interest' => 1, 'difficult' => 3, 'stages' => [
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
	        	$programm_day->feed = $programm_day_row['feed'];
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
