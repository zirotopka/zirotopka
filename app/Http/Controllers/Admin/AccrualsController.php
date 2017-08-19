<?php

namespace App\Http\Controllers\Admin;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Activation;

use Validator;
use App\Accrual;

use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccrualsController extends Controller
{	
    public function index(Request $request) {
    	$accruals = Accrual::select([
    		'id','sum','comment','created_at'
    	])->with('type','user')->orderBy('created_at','desc')->paginate(30);

    	return view('admin.accruals.index',['accruals' => $accruals]);
    }
}
