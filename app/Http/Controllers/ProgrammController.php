<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programm;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class ProgrammController extends Controller
{	

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
            $start_training_day = Carbon::parse( $request->get('program_date_input'), 'Europe/Moscow' );
            $now = Carbon::now('Europe/Moscow');

            $user->start_training_day = $start_training_day;
    		$user->current_programm_id = $program_id;

            if ( ($now->month == $start_training_day->month) && ($now->day == $start_training_day->day) ) {
                $user->current_day = $now->day;
            }

    		$user->save();

    		return redirect('lk/'.$user->id);
    	} else {
    		return back();
    	}
    }
}
