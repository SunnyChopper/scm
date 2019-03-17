<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\AdminHelper;

use App\Client;

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

    public function view_clients() {
        $clients = Client::where('is_active', '>', 0)->get();
        $page_title = "Clients";

        return view('admin.clients.view')->with('clients', $clients)->with('page_title', $page_title);
    }

    public function new_client() {
        $page_title = "Create New Client";

        return view('admin.clients.new')->with('page_title', $page_title);
    }

    public function create_client(Request $data) {
        $client = new Client;
        $client->first_name = $data->first_name;
        $client->last_name = $data->last_name;
        $client->email = $data->email;
        $client->company_name = $data->company_name;
        $client->is_active = 2;
        $client->save();

        return redirect(url('/admin/clients'));
    }

    public function edit_client($client_id) {
        $client = Client::find($client_id);
        $page_title = "Edit " . $client->company_name;

        return view('admin.clients.edit')->with('client', $client)->with('page_title', $page_title);
    }

    public function update_client(Request $data) {
        $client = Client::find($data->client_id);
        $client->first_name = $data->first_name;
        $client->last_name = $data->last_name;
        $client->email = $data->email;
        $client->company_name = $data->company_name;
        $client->save();

        return redirect(url('/admin/clients'));
    }
}
