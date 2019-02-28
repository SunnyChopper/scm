<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

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

    public function create_client(Request $data) {
        // Create the client
        $client = new Client;
        $client->first_name = $data->first_name;
        $client->last_name = $data->last_name;
        $client->email = $data->email;
        $client->password = $data->password;
        $client->company_name = $data->company_name;

        if (isset($data->logo_url)) {
            $client->logo_url = $data->logo_url;
        }
    }

    public function update_client(Request $data) {
        // Update the client
        $client = Client::where('id', $data->client_id)->get();
        $client->first_name = $data->first_name;
        $client->last_name = $data->last_name;
        $client->email = $data->email;
        $client->password = $data->password;
        $client->company_name = $data->company_name;

        if (isset($data->logo_url)) {
            $client->logo_url = $data->logo_url;
        }
    }

}
