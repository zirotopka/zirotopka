<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\User;
use App\Programm;
use App\ProgrammDay;
use App\ProgrammExercive;
use App\ProgrammStage;
use App\Balance;
use App\Accrual;
use App\Training;
use App\Ban;
use Validator;
use App\Jobs\BonusDistribution;

use Carbon\Carbon;

class PrivatOfficeController extends Controller
{   
    public $monthHuman = [
        1 => 'января',
        2 => 'февраля',
        3 => 'марта',
        4 => 'апреля',
        5 => 'мая',
        6 => 'июня',
        7 => 'июля',
        8 => 'августа',
        9 => 'сентября',
        10 => 'октября',
        11 => 'ноября',
        12 => 'декабря',
    ];
    public function index($slug)
    {	
    	$user = Sentinel::getUser();
        $userTimezone = User::getTimezone($user);
        $balance = $user->balance;

        $now = Carbon::now($userTimezone);
        $now_timestamp = $now->timestamp;

        if (empty($balance)) {
            return view('errors.error_balance');
        }

        //Конец программы
        if ( !empty($user->program_is_end) ) {
            return view('privat_office._partials._program_is_end', ['user' => $user]);
        }

        //Выбор программы
        if ( empty($user->current_programm_id) ) {
            $programs = Programm::select('id','description','name')
                            ->get();

            return view('privat_office._partials._choose_program_form', ['user' => $user, 'programs' => $programs]);
        }

        $current_program_day = ProgrammDay::select('id','day','status')
                                ->where('programm_id','=',$user->current_programm_id)
                                ->where('day','=',$user->current_day)
                                ->first();        
        $currentProgramDayStatus = $current_program_day->status;

        //Оплата програм
        if (!empty($currentProgramDayStatus) || $current_program_day->day > 2) {
            if (!empty($user->current_programm_id) && empty($user->is_programm_pay)) {
                $program_cost = $user->current_program->cost;
                $parents = $user->parents;

                if (count($parents) > 0) {
                    $program_cost = $program_cost * 0.9;
                }

                if (!empty($user->status)) {
                    $user->status = 0;
                    $user->save();
                } 

                //Проверяем наличие средств на балансе
                if ($balance->sum >= $program_cost) {
                    return view('privat_office._partials._program_pay', ['user' => $user, 'sum' => $program_cost]);
                } else {
                    $pay_description = 'Для приобритения програмы вам не хватает средств на балансе. Пополните, пожалуйста, баланс.';
                    $sum = $program_cost - $balance->sum;

                    return view('privat_office._partials._refer_money_pay', ['user' => $user, 'sum' => $sum,'pay_description' => $pay_description]);
                }
            }
        }

        //Проверка даты программы
        if (!empty($user->start_training_day) && empty($user->program_is_start)) {
            $start_training_day = Carbon::parse($user->start_training_day,$userTimezone);
            $start_training_day->subDay();
            $monthHuman = $this->monthHuman;
            
            return view('privat_office._partials._program_comming_soon', ['user' => $user, 'start_training_day' => $start_training_day, 'monthHuman' => $monthHuman]); 
        }
        
        //Блокировка програм
        if ($user->status == 0) {
            $immunity_cost = intval(env('IMMUNITY_COST'));

            return view('privat_office._partials._freezing', ['user' => $user]);
        }

        $current_program_day = 0;
        $programm_days = 0;
        $programm_stages = 0;

        if ( !empty($user->current_programm_id) ) {
            $programm_days = ProgrammDay::select('id','day','status','interest','lead_time', 'difficult','description', 'feed')
                                        ->where('programm_id','=',$user->current_programm_id)
                                        ->orderBy('day')->get();

            if (!empty($user->current_day)) {
                $current_program_day = $programm_days->where('day',$user->current_day)->first();

                if (!empty($current_program_day)) {
                    $programm_stages = ProgrammStage::select('id','exercise_id','status','description', 'repeat_count','time_exercive')
                                        ->where('programm_day_id','=',$current_program_day->id)
                                        ->with('exercive')
                                        ->get();

                }

                $current_training = Training::select(['id','user_id'])
                                        ->where('user_id','=',$user->id)
                                        ->where('program_day','=',$user->current_day)
                                        ->with('stages')
                                        ->first();
            }
        }

        $difficult_array = ProgrammDay::$difficult_array;

        $bans = Ban::select([
                        \DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as create_time'),
                    ])
                    ->where('user_id','=',$user->id)->pluck('create_time')->toArray();

    	$data = [
    		'user' => $user,
            'programm_days' => $programm_days,
            'difficult_array' => $difficult_array,
            'programm_stages' => $programm_stages,
            'current_program_day' => $current_program_day,
            'current_training' => $current_training,
            'bans' => $bans,
    	];

    	return view('privat_office.index', $data);
    }

    public function success_pay(Request $request) {
        $user = Sentinel::getUser();

       if (session()->has('first_pay_program')) {
            //Добавил вывод подтверждения
            session()->pull('first_pay_program');
            
            return view('privat_office.success_pay',['user' => $user]);
        } else {
            return redirect('/'.$user->slug);
        }
    }

	public function index_admin($id)
	{
		$user = User::where('id', $id)->first();

		//Выбор программы
		if ( empty($user->current_programm_id) ) {
			$programs = Programm::select('id','description','name')
				->get();

			return view('privat_office._partials._choose_program_form', ['user' => $user, 'programs' => $programs]);
		}

		//Оплата програм
		if (!empty($user->current_programm_id) && empty($user->is_programm_pay)) {
			$sum = $user->current_program->cost;

			return view('privat_office._partials._program_pay', ['user' => $user, 'sum' => $sum]);
		}

		$current_program_day = 0;
		$programm_days = 0;
		$programm_stages = 0;

		if ( !empty($user->current_programm_id) ) {
			$programm_days = ProgrammDay::select('id','day','status','interest','lead_time', 'difficult')
				->where('programm_id','=',$user->current_programm_id)
				->orderBy('day')->get();

			if (!empty($user->current_day)) {
				$current_program_day = $programm_days->whereStrict('day',$user->current_day)->first();

				if (!empty($current_program_day)) {
					$programm_stages = ProgrammStage::select('id','exercise_id','status','description', 'repeat_count','time_exercive')
						->where('programm_day_id','=',$current_program_day->id)
						->with('exercive')
						->get();
				}
			}
		}

		$difficult_array = ProgrammDay::$difficult_array;

		$data = [
			'user' => $user,
			'programm_days' => $programm_days,
			'difficult_array' => $difficult_array,
			'programm_stages' => $programm_stages,
			'current_program_day' => $current_program_day,
		];

		return view('privat_office.index', $data);
	}

    /**
     * Получаем видео по тренировке 
     */
    public function get_exercive_video(Request $request) {
        $exercive_id = $request->get('exercive_id');

        if ( !empty($exercive_id ) ) {
            $exercive = ProgrammExercive::where('id','=',$exercive_id)->select('id')
                                        ->with('videos')
                                        ->first();
            if ( !empty($exercive) && count( $exercive->videos ) > 0 ){
                return ['response' => 200, 'data' => env('APP_URL').$exercive->videos->first()->file_url ];
            } else {
                return ['response' => 500, 'data' => 'Не найден exercive']; 
            }
        } else {
             return ['response' => 500, 'data' => 'Не найден exercive_id']; 
        }
    }

    public function personal_data($slug){
        $user = Sentinel::getUser();

        $data = [
          'user' => $user,
        ];

        return view('privat_office.lk_edit', $data);
    }

    /**
     * Сохранить персональные данные клиента
     */
    public function personal_data_store($slug,Request $request){
        $user = Sentinel::getUser();
        if (!empty($user)) {
            $rules = [
            //     'year' => 'date_format:Y',
            //     'month' => 'date_format:m',
            //     'day' => 'date_format:d',
                'pasport_date' => 'date_format:Y-m-d|nullable',
                'growth' => 'numeric|nullable',
                'weight' => 'numeric|nullable',
                'pasport_number' => 'numeric|nullable',
            ];
            $messages = [
            //     'year.date_format' => 'Введите год рождения',
            //     'month.date_format' => 'Введите месяц рождения',
            //     'day.date_format' => 'Введите день рождения',
                'pasport_date.date_format' => 'Поле дата выдачи должно быть корректной формы',
                'growth.numeric' => 'Рост указан неверно',
                'weight.numeric' => 'Вес указан неверно',
                'pasport_number.numeric' => 'Номер паспорта указан неверно',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            $user->phone = $request->get('phone');

            if ($request->get('year') && $request->get('month') && $request->get('day')) {
                try {
                    $birthday = Carbon::parse($request->get('year').'-'.$request->get('month').'-'.$request->get('day'));
                } catch (\Exception $e) {
                    $birthday = null;
                }
            } else {
                $birthday = null;
            }

            $user->birthday = $birthday;
            $user->growth = $request->get('growth');
            $user->weight = $request->get('weight');
            $user->pasport_name = $request->get('pasport_name');
            $user->pasport_number = $request->get('pasport_number');
            $user->pasport_series = $request->get('pasport_series');
            $user->surname = $request->get('surname');
            $user->first_name = $request->get('name');
            $user->wallet = $request->get('wallet');

            $slug = User::getSlug($user->first_name, $user->last_name, $user->surname, $user->id);
            $user->slug = $slug;

            if ($request->has('pasport_date')) {
                $user->pasport_date = Carbon::parse($request->get('pasport_date'))->timestamp;
            } else {
                $user->pasport_date = null;
            }

            $user->pasport_issued = $request->get('pasport_issued');
            $user->city = $request->get('city');

            try {
                $user->save();

                return redirect('/'.$user->slug.'/edit');

            } catch (\Exception $e) {
                return redirect()->back()->withErrors($e->getMessages());
            }
        }

        return redirect()->back()->withErrors();
    }

    public function faq($slug){
        $user = Sentinel::getUser();

        $accruals = Accrual::select([
                'id',
                'sum',
                'comment',
                'created_at',
                'type_id',
            ])->where('user_id','=',$user->id)
            ->orderBy('created_at','desc')
            ->with('type')
            ->paginate(10);

        $data = [
            'user' => $user,
            'accruals' => $accruals,
        ];

        return view('FAQ.FAQ', $data);
    }

        public function balance($slug){
        $user = Sentinel::getUser();
        $balance = $user->balance;

        if (empty($balance)) {
            return view('errors.error_balance');
        }

        $accruals = Accrual::select([
                'id',
                'sum',
                'comment',
                'created_at',
                'accruals_freezing',
                'type_id',
            ])->where('user_id','=',$user->id)
            ->orderBy('created_at','desc')
            ->with('type')
            ->paginate(10);

        $data = [
            'user' => $user,
            'accruals' => $accruals,
            'balance' => $balance,
        ];

        return view('privat_office.balance', $data);
    }


    /**
     * Покупка програмы
     * @return \Illuminate\Http\Response
     */
    public function payProduct($type, Request $request)
    {   
        $user = User::select([
                'id',
                'status',
                'current_programm_id',
                'is_programm_pay',
                'slug',
            ])->where('id','=',$request->get('user_id'))
            ->first();

        $balance = $user->balance;

        if (empty($balance)) {
            return view('errors.error_balance');
        }

        if ($type == 1) {
            //Програма
            $program = $user->current_program;

            if (empty($program)) {
                return redirect()->back()->withErrors(['error' => 'Не выбрана програма']);
            }

            $sum = $user->current_program->cost;
            $parents = $user->parents;

            if (count($parents) > 0) {
                $sum = $sum * 0.9;
            }
            $accrualDescription = 'Покупка программы '.$program->name;
        } elseif ($type == 2) {
            //immunitet
            $sum = env('IMMUNITY_COST');
            $accrualDescription = 'Покупка иммунитета';
        } else {
            return redirect()->back()->withErrors(['error' => 'Тип платежа неизвестен']);
        }

        if ($balance->sum >= $sum) {
            $balance->sum = $balance->sum - $sum;
            $balance->save();

            if ($type == 1) {
                //Програма
                $user->is_programm_pay = 1;
                BonusDistribution::dispatch($user->id);
            }

            $user->status = 1;
            $user->save();

            $accruals = new Accrual;
            $accruals->sum = $sum;
            $accruals->user_id = $user->id;
            $accruals->type_id = 2;
            $accruals->balance_id = $balance->id;
            $accruals->comment = $accrualDescription;

            $accruals->save();

            if ($type == 1) {
                //Програма
                session()->set('first_pay_program',1);
                return redirect('/privat_office/success_pay');
            } elseif ($type == 2) {
                return redirect('/'.$user->slug);
            }
        } else {
            return redirect()->back()->withErrors(['error' => 'Не счету недостаточно средств']);
        }
    }

    /**
     * Вывод средств
     * 
     * @return \Illuminate\Http\Response
     */
    public function withdrawalFunds($user_id, Request $request)
    {   
        $user = Sentinel::getUser();
        $balance = $user->balance;

        if ($user->id != $user_id) {
            return redirect()->back()->withErrors(['error' => 'Ваш id не совпадает с id вывода средств. Обратитесь в поддержку']);
        }

        if (empty($user->is_programm_pay) || empty($user->status)) {
            return redirect()->back()->withErrors(['error' => 'Ваш аккаунт заморожен или не куплена програма']);
        }

        if (empty($balance)) {
            return view('errors.error_balance');
        }

        $withdrawal_sum = $request->get('withdrawal_sum');

        if ($withdrawal_sum == 0) {
            return redirect()->back()->withErrors(['error' => 'Вывод нулевого значения запрещен']);
        }

        if ($withdrawal_sum > $balance->sum) {
            return redirect()->back()->withErrors(['error' => 'У вас недостаточно средств']);
        }

        $balance->sum = $balance->sum - $withdrawal_sum;
        $balance->save();


        $accruals = new Accrual;
        $accruals->sum = $withdrawal_sum;
        $accruals->user_id = $user->id;
        $accruals->type_id = 2;
        $accruals->balance_id = $balance->id;
        $accruals->comment = 'Вывод средств c личного счета';
        $accruals->accruals_freezing = 1;

        $accruals->save();

        return redirect('/'.$user->slug.'/balance');
    }

    /**
     * Покупка иммунитета
     * @return type
     */
    public function immunity_count($slug) {
        $user = Sentinel::getUser();
        $balance = $user->balance;

        if (empty($balance)) {
            return view('errors.error_balance');
        }

        $immunity_cost = intval(env('IMMUNITY_COST'));

        if ($balance->sum >= $immunity_cost) {
            return view('privat_office._partials._immunity', ['user' => $user]);
        } else {
            $pay_description = 'Для приобритения иммунитета вам не хватает средств на балансе. Пополните, пожалуйста, баланс.';
            $sum = $immunity_cost - $balance->sum;

            return view('privat_office._partials._refer_money_pay', ['user' => $user, 'sum' => $sum,'pay_description' => $pay_description]);
        }
    }

    //Покупка иммунитета
    public function immunity_post_count($user_id, Request $request) {
        $user = Sentinel::getUser();

        if (empty($user) || ($user->id != $user_id)) {
             return redirect()->back()->withErrors(['error' => 'Пользователь не найден']);
        }

        $balance = $user->balance;

        if (empty($balance)) {
            return view('errors.error_balance');
        }

        $immunity_count = $request->get('immunity_count');

        if ($immunity_count <= 0) {
            return redirect()->back()->withErrors(['error' => 'Выберите количество иммунитетов']);
        }

        $immunity_cost = intval(env('IMMUNITY_COST'));
        $full_cost = $immunity_cost * $immunity_count;

        if ($balance->sum >= $full_cost) {
            $user->immunity_count = $user->immunity_count + $immunity_count;
            $user->save();

            $balance->sum = $balance->sum - $full_cost;
            $balance->save();

            $accruals = new Accrual;
            $accruals->sum = $full_cost;
            $accruals->user_id = $user->id;
            $accruals->type_id = 2;
            $accruals->balance_id = $balance->id;
            $accruals->comment = 'Покупка иммунитетов в размере '.$immunity_count.' шт.';

            $accruals->save();

            return redirect('/'.$user->slug.'/balance');
        } else {
            $pay_description = 'Для приобритения иммунитетов вам не хватает средств на балансе. Пополните, пожалуйста, баланс.';
            $sum = $full_cost - $balance->sum;

            return view('privat_office._partials._refer_money_pay', ['user' => $user, 'sum' => $sum,'pay_description' => $pay_description]);
        }
    }

    //Испольщование иммунитета
    public function useImmunity ($user_id, Request $request) {
        $user = Sentinel::getUser();

        if (empty($user) || ($user->id != $user_id)) {
             return redirect()->back()->withErrors(['error' => 'Пользователь не найден']);
        }

        if (empty($user->immunity_count)) {
            return redirect()->back()->withErrors(['error' => 'У вас нет иммунитетов']);
        }

        $user->immunity_count = $user->immunity_count - 1;
        $user->status = 1;
        $user->save();

        \Log::info('Пользователь №'.$user->id.' использовал иммунитет.');

        return redirect('/'.$user->slug);
    }

    //Начало новой програмы
    public function start_new_program (Request $request) {
        $user = Sentinel::getUser();

        if ($user->current_day == 28 && $user->program_is_end == 1) {
            $user->current_day = null;
            $user->status = 1;
            $user->is_programm_pay = 0;
            $user->program_is_start = 0;
            $user->start_training_day = null;
            $user->current_programm_id = null;
            $user->program_is_end = 0;

            $user->save();
        }

        return redirect('/'.$user->slug);
    }
}
