<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programm;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Helpers\IP;

use App\Mail\ProgramShipped;
use Mail;

class ProgrammController extends Controller
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

    public function index(Request $request, $slug){
        switch ($slug){
            case 'ROneStart' :
                $user = Sentinel::getUser();
                $referral = null;
                $programm = Programm::select([
                    'id',
                    'description',
                    'cost',
                    'slug',
                    'name',
                    'days',
                    'day_off',
                    'trainings',
                    'tasks'
                ])->where('slug','=',$slug)->first();

                if ($request->has('referral')) {
                    $referral = User::select('id','first_name','surname','slug')->where('slug','=',$request->get('referral'))->first();
                }

                $data = [
                    'user' => $user,
                    'referral' => $referral,
                    'slug' => $slug,
                    'program' => $programm,
                ];

                return view('programs.ronestart', $data);
            break;
            case "r.one_pro":                $programm = Programm::select([
                    'id',
                    'description',
                    'cost',
                    'slug',
                    'name',
                    'days',
                    'day_off',
                    'trainings',
                    'tasks'
                ])->where('slug','=',$slug)->first();
                $user = Sentinel::getUser();
                $referral = null;

                if ($request->has('referral')) {
                    $referral = User::select('id','first_name','surname','slug')->where('slug','=',$request->get('referral'))->first();
                }

                $data = [
                    'user' => $user,
                    'referral' => $referral,
                    'slug' => $slug,
                ];

                return view('programs.zaglush', $data);
            break;
            case "r.one_runner":
                $user = Sentinel::getUser();
                $referral = null;

                if ($request->has('referral')) {
                    $referral = User::select('id','first_name','surname','slug')->where('slug','=',$request->get('referral'))->first();
                }

                $data = [
                    'user' => $user,
                    'referral' => $referral,
                    'slug' => $slug,
                ];

                return view('programs.zaglush', $data);
            break;
            case "r.one_runner_plus":
                $user = Sentinel::getUser();
                $referral = null;

                if ($request->has('referral')) {
                    $referral = User::select('id','first_name','surname','slug')->where('slug','=',$request->get('referral'))->first();
                }

                $data = [
                    'user' => $user,
                    'referral' => $referral,
                    'slug' => $slug,
                ];

                return view('programs.zaglush', $data);
            break;
            case "r.one_power":
                $user = Sentinel::getUser();
                $referral = null;

                if ($request->has('referral')) {
                    $referral = User::select('id','first_name','surname','slug')->where('slug','=',$request->get('referral'))->first();
                }

                $data = [
                    'user' => $user,
                    'referral' => $referral,
                    'slug' => $slug,
                ];

                return view('programs.zaglush', $data);
            break;
        }
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
            $clientIp = $request->ip();
            $user->ip = $clientIp;

            //Сделать сохранение timezone
            $timezone = IP::get_client_timezone($clientIp);
            
            $start_training_day = Carbon::parse( $request->get('program_date_input'), $timezone );
            $start_date = Carbon::parse('2017-11-28',$timezone);

            if ($start_training_day->format('Y-m-d') < $start_date->format('Y-m-d')) {
                return redirect()->back()->withErrors(['error' => 'Начало прогаммы 28 октября']);
            }

    		$program_id = $request->get('program_id');

            $user->timezone = $timezone;
            $user->last_updated_at = Carbon::now($timezone);
            $user->user_ip = $_SERVER["REMOTE_ADDR"];
            $user->current_day = 1;

            
            $now = Carbon::now($timezone);
            // $tomorrow = clone $now;
            // $tomorrow->addDay();

            $user->sex = $request->get('sex');
            $user->start_training_day = $start_training_day;
    		$user->current_programm_id = $program_id;
            $user->last_updated_at = $now;

            if ( ($now->year > $start_training_day->year) || 
                 ($now->year == $start_training_day->year && $now->month > $start_training_day->month ) || 
                 ($now->year == $start_training_day->year && $now->month == $start_training_day->month && $now->day > $start_training_day->day) 
            ){
                return redirect()->back()->withErrors(['error' => 'Выбранная вами дата уже прошла']);
            }

            if ($now->month == $start_training_day->month && $now->day == $start_training_day->day && $now->hour >= 22){
                $user->program_is_start = 1;
            } 

            $subject = "Выбор программы";
            $text = 'Спасибо за выбор программы. Первая тренировка будет доступна вам '.$start_training_day->format('Y-m-d');

            $this->send_mail($user, $subject, $text);

            $user->save();

    		return redirect($user->slug);
    	} else {
            return redirect()->back()->withErrors(['error' => 'Пользователь отсутствует']);
    	}
    }

    public function send_mail($user, $subject, $text) {
        //$message = (new ProgramUpdating($user, $subject, $text))->onQueue('emails');
        try {
            Mail::to($user->email)->queue(new ProgramShipped($user, $subject, $text));
        } catch (Exception $e) {
            \Log::error($e->getMessages());
        }

        return 1;
    }
}
