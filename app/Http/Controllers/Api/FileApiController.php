<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;//Временно

use Illuminate\Http\Request;

use App\File;

class FileApiController extends Controller
{	
	/**
	 * Сохраняем файл
	 */
    public function store_attachment(Request $request)
    {
        //$user = $request->get('user');
        $user = Sentinel::getUser();

        if (empty($user)) {
            return response()->json(['code' => 404, 'text' => 'User not found']);
        }

        // $type = $request->get('type');

        // if (empty($type) || !in_array($type, [1,2])) {
        //      return response()->json(['code' => 404, 'text' => 'Type not found']);
        // }

        // if ($type = 1) {
        //     return response()->json(['code' => 200, 'text' => 'Output mesages', 'data' => $user->output_messages]);
        // } else {
        //     return response()->json(['code' => 200, 'text' => 'Income mesages', 'data' => $user->income_messages]);
        // }

        // return response()->json(['code' => 501]);
    }
}
