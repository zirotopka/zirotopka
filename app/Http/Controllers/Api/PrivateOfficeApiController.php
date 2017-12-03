<?php

namespace App\Http\Controllers\Api;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;//Временно
use Illuminate\Http\Request;
use App\User;
use App\File;
use App\ProgrammStage;
use App\ProgrammDay;
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

        $programm_stages = (array) json_decode($request->get('programm_stages'));
        $programm_stages_count = count($programm_stages);

        $left_exercises = 0;
        $stages_count = 0;
        
        if ($programm_stages_count > 0) {
            $current_program_day = ProgrammDay::select('id','day','status')
                                                ->where('programm_id','=',$user->current_programm_id)
                                                ->where('day','=',$user->current_day)
                                                ->first();

            if (empty($current_program_day)) {
                return response()->json(['code' => 404, 'text' => 'Отсутствует день. Обратитесь в поддержку']);
            }

            $stages = ProgrammStage::select('id','status')
                                ->where('programm_day_id','=',$current_program_day->id)
                                ->with('exercive')
                                ->get();

            $stages_count = count($stages);

            if ($stages_count > $programm_stages_count) {
                return response()->json(['code' => 404, 'text' => 'Не все упражнения выполнены. Необходимо '.$stages_count.'. Выполнено '.$programm_stages_count]);
            } 

            $training = Training::where('program_day','=',$user->current_day)
                              ->where('user_id','=',$user->id)
                              ->with('stages')
                              ->delete();

            $training = new Training;
            $training->user_id = $user->id;
            $training->program_day = $user->current_day;
            $training->is_files_download = 1;
            $training->created_at = Carbon::now($timezone);

            if (!$training->save()) {
                return response()->json(['code' => 404, 'text' => 'Тренировка не сохранена. Обратитесь в поддержку']);
            }

            $current_client_date = Carbon::now($timezone);//Нужно будет переделать на время по временной зоне

            foreach($programm_stages as $stage_key => $stage_file) {
                $thisStage = new TrainingStages;
                $thisStage->stage_id = $stage_key;
                $thisStage->status = 0;
                $thisStage->training_id = $training->id;
                $thisStage->current_client_date = $current_client_date;
                $thisStage->rating = 0;
                $thisStage->created_at = Carbon::now($timezone);
                $thisStage->save();

                $file_name = basename(public_path().$stage_file);
                    
                $file = new File;
                $file->file_url = '/trainings/'.$user->slug.'/'.$file_name;
                
                if (file_exists(public_path().'/trainings/'.$user->slug.'/preview_'.$file_name)) {
                     $file->preview_url = '/trainings/'.$user->slug.'/preview_'.$file_name;
                } else {
                    \Log::error('PrivateOfficeApiController:store_training file not found. Name '.$file_name);

                    continue;
                }

                $mime_type = mime_content_type(public_path().$stage_file);

                if (in_array($mime_type,['image/jpeg','image/pjpeg','image/png'])) {
                    $file->file_type = 2; 
                } elseif (in_array($mime_type,['video/mpeg,video/mp4,video/3gpp,video/3gpp2,video/x-flv,video/x-ms-wmv,video/mov,video/mpg,video/swf'])) {
                    $file->file_type = 3;
                }

                $file->owner_type = 'training_stages';
                $file->owner_id = $thisStage->id;

                $file->save();
            }

            return response()->json(['code' => 200, 'text' => 'Программа успешно загружена. Выполните оставшиесь задания.']);  
        } else {
            return response()->json(['code' => 404, 'text' => 'Файлы отсутствуют']);
        }
    }
}
