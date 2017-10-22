<?php

namespace App\Http\Controllers\Api;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;//Временно
use Illuminate\Http\Request;
use App\User;
use App\File;
use App\Training;
use App\TrainingStages;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use Validator;
use DB;

class PrivateOfficeApiController extends Controller
{   
    /**
     * Сохраняем информацию о тренировке
     * @return \Illuminate\Http\Response
     */
    public function store_training(Request $request)
    {
        //$user = $request->get('user');
        $user = Sentinel::getUser();
        $timezone = User::getTimezone($user );

        if (empty($user)) {
            return response()->json(['code' => 404, 'text' => 'User not found']);
        }

        $programm_stages = json_decode($request->get('programm_stages'));
        
        if (count($programm_stages) > 0) {
            $training = Training::where('program_day','=',$user->current_day)
                              ->where('user_id','=',$user->id)
                              ->with('stages')
                              ->first();

            if (empty($training)) {
                $training = new Training;
                $training->user_id = $user->id;
                $training->program_day = $user->current_day;
                $training->is_files_download = 1;

                $training->save();
            }

            $stages = $training->stages;
            $current_client_date = Carbon::now($timezone);//Нужно будет переделать на время по временной зоне

            foreach($programm_stages as $stage_key => $stage_url) {
                if (count($stage_url) <= 0) {
                    continue;
                }

                $thisStage = $stages->where('stage_id',$stage_key)->first();

                if (empty($thisStage)) {
                    $thisStage = new TrainingStages;
                    $thisStage->stage_id = $stage_key;
                    $thisStage->status = 0;
                    $thisStage->training_id = $training->id;
                    $thisStage->current_client_date = $current_client_date;
                    $thisStage->rating = 0;
                    $thisStage->save();
                }

                DB::beginTransaction();

                $thisStage->files()->delete();
                
                foreach ($stage_url as $file_url) {
                    $file_name = basename(public_path().$file_url);

                    $file = new File;
                    $file->file_url = '/trainings/'.$file_name;

                    if (file_exists(public_path().'/trainings/preview_'.$file_name)) {
                         $file->preview_url = '/trainings/preview_'.$file_name;
                    }

                    $mime_type = mime_content_type(public_path().$file_url);

                    if (in_array($mime_type,['image/jpeg','image/pjpeg','image/png'])) {
                        $file->file_type = 2; 
                    } elseif (in_array($mime_type,['video/mpeg,video/mp4,video/3gpp,video/3gpp2,video/x-flv,video/x-ms-wmv'])) {
                        $file->file_type = 3;
                    }

                    $file->owner_type = 'training_stages';
                    $file->owner_id = $thisStage->id;

                    $file->save();
                }
                DB::commit();
            }

            return response()->json(['code' => 200, 'text' => 'Training is saved']); 
        } else {
            return response()->json(['code' => 404, 'text' => 'Files not found']);
        }
    }
}
