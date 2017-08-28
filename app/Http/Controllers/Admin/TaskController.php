<?php

namespace App\Http\Controllers\Admin;

use App\File;
use App\ProgrammExercive;
use App\ProgrammStage;
use App\Training;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller {

	public function index(Request $request)
	{
		$trainings = Training::orderBy('created_at', 'desc')->paginate(30);

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
			$trainings->where('first_name', 'like', '%' . $fio[0] . '%');

			if (count($fio) > 1) {
				$trainings->where('surname', 'like', '%' . $fio[1] . '%');
			}
		}

		$trainings = $trainings->paginate(30);

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
		$training->is_moderator_check = $status;
		$training->save();

		return redirect()->route('tasks');
	}

	public function task($id, Request $request)
	{
		$training = Training::find($id);
		$stage = ProgrammStage::find($training->programm_stage_id);
		$exercise = ProgrammExercive::find($stage->exercise_id);

		$files = File::where('owner_id', '=', $id)->where('owner_type', '=', 'training')->get();

		return view('admin.tasks.task', [
			'files'    => $files,
			'training' => $training,
			'stage' => $stage,
			'exercise' => $exercise
		]);
	}
}
