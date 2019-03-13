<?php

namespace App\Custom;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin;

class AdminHelper {

	private $id;

	public function __construct($id = 0) {
		$this->id = $id;
	}

	public static function isLoggedIn() {
		if (Session::has('admin_logged_in')) {
			if (Session::get('admin_logged_in') == true) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public static function register(Request $data) {
		if (Admin::where('username', strtolower($data->username))->count() == 0) {
			$admin = new Admin;
			$admin->first_name = $data->first_name;
			$admin->last_name = $data->last_name;
			$admin->email = $data->email;
			$admin->username = strtolower($data->username);
			$admin->password = Hash::make($data->password);
			$admin->save();

			return true;
		} else {
			return false;
		}
	}

	public static function login(Request $data) {
		if (Admin::where('username', strtolower($data->username))->count() > 0) {
			$admin = Admin::where('username', strtolower($data->username))->get();
			if (Hash::check($data->password, $admin->password)) {
				$this->saveLogin();
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public static function logout() {
		$this->saveLogout();
	}

	private function saveLogin($id) {
		Session::put('admin_logged_in', true);
		Session::put('admin_id', $id);
		Session::save();
	}

	private function saveLogout() {
		Session::forget('admin_logged_in');
		Session::forget('admin_id');
		Session::save();
	}
}

?>