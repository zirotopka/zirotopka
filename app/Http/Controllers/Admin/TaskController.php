<?php

namespace App\Http\Controllers\Admin;

use App\File;
use App\ProgrammExercive;
use App\ProgrammStage;
use App\ProgrammDay;
use App\Training;
use App\TrainingStages;
use App\User;
use App\Ban;
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

		$trainings = Training::where('is_moderator_check','=',0)->orderBy('created_at','desc')
									->with('user')->paginate(30);

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
		$training = Training::find($id);
		$user = $training->user;

		if (empty($training)) {
			\Log::info('Admin:TaskController:change_status - Тренировка не найдена. Id '.$id);
			return redirect()->back();
		}

		$training->status = $status;
		$training->is_moderator_check = 1;
		$training->save();

		if ($status == 1) {
			$subject = 'Поздравляем!';
            $text = 'Вы успешно выполнили все упражнения за '.$training->program_day.' день тренировки.';
		} else {
			$subject = 'Внимание!!';
            $text = 'За '.$training->program_day.' день ваша тренировка была отклонена тренером.';

            $userTimezone = User::getTimezone($user);
            $userNow = Carbon::now($userTimezone);

            \Log::info($userTimezone);
            \Log::info($userNow);

            $user->status = 0;
            $user->save();

            $this->addBan($user->id, $userNow);
		}

		$this->send_mail($user, $subject, $text);

		return redirect()->route('tasks');
	}

	public function addBan($userId, $userNow) {
        $bans = new Ban;
        $bans->created_at = $userNow;
        $bans->user_id = $userId;
        $bans->save();

        return 1;
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
            \Log::error($e);
        }

        return 1;
    }
}
