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
        if ($request->hasFile('file'))
        {   
        	$rules = [
	            'file' => 'mimes:jpeg,pjpeg,png,mpeg,mp4,3gpp,3gpp2,x-flv,x-ms-wmv',
	        ];
	        $messages = [
	            'file.mimes' => 'Incorrect mimetypes',
	        ];

	        $validator = Validator::make($request->all(), $rules, $messages);

	        if ($validator->fails()) {
	            return response()->json(['code' => 400, 'text' => 'Incorrect mimetypes']);
	        }
	       	//$user = $request->get('user');
	        $user = Sentinel::getUser();

	        if (empty($user)) {
	            return response()->json(['code' => 404, 'text' => 'User not found']);
	        }

            $file = $request->file('file');

            $fileName = time() . '-' . $file->getClientOriginalName();
            $destinationPath = $request->get('destinationPath');
            $file->move($destinationPath, $fileName);

            $url = $destinationPath.$fileName;

            $mime_type = mime_content_type($url);

            if (in_array($mime_type,['image/jpeg','image/pjpeg','image/png'])) {
            	$preview_url = $request->get('destinationPath').'preview_'.$fileName;
            	$preview_full_url = public_path().$preview_url;

            	$image = Image::make($url)->resize(56, 50);
	            $image->save($preview_full_url);

            } else {
            	$preview_url = '/ico/video-default.png';
            }

            return response()->json(['code' => 200, 'file_url' => $url, 'type' => $mime_type, 'preview' => $preview_url, 'file_name' => $fileName ]);
        } else {
            return response()->json(['code' => 404, 'text' => 'File not found']);
        }
    }
}
