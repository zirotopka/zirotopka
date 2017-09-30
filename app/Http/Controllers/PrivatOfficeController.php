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
use Validator;

use Carbon\Carbon;

class PrivatOfficeController extends Controller
{
    public function index($slug)
    {	
    	$user = Sentinel::getUser();

        //Выбор программы
        if ( empty($user->current_programm_id) ) {
            $programs = Programm::select('id','description','name')
                            ->get();

            return view('privat_office._partials._choose_program_form', ['user' => $user, 'programs' => $programs]);
        }

        //$currentProgramDayStatus = $user->current_program_day_status;

        //Оплата програм
        if (!empty($currentProgramDayStatus->status)) {
            if (!empty($user->current_programm_id) && empty($user->is_programm_pay)) {
                $sum = $user->current_program->cost;
                $parents = $user->parents;

                if (count($parents) > 0) {
                    $sum = $sum * 0.9;
                }

                $shopArticle = env('YANDEX_KASSA_PROGRAM_ID');

                return view('privat_office._partials._program_pay', ['user' => $user, 'sum' => $sum, 'shopArticle' => $shopArticle]);
            }
        }

        $current_program_day = 0;
        $programm_days = 0;
        $programm_stages = 0;

        if ( !empty($user->current_programm_id) ) {
            $programm_days = ProgrammDay::select('id','day','status','interest','lead_time', 'difficult','description')
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
                return ['response' => 200, 'data' => $exercive->videos->first()->file_url ];
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
                return back()->withErrors($validator)->withInput();
            }

            $user->phone = $request->get('phone');

            if ($request->get('year') && $request->get('month') && $request->get('day')) {
                try {
                    $birthday = Carbon::parse($request->get('year').'-'.$request->get('month').'-'.$request->get('day'));
                } catch (Exception $e) {
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

                $data = [
                  'user' => $user,
                ];

                return view('privat_office.lk_edit', $data);

            } catch (Exception $e) {
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

        return view('privat_office.balance', $data);
    }
}
