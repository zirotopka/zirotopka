<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\User;
use App\Programm;
use App\ProgrammDay;
use App\ProgrammExercive;
use App\ProgrammStage;

use Carbon\Carbon;

class PrivatOfficeController extends Controller
{
    public function index($id)
    {		
    	$user = User::select([
    			'id',
    			'first_name',
    			'last_name',
    			'immunity_count',
                'current_programm_id',
                'current_day',
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
}
