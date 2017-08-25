<?php

namespace App\Http\Controllers\Admin;

use App\AccrualType;
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
    	$accruals = Accrual::orderBy('created_at','desc')->paginate(30);
		$types = AccrualType::get();

    	return view('admin.accruals.index', [
    		'accruals' => $accruals,
			'types' => $types,
			'placeholders' => [
				'name' => '',
				'type' => ''
			]
		]);
    }

	public function store(Request $request) {

		$accruals = Accrual::select();

		$fio = explode(' ', $request->input('name'));
		if ($fio) {

			$accruals->leftJoin('users', 'users.id', '=', 'accruals.user_id');
			$accruals->where('first_name', 'like', '%' . $fio[0] . '%');
			if (count($fio) > 1) {
				$accruals->where('surname', 'like', '%' . $fio[1] . '%');
			}
		}

		if ($request->input('type')) {
			$accruals->where('type_id', '=', $request->input('type'));
		}

		$accruals = $accruals->paginate(20);

		$types = AccrualType::get();
		return view('admin.accruals.index', [
			'accruals' => $accruals,
			'types' => $types,
			'placeholders' => [
				'name' => $request->input('name'),
				'type' => $request->input('type')
			]
		]);

	}

}
