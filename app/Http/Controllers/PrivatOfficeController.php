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

use Carbon\Carbon;

class PrivatOfficeController extends Controller
{
    public function index($id)
    {		
    	$user = User::select([
    			'id',
    			'first_name',
    			'surname',
    			'immunity_count',
                'current_programm_id',
                'current_day',
                'user_ava_url',

    		])
    		->where('id','=',$id)->with('balance')->first();

        $programs = Programm::select('id','description','name')
                            ->get();

        if ( !empty($user->current_programm_id) ) {
            $programm_days = ProgrammDay::select('id','day','status','lead_time', 'difficult')
                                        ->where('programm_id','=',$user->current_programm_id)
                                        ->orderBy('day')->get();

            $programm_stages = ProgrammStage::select('id','exercise_id','status','description', 'repeat_count','time_exercive')
                                        ->where('programm_day_id','=',$user->current_programm_id)
                                        ->with('exercive')
                                        ->get();
        } else {
            $programm_days = 0;
            $programm_stages = 0;
        }

        $difficult_array = ProgrammDay::$difficult_array;

    	$data = [
    		'user' => $user,
            'programm_days' => $programm_days,
            'difficult_array' => $difficult_array,
            'programm_stages' => $programm_stages,
            'programs' => $programs,
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

    public function personal_data($id){
        $user = User::select([
                'id',
                'first_name',
                'last_name',
                'surname',
                'immunity_count',
                'current_programm_id',
                'current_day',
                'phone',
                'user_ava_url',
                'birthday',
                'pasport_kem_vidan',
                'pasport_data_vidachi',
                'pasport_series',
                'pasport_number',
                'weight',
                'growth'
            ])
            ->where('id','=',$id)->with('balance')->first();
        $data = [
          'user' => $user,
        ];
        return view('privat_office.lk_edit', $data);
    }

    public function balance($id){
        $user = User::select([
                'id',
                'first_name',
                'surname',
                'immunity_count'
            ])
            ->where('id','=',$id)->with('balance')
            ->first();

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
    public function messages($id){
        $user = User::select([
                'id',
                'first_name',
                'surname',
                'immunity_count'
            ])
            ->where('id','=',$id)->with('balance')
            ->first();

            $data = [
                'user' => $user,
            ];
        return view('privat_office.messages', $data);
    }
}
