<?php
namespace App\Helpers;
use App\Classes\Cypher;

class Crypt {
	static function _responseFail($reason) {
		return self::_responseCryptData([
            'status' => false,
            'reason' => $reason,
        ]);
	}

	static function _responseData($data) {
		return self::_responseCryptData([
            'status' => true,
            'data' => $data,
        ]);
	}

	static function _requestCryptData($data) {
		$crypt = json_decode($data)->crypt;
		if( $crypt !== null ){
			$dataArray = self::_decryptArray($crypt);
			return $dataArray;
		}
	}

	static function _responseCryptData($data) {
		// return response()->json($data);
		$encrypted = self::_cryptArray($data);
		return json_encode([
            'crypt' => $encrypted,
        ]);
	}

	static function _decryptArray($string) {
		$cypher = new Cypher();
		$cypher->key = config('main.key');
		$tobinhash = pack('H*', $string);
		$decrypted = $cypher->decrypt($tobinhash);
		$dataArray = unserialize($decrypted);
		return $dataArray;
	}

	static function _cryptArray($data) {
		$cypher = new Cypher();
		$cypher->key = config('main.key');
		$serialise = serialize($data);
		$encrypted = bin2hex($cypher->encrypt($serialise));
		return $encrypted;
	}

	static function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}