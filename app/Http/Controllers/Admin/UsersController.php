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
    	return view('admin.users.index');
    }
}
