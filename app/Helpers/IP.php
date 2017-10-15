<?php

namespace App\Helpers;

use App\Helpers\Curl;

class IP
{	
	public static function get_client_timezone($ip) {
	    $response_json = Curl::request('http://ip-api.com/json/'.$ip.'?lang=ru');
	    $response = json_decode($response_json);

	    $timezone = 'Africa/Nairobi';

	    if (!empty($response) && !empty($response->status) && ($response->status == 'success')) {
	    	$timezone = $response->timezone;
	    }

	    return $timezone;
	}
}
