<?php

namespace App\Http\Controllers\Admin;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index() {
    	$user = Sentinel::getUser();

    	$data = [
    		'user' => $user,
    	];

    	return view('admin.home.index', $data);
    }
}
