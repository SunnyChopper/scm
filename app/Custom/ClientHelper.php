<?php

namespace App\Custom;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Client;

class ClientHelper {

	public static function getCompanyName($client_id) {
		$client = Client::find($client_id);
		return $client->company_name;
	}

	public static function getFirstName($client_id) {
		$client = Client::find($client_id);
		return $client->first_name;
	}

	public static function getLastName($client_id) {
		$client = Client::find($client_id);
		return $client->last_name;
	}

	public static function getEmail($client_id) {
		$client = Client::find($client_id);
		return $client->email;
	}

	public static function isLoggedIn() {
		if (Session::has('client_logged_in')) {
            if (Session::get('client_logged_in') == true) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
	}

}

?>