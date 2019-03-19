<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

use App\Mail\NewLog;

use App\Log;
use App\Client;

class LogsController extends Controller
{
    public function create(Request $data) {
    	$log = new Log;
    	$log->client_id = $data->client_id;
    	$log->title = $data->title;
    	$log->description = $data->description;
    	$log->save();

        // Get client data and send update email
        $client = Client::find($data->client_id);
        Mail::to($client->email)->send(new NewLog($client->first_name, $data->title, $data->description));

        return redirect(url($data->redirect_url));
    }

    public function read($log_id) {
    	$log = Log::find($log_id);
    	$page_title = $log->title;

    	return view('clients.read-log')->with('page_title', $page_title)->with('log', $log);
    }

    public function update(Request $data) {
    	$log = Log::find($data->log_id);
    	$log->title = $data->title;
    	$log->description = $data->description;
    	$log->save();
    }

    public function delete(Request $data) {
    	$log = Log::find($data->log_id);
    	$log->is_active = 0;
    	$log->save();
    }

    public function view_all() {
        $client_id = $this->get_client_id();
        $logs = Log::where('client_id', $client_id)->get();
        $page_title = "Logs";
        return view('clients.logs.view')->with('page_title', $page_title)->with('logs', $logs);
    }

    private function get_client_id() {
        if (Session::has('client_id')) {
            return Session::get('client_id');
        } else {
            return 0;
        }
    }
}
