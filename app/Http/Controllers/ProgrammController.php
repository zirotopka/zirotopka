<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programm;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Redirect;

class ProgrammController extends Controller
{	
	/**
	 * Выбор программы
	 */
    public function choice_program(Request $request) {
    	if ( $user = Sentinel::getUser() ) {
    		$program_id = $request->get('id');

    		$user->current_programm_id = $program_id;
    		$user->save();

    		return redirect('lk/'.$user->id);
    	} else {
    		return back();
    	}
    }
}
