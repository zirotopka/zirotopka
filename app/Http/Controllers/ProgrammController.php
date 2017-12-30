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
        $user = Sentinel::getUser();
        $referral = null;

        if (session()->has('ref')) {
            $reverralSlug = $request->session()->get('ref');
            $referral = User::select('id','first_name','surname','slug')->where('slug','=',$reverralSlug)->first();
        }

        $program = Programm::where('slug','=',$slug)->first();

        switch ($slug){
            case 'r.one_start' :
                $template = 'ronestart';
                break;
            case 'r.one_lite' :
                $template = 'ronestart-lite';
                break;
            default:
                $template = 'zaglush';
        }

        $data = [
            'user' => $user,
            'referral' => $referral,
            'slug' => $slug,
            'program' => $program,
        ];
        
        return view('programs.'.$template, $data);
    }

    /**
     * получить программу
     */
    public function get_program(Request $request) {
        $program = Programm::select([
                'id',
                'description',
                'cost',
                'name',
                'logo',
                'lite',
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

            $program = Programm::select(['id','lite'])->where('id','=',$program_id)
                                ->first();

            if (empty($program)) {
                return redirect()->back()->withErrors(['error' => 'Данная программа не найдена']);
            }          

            $now = Carbon::now($timezone);         

            $user->timezone = $timezone;
            $user->last_updated_at = Carbon::now($timezone);
            $user->user_ip = $_SERVER["REMOTE_ADDR"];
            $user->current_day = 1;

            $user->sex = $request->get('sex');
            $user->start_training_day = $start_training_day;
            $user->current_programm_id = $program_id;
            $user->last_updated_at = $now;
            $user->status = 1;

            if ( ($now->year > $start_training_day->year) || 
                 ($now->year == $start_training_day->year && $now->month > $start_training_day->month ) || 
                 ($now->year == $start_training_day->year && $now->month == $start_training_day->month && $now->day > $start_training_day->day) 
            ){
                return redirect()->back()->withErrors(['error' => 'Выбранная вами дата уже прошла']);
            }

            switch ($program->lite) {
                case 1:
                    if ($now->month == $start_training_day->month && $now->day == $start_training_day->day){
                        $user->program_is_start = 1;
                    }
                    break;
                
                case 0:
                    if ($now->month == $start_training_day->month && $now->day == $start_training_day->day && $now->hour >= 22){
                        $user->program_is_start = 1;
                    }
                    break;
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
        Mail::to($user->email)->queue(new ProgramShipped($user, $subject, $text));

        return 1;
    }
}
