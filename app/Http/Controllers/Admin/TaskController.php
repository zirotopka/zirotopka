<?php

namespace App\Http\Controllers\Admin;

use App\File;
use App\ProgrammExercive;
use App\ProgrammStage;
use App\ProgrammDay;
use App\Training;
use App\TrainingStages;
use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

use App\Mail\ProgramShipped;
use Mail;

class TaskController extends Controller {

	public function index(Request $request)
	{	
		$now = Carbon::now('Africa/Nairobi');
		$now->subDays(3);
		$now_format = $now->format('Y-m-d');

		$trainings = Training::whereDate('created_at','>=',$now_format)->orderBy('created_at','desc')
							->orderBy('is_moderator_check')->with('user')->paginate(30);

		return view('admin.tasks.index', [
			'trainings'    => $trainings,
			'placeholders' => [
				'name' => ''
			]
		]);
	}

	public function post_index(Request $request)
	{
		$trainings = Training::select();

		$fio = explode(' ', $request->input('name'));
		if ($fio) {

			$trainings->leftJoin('users', 'users.id', '=', 'trainings.user_id');
			$trainings->where('users.first_name', 'like', '%' . $fio[0] . '%');

			if (count($fio) > 1) {
				$trainings->where('users.surname', 'like', '%' . $fio[1] . '%');
			}
		}

		$trainings = $trainings->orderBy('is_moderator_check')->paginate(30);

		return view('admin.tasks.index', [
			'trainings'    => $trainings,
			'placeholders' => [
				'name' => $request->input('name')
			]
		]);
	}

	public function change_status($id, $status, Request $request)
	{
		$trainingStage = TrainingStages::find($id);

		if (!empty($trainingStage)) {
			$trainingStage->status = $status;
			$trainingStage->save();

			$training = $trainingStage->training;

			if (!empty($training)) {
				$training->is_moderator_check = 1;
				$training->save();

				$status_text = 'Отправлено';

				switch ($status) {
                case 0:
                    $status_text = 'Отправлено';
                    break;
                case 1:
                    $status_text = 'На доработке';
                    break;
                case 2:
                    $status_text = 'Одобрено';
                    break;
                case 3:
                    $status_text = 'Отклонено';
                    break;
                }

                $stage = ProgrammStage::select('id','exercise_id')->where('id','=',$trainingStage->stage_id)->with('exercive')->first();
                $user = $training->user;

                if (!empty($stage) && !empty($stage->exercive) && !empty($user)) {
                	$current_program_day = ProgrammDay::select('id','day','status')
                                                    ->where('programm_id','=',$user->current_programm_id)
                                                    ->where('day','=',$training->program_day)
                                                    ->first();    

                    if (!empty($current_program_day)) {

                    	$programm_stages_count = ProgrammStage::select('id','status')
                                                                ->where('programm_day_id','=',$current_program_day->id)
                                                                ->with('exercive')
                                                                ->count();
                        $trainingStages = $training->stages;

                        if ($programm_stages_count == count($trainingStages)) {

                        	$handler = 1;

                        	foreach ($trainingStages as $localTrainingStage) {
                        		if ($localTrainingStage->status != 2) {
                        			$handler = 0;
                        		}
                        	}

                        	if ($handler == 1) {
                        		$subject = 'Ваша тренировка проверена!';
					            $text = 'Упражнение "'.$stage->exercive->name.'" проверено модератором и переведено в статус "'.$status_text.'".';

					            $this->send_mail($user, $subject, $text);
                        	}
                        } 
                    }   
                }
			}
		}
		
		return redirect()->route('tasks');
	}

	public function change_rating($id, $rating, Request $request)
	{
		$trainingStage = TrainingStages::select('id','rating','training_id')
				->where('id','=',$id)->first();

		$trainingStage->rating = $rating;
		$trainingStage->save();

		$training = $trainingStage->training;

		if (!empty($training)) {
			$user = $training->user;

			if (!empty($user)) {
				$user->second_rating = $user->second_rating + $rating;
				$user->save();
			}
		}

		return redirect()->route('tasks');
	}

	public function task($id, Request $request)
	{
		$training_stage = TrainingStages::find($id);
		$stage = ProgrammStage::find($training_stage->stage_id);
		$exercise = ProgrammExercive::find($stage->exercise_id);

		$files = $training_stage->files;

		return view('admin.tasks.task', [
			'files'    => $files,
			'training_stage' => $training_stage,
			'stage' => $stage,
			'exercise' => $exercise
		]);
	}

	public function send_mail($user, $subject, $text) {
		try {
        	Mail::to($user->email)->queue(new ProgramShipped($user, $subject, $text));
        } catch (\Exception $e) {
            \Log::error($e->getMessages());
        }

        return 1;
    }
}
