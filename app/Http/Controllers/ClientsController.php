<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\SoftwareProduct;
use App\Client;
use App\Task;
use App\Log;

class ClientsController extends Controller
{
    public function index() {
    	$page_title = "Clients Login";
        $page_header = $page_title;

    	return view('clients.login')->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function register() {
        $page_title = "Register";

        return view('clients.register')->with('page_title', $page_title);
    }

    public function attempt_register(Request $data) {

    } 

    public function login(Request $data) {
    	if (Client::where('email', strtolower($data->email))->count() > 0) {
            $client = Client::where('email', strtolower($data->email))->first();
            if ($client->password == NULL) {
                Session::put('client_id', $client->id);
                Session::put('client_logged_in', true);
                Session::save();
                return redirect(url('/clients/password/initial/' . $client->id));
            } else {
                if (Hash::check($data->password, $client->password)) {
                    Session::put('client_id', $client->id);
                    Session::put('client_logged_in', true);
                    Session::save();
                    return redirect(url('/clients/dashboard'));
                } else {
                    return redirect()->back()->with('error', 'Password is incorrect.');
                } 
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

    	if ($this->is_client_logged_in() == false) {
            return redirect(url('/clients'));
        }

        $logs = Log::where('client_id', $this->get_client_id())->get();
        $tasks = Task::where('client_id', $this->get_client_id())->get();

    	return view('clients.dashboard')->with('page_title', $page_title)->with('logs', $logs)->with('tasks', $tasks);
    }

    public function register_client(Request $data) {
        // Create the client
        $client = new Client;
        $client->first_name = $data->first_name;
        $client->last_name = $data->last_name;
        $client->email = $data->email;
        $client->password = Hash::make($data->password);
        $client->company_name = $data->company_name;
        $client->save();
    }

    public function view_software_products() {
        $client_id = $this->get_client_id();
        $products = SoftwareProduct::where('client_id', $client_id)->get();

        $page_title = "Your Software Products";
        $page_header = $page_title;

        return view('clients.software.view')->with('page_title', $page_title)->with('page_header', $page_header)->with('products', $products);
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

        return view('clients.set-password')->with('page_title', $page_title)->with('client', $client);
    }

    public function create_password(Request $data) {
        $client = Client::find($data->client_id);
        $client->password = Hash::make($data->password);
        $client->is_active = 1;
        $client->save();

        return redirect(url('/clients/login'));
    }

    public function create(Request $data) {
        $client = new Client;
        $client->first_name = $data->first_name;
        $client->last_name = $data->last_name;
        $client->email = $data->email;
        $client->password = Hash::make($data->password);
        $client->company_name = $data->company_name;
        $client->save();

        // Save session
        $data->session()->put('client_id', $client->id);

        return response()->json($client->id, 200);
    }

    /* Private functions */
    private function is_client_logged_in() {
        if (Session::has('client_id')) {
            if (Session::get('client_id') != null) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    private function get_client_id() {
        if (Session::has('client_id')) {
            return Session::get('client_id');
        } else {
            return 0;
        }
    }

}
