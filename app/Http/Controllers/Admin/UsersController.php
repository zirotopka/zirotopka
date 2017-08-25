<?php

namespace App\Http\Controllers\Admin;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Activation;

use Validator;
use App\User;

use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{	
    public function index(Request $request) {
    	$users = User::select([
    		'id','email','first_name','last_name','surname',
    		'current_programm_id','status',
    	])->with('roles','current_program')->paginate(20);

    	return view('admin.users.index',['users' => $users]);
    }

    public function show($id) {
    	$user = User::findOrFail($id);

    	return view('admin.users.show',['user' => $user]);
    }

    public function destroy($id)
    {	
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(true);
    }

    public function change_status($id, Request $request)
    {	
    	$user = User::findOrFail($id);

    	if (!empty($user)) {
    		$user->status = $request->get('status');
    		$user->save();

    		return response()->json(true);
    	} else {
    		return response()->json(false);
    	}
    }
}