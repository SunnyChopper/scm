<?php

namespace App\Custom;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Client;

class ClientHelper {

	public static function getID() {
		return Session::get('client_id');
	}

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

	public static function guest() {
		if (Session::has('client_id')) {
			if (Session::get('client_id') != null) {
				return false;
			} else {
				return true;
			}
        } else {
            return true;
        }
	}

	public static function isLoggedIn() {
		if (Session::has('client_id')) {
            return true;
        } else {
            return false;
        }
	}

}

?>