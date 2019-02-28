<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;

class LogsController extends Controller
{
    public function create(Request $data) {
    	$log = new Log;
    	$log->client_id = $data->client_id;
    	$log->title = $data->title;
    	$log->description = $data->description;
    	$log->save();
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
}
