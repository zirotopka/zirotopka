<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\User;

use Carbon\Carbon;

class PrivatOfficeController extends Controller
{
    public function index($id)
    {	
    	$user = User::select([
    			'id',
    			'first_name',
    			'last_name',
    			'immunity_count',
    		])
    		->where('id','=',$id)->with('balance')->first();

    	$data = [
    		'user' => $user,
    	];

    	return view('privat_office.index', $data);
    }
}
