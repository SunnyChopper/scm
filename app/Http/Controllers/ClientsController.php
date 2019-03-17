<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Client;

class ClientsController extends Controller
{
    public function index() {
    	$page_title = "Client Login";

    	return view('clients.login')->with('page_title', $page_title);
    }

    public function login(Request $data) {
    	if (Client::where('email', strtowlower($email))->count() > 0) {
            $client = Client::where('email', strtolower($email))->get();
            if (Hash::check($data->password, $client->password)) {
                Session::put('client_id', $client->id);
                Session::put('client_logged_in', true);
                Session::save();
                return redirect(url('/clients/dashboard'));
            } else {
                return redirect()->back()->with('error', 'Password is incorrect.');
            }
        } else {
            return redirect()->back()->with('error', 'Email not associated to any account.');
        }
    }

    public function logout() {
        Session::forget('client_id');
        Session::forget('client_logged_in');
        Session::save();
        return redirect(url('/'));
    }

    public function dashboard() {
    	$page_title = "Client Dashboard";

    	// if ($this->is_client_logged_in() == false) {
     //        return redirect(url('/clients'));
     //    }

    	return view('clients.dashboard')->with('page_title', $page_title);
    }

    public function register_client(Request $data) {
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

        $client->save();
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

        $client->save();
    }

    public function delete_client(Request $data) {
        // Delete the client
        $client = Client::where('id', $data->client_id)->get();
        $client->is_active = 0;
        $client->save();
    }

    public function set_password($client_id) {
        $client = Client::find($client_id);
        if ($client->is_active != 2) {
            return redirect(url('/clients/login'));
        }
        $page_title = "Set Initial Password";

        return view('clients.set-password')->with('page_title', $page_title);
    }

    /* Private functions */
    private function is_client_logged_in() {
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