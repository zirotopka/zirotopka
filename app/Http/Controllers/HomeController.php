<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\User;

use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(Request $request)
    {	
        $user = Sentinel::getUser();
        $referral = null;

        if ($request->has('referral')) {
        	$referral = User::select('id','first_name','surname','referer_code')->where('referer_code','=',$request->get('referral'))->first();
        }

       	$data = [
    		'user' => $user,
    		'referral' => $referral,
    	];

    	return view('home.index', $data);
    }
}
