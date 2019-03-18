<?php

namespace App\Custom;

use Illuminate\Http\Request;
use App\Revenue;

class RevenueHelper {

	public static function getRevenueForCurrentMonth() {
		$currentMonth = date('m');
		$revenue = Revenue::whereRaw('MONTH(created_at) = ?', [$currentMonth])->get();
		return $revenue;
	}

	public static function getTotalForCurrentMonth() {
		$currentMonth = date('m');
		$revenue = Revenue::whereRaw('MONTH(created_at) = ?', [$currentMonth])->get();
		$total = 0.00;
		foreach ($revenue as $r) {
			$total += $r->amount;
		}
		return $total;
	}

	public static function getRevenueForCurrentMonthForClient($client_id) {
		$currentMonth = date('m');
		$revenue = Revenue::where('client_id', $client_id)->whereRaw('MONTH(created_at) = ?', [$currentMonth])->get();
		return $revenue;
	}

	public static function getTotalForCurrentMonthForClient($client_id) {
		$currentMonth = date('m');
		$revenue = Revenue::where('client_id', $client_id)->whereRaw('MONTH(created_at) = ?', [$currentMonth])->get();
		$total = 0.00;
		foreach ($revenue as $r) {
			$total += $r->amount;
		}
		return $total;
	}

}

?>