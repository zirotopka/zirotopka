<?php
namespace App\Helpers;
use App\YandexModel as YandexModel;

class Yandex {
	public static function send_payments($user_id, $sum, $contract = '', $test = false) {
		$clientOrder = new YandexModel;

		if ($clientOrder->save()) {
			$clientOrderId = $clientOrder->id;

			if ($test) {
				$dstAccount = env('YANDEX_TEST_CASH');
				$file_path = self::_get_test_xml_path($dstAccount, $sum, $clientOrderId);
			} else {
				$dstAccount = env('YANDEX_TEST_CASH'); //под вопросом пока
				$file_path = self::_get_prod_xml_path($dstAccount, $sum, $clientOrderId);
			}

			return ['response' => 200, 'text' => $file_path];
		} else {
			return ['response' => 500, 'text' => 'App/Yandex not save'];
		}
	}

	protected static function _get_test_xml_path($dstAccount, $sum, $clientOrderId, $contract = '') {
		if (!file_exists(storage_path().'/yandex/')){
			mkdir(storage_path().'/yandex/', 0777, true);
		}

		$date = date('Y-m-d');

		$storage_path = storage_path().'/yandex/'.$date.'/';

		if (!file_exists($storage_path)) {
		   mkdir($storage_path, 0777, true);
		}

		$now =  new \DateTime();

		$dom = new \domDocument("1.0", "utf-8");
		$testDepositionRequest = $dom->createElement("testDepositionRequest");
		$testDepositionRequest->setAttribute('agentId', env('YANDEX_AGENT_ID'));
		$testDepositionRequest->setAttribute('dstAccount', $dstAccount);
		$testDepositionRequest->setAttribute('clientOrderId', $clientOrderId);
		$testDepositionRequest->setAttribute('requestDT', $now->format('Y-m-d H:i:s'));
		$testDepositionRequest->setAttribute('amount', $sum);
		$testDepositionRequest->setAttribute('currency', 10643);
		$testDepositionRequest->setAttribute('contract', $contract);
		$dom->appendChild($testDepositionRequest);
		
		$file_path = $storage_path.'testDepositionRequest_'.md5(uniqid(mt_rand(),1)).'.xml';
		$dom->save($file_path);

		return $file_path;
	}

	protected static function _get_prod_xml_path($dstAccount, $sum, $clientOrderId, $contract = '') {
		if (!file_exists(storage_path().'/yandex/')){
			mkdir(storage_path().'/yandex/', 0777, true);
		}

		$date = date('Y-m-d');

		$storage_path = storage_path().'/yandex/'.$date.'/';

		if (!file_exists($storage_path)) {
		   mkdir($storage_path, 0777, true);
		}

		$now =  new \DateTime();

		$dom = new \domDocument("1.0", "utf-8");
		$testDepositionRequest = $dom->createElement("testDepositionRequest");
		$testDepositionRequest->setAttribute('agentId', env('YANDEX_AGENT_ID'));
		$testDepositionRequest->setAttribute('dstAccount', $dstAccount);
		$testDepositionRequest->setAttribute('clientOrderId', $clientOrderId);
		$testDepositionRequest->setAttribute('requestDT', $now->format('Y-m-d H:i:s'));
		$testDepositionRequest->setAttribute('amount', $sum);
		$testDepositionRequest->setAttribute('currency', 643);
		$testDepositionRequest->setAttribute('contract', $contract);
		$dom->appendChild($testDepositionRequest);
		
		$file_path = $storage_path.'testDepositionRequest_'.md5(uniqid(mt_rand(),1)).'.xml';
		$dom->save($file_path);

		return $file_path;
	}

}