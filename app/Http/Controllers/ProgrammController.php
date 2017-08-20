<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programm;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class ProgrammController extends Controller
{	

    public function index(Request $request){
    $user = Sentinel::getUser();
        $referral = null;

        if ($request->has('referral')) {
            $referral = User::select('id','first_name','surname','referer_code')->where('referer_code','=',$request->get('referral'))->first();
        }

        $data = [
            'user' => $user,
            'referral' => $referral,
        ];

        return view('programs.ronestart', $data);
    }


    /**
     * получить программу
     */
    public function get_program(Request $request) {
        $program = Programm::select([
                'id',
                'description',
                'cost',
                'name'
            ])->where('id','=',$request->get('id'))
            ->first();

        return $program;
    }
	/**
	 * Выбор программы
	 */
    public function choice_program(Request $request) {
        $user = Sentinel::getUser();

    	if ( !empty($user) ) {   
    		$program_id = $request->get('program_id');
            $start_training_day = Carbon::parse( $request->get('program_date_input'), 'Africa/Nairobi' );
            $now = Carbon::now('Africa/Nairobi');
 
            $user->start_training_day = $start_training_day;
    		$user->current_programm_id = $program_id;
            $user->current_day = 0;

            if ( ($now->month <= $start_training_day->month) && ($now->day <= $start_training_day->day) ) {
                $user->current_day = 1;
            } elseif ( ($now->year > $start_training_day->year) && ($now->month > $start_training_day->month ) && ($now->day > $start_training_day->day )){
                dd('Выбранная вами дата уже прошла');
                return back(); //Выбрана старая дата
            }

    		$user->save();

    		return redirect('lk/'.$user->id);
    	} else {
            dd('Пользователь отсутствует');
    		return back();
    	}
    }
}
