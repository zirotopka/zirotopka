<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;//Временно

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

use App\File;
use Validator;

class FileApiController extends Controller
{	
	/**
	 * Сохраняем файл
	 */
    public function store_attachment(Request $request)
    {   
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', 0);
        
        if ($request->hasFile('file'))
        {   
        	// $rules = [
	        //     'file' => 'mimes:jpeg,pjpeg,png,mpeg,mp4,3gpp,3gpp2,x-flv,x-ms-wmv,mov,mpg,swf',
	        // ];
	        // $messages = [
	        //     'file.mimes' => 'Некоректный тип файла',
	        // ];
            //'video/mpeg,video/mp4,video/3gpp,video/3gpp2,video/x-flv,video/x-ms-wmv,video/mov,video/mpg,video/swf','video/webm','video/ogg'

	        // $validator = Validator::make($request->all(), $rules, $messages);

	        // if ($validator->fails()) {
	        //     return response()->json(['code' => 400, 'text' => 'Некоректный тип файла']);
	        // }
	       	//$user = $request->get('user');
	        $user = Sentinel::getUser();

	        if (empty($user)) {
	            return response()->json(['code' => 404, 'text' => 'User not found']);
	        }

            $file = $request->file('file');

            $size = $file->getclientSize(); 

            if ($size > 170857600) {
                return response()->json(['code' => 404, 'text' => 'Файл не должен превышать 100 мб']);
            }

            $fileName = time() . '-' . $file->getClientOriginalName();
            $destinationPath = public_path().$request->get('destinationPath');
            $file->move($destinationPath, $fileName);

            $url = $destinationPath.$fileName;

            $mime_type = mime_content_type($url);

            \Log::info($mime_type);

            if (in_array($mime_type,['image/jpeg','image/pjpeg','image/png'])) {
            	$preview_url = $request->get('destinationPath').'preview_'.$fileName;
            	$preview_full_url = public_path().$preview_url;

            	$image = Image::make($url)->resize(56, 50);
	            $image->save($preview_full_url);

            } else {
            	$preview_url = '/ico/video-default.png';
            }

            return response()->json(['code' => 200, 'file_url' => $request->get('destinationPath').$fileName, 'type' => $mime_type, 'preview' => $preview_url, 'file_name' => $fileName ]);
        } else {
            return response()->json(['code' => 404, 'text' => 'File not found']);
        }
    }
}
