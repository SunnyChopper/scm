<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\AdminHelper;

class AdminController extends Controller
{
    public function login(Request $data) {
    	if (AdminHelper::login($data) == true) {
    		return redirect(url('/admin/dashboard'));
    	} else {
    		return redirect()->back()->with('error', 'Username or password is incorrect.');
    	}
    }

    public function register(Request $data) {
    	if (AdminHelper::register($data) == true) {
    		return redirect(url('/admin/dashboard'));
    	} else {
    		return redirect()->back()->with('error', 'Username already taken.');
    	}
    }

    public function login_screen() {
    	$page_title = "Admin Login";

    	return view('admin.login')->with('page_title', $page_title);
    }

    public function dashboard() {
    	if (AdminHelper::isLoggedIn() != true) {
    		return redirect(url('/admin/login'));
    	}

    	$page_title = "Admin Dashboard";

    	return view('admin.dashboard')->with('page_title', $page_title);
    }
}
