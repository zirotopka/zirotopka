<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\User;

use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {	
        $user = Sentinel::getUser();
       	$data = [
    		'user' => $user,
    	];

    	return view('home.index', $data);
    }
}
