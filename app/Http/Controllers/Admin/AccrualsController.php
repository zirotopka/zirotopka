<?php

namespace App\Http\Controllers\Admin;

use App\AccrualType;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Activation;

use Validator;
use App\Accrual;
use App\User;

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

	/**
	 * Получаем список с выплатами
	 **/	
	public function get_payments() {
		$user = Sentinel::getUser();
		$role = $user->roles->first()->slug;

		if ($role == 'admin') {
			$newAccruals = Accrual::select([
									'users.id as user_id',
									'users.wallet as wallet',
									'accruals.id as accruals_id',
									'accruals.accruals_freezing as accruals_freezing',
									'accruals.type_id as type_id',
									'accruals.sum as sum',
									'accruals.comment as comment',
								])
								->leftJoin('users','accruals.user_id','=','users.id')
								->whereNotNull('users.wallet')
								->where('users.status','=',1)
								->where('users.is_programm_pay','=',1)
								->where('accruals_freezing','=',1)
								->where('type_id','=',2)
								->get();

			if (count($newAccruals) > 0) {
				$date = Carbon::now('Africa/Nairobi');
				$utc_date_now = $date->format('Y-m-d');
				\Log::info('Выгрузка выплат: '.$newAccruals);

				if (!file_exists(storage_path().'/payments/')){
					mkdir(storage_path().'/payments/', 0777, true);
				}

				$storage_path = storage_path().'/payments/'.$utc_date_now.'/';

				if (!file_exists($storage_path)) {
				   mkdir($storage_path, 0777, true);
				}

				$dom = new \domDocument("1.0", "utf-8");
				$domPayments = $dom->createElement("payments");
				$domPayments->setAttribute('xmlns','http://tempuri.org/ds.xsd');

				$dom->appendChild($domPayments);

				foreach ($newAccruals as $accrual) {
					$domPayment = $dom->createElement("payment");
					$domPayments->appendChild($domPayment);

					$domDestination = $dom->createElement("Destination");
					$domAmount = $dom->createElement("Amount");
					$domDescription = $dom->createElement("Description");
					$domId = $dom->createElement("Id");

					$domPayment->appendChild($domDestination);
					$domPayment->appendChild($domAmount);
					$domPayment->appendChild($domDescription);
					$domPayment->appendChild($domId);

					$domDestinationText = $dom->createTextNode($accrual->wallet);
					$domDestination->appendChild($domDestinationText);

					$domAmountText = $dom->createTextNode($accrual->sum);
					$domAmount->appendChild($domAmountText);

					$domDescriptionText = $dom->createTextNode($accrual->comment);
					$domDescription->appendChild($domDescriptionText);

					$domIdText = $dom->createTextNode('12345');
					$domId->appendChild($domIdText);
				}

				$file_path = $storage_path.'payments-'.md5(uniqid(mt_rand(),1)).'.xml';
				if ($dom->save($file_path)) {
					foreach ($newAccruals as $accrual) {
						$accrual->accruals_freezing = 0;
						$accrual->save();
					}

					header('Content-disposition: attachment; filename="payments.xml"');
					header('Content-type: "text/xml"; charset="utf8"');
					readfile($file_path);
				} else {
					\Log::warning('Ошибка сохранения файла');
					echo 'Ошибка сохранения файла';
				}
			}
		} else {
			\Log::warning('Вы не являетесь админом');
			echo 'Вы не являетесь админом';
		} 
	}
}

