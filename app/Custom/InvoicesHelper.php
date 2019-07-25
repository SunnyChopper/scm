<?php

namespace App\Custom;

use Illuminate\Http\Request;
use App\Invoice;

class InvoicesHelper {

	public static function isCustomer($client_id) {
		if (Invoice::where('client_id', $client_id)->where('status', 2)->count() > 0) {
			return true;
		} else {
			return false;
		}
	}

}

?>