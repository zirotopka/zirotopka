<?php

namespace App\Http\Controllers\Admin;

use App\Role;
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

		$roles = Role::get();
    	return view('admin.users.index', [
    		'users' => $users,
			'roles' => $roles,
			'placeholders' => [
				 'name' => '',
				 'email' => '',
				 'role' => ''
			 ]]);
    }

    public function show($id) {
    	$user = User::findOrFail($id);

    	return view('admin.users.show',['user' => $user]);
    }

    public function store(Request $request) {

    	$users = User::select();

		$fio = explode(' ', $request->input('name'));
		if ($fio) {

			$users->where('first_name', 'like', '%' . $fio[0] . '%');
			if (count($fio) > 1) {
				$users->where('surname', 'like', '%' . $fio[1] . '%');
			}
		}

		if ($request->input('email')) {
			$users->where('email', 'like', '%' . $request->input('email') . '%');
		}

		if ($request->input('role')) {
			$users->leftJoin('role_users', 'users.id', '=', 'role_users.user_id')->where('role_users.role_id', '=', $request->input('role'));
		}

		$users = $users->with('roles', 'current_program')->paginate(20);

		$roles = Role::get();
		return view('admin.users.index', [
			'users' => $users,
			'roles' => $roles,
			'placeholders' => [
				'name' => $request->input('name'),
				'email' => $request->input('email'),
				'role' => $request->input('role')
			]
		]);

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
