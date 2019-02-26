<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index() {
    	$page_title = "Clients Login";

    	return view('clients.login')->with('page_title', $page_title);
    }

    public function login(Request $data) {
    	// TODO: Implement function
    }

    public function dashboard() {
    	$page_title = "Client Dashboard";

    	// TODO: Create function to protect client dashboard

    	return view('clients.dashboard')->with('page_title', $page_title);
    }
}
