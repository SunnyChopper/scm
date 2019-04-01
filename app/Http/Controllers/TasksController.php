<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

use App\Custom\ClientHelper;

use App\Mail\NewTask;
use App\Mail\UpdateTask;
use App\Mail\TaskRequest;

use App\Task;
use App\Client;

class TasksController extends Controller
{
    public function create(Request $data) {
    	$task = new Task;
    	$task->client_id = $data->client_id;
    	$task->title = $data->title;
    	$task->description = $data->description;
        $task->due_date = $data->due_date;
        
        if (isset($data->reach)) {
            $task->reach = $data->reach;
            $task->impact = $data->impact;
            $task->confidence = $data->confidence;
            $task->ease = $data->ease;
            $rice_score = ($data->reach * $data->impact * $data->confidence) / $data->ease;
            $task->rice_score = $rice_score; 
        }

    	$task->save();

        // Get client data and send update email
        $client = Client::find($data->client_id);
        Mail::to($client->email)->send(new NewTask($client->first_name, $data->title, $data->description, $data->status, $data->due_date));

        return redirect(url($data->redirect_url));
    }

    public function create_request(Request $data) {
        $task = new Task;
        $task->client_id = $data->client_id;
        $task->title = $data->title;
        $task->description = $data->description;
        $task->due_date = $data->due_date;
        $task->status = 0;
        $task->save();

        // Send email to myself
        $company_name = ClientHelper::getCompanyName($data->client_id);
        Mail::to("info@sunnychoppermedia.com")->send(new TaskRequest($company_name, $data->title, $data->description, $data->due_date));

        return redirect(url('/clients/tasks'));
    }

    public function read($task_id) {
    	$task = Task::find($task_id);
    	$page_title = $task->title;
    	return view('clients.view-task')->with('page_title', $page_title)->with('task', $task);
    }

    public function update(Request $data) {
    	$task = Task::find($data->task_id);
    	$task->title = $data->title;
    	$task->description = $data->description;
    	$task->due_date = $data->due_date;
    	$task->status = $data->status;

        if (isset($data->reach)) {
            $task->reach = $data->reach;
            $task->impact = $data->impact;
            $task->confidence = $data->confidence;
            $task->ease = $data->ease;
            $rice_score = ($data->reach * $data->impact * $data->confidence) / $data->ease;
            $task->rice_score = $rice_score; 
        }
        
    	$task->save();

        // Get client data and send update email
        $client = Client::find($task->client_id);
        Mail::to($client->email)->send(new UpdateTask($client->first_name, $data->title, $data->description, $data->status, $data->due_date));

        return redirect(url($data->redirect_url));
    }

    public function delete(Request $data) {
    	$task = Task::find($data->task_id);
    	$task->is_active = 0;
    	$task->save();
    }

    public function view_all() {
        $client_id = $this->get_client_id();
        $tasks = Task::where('client_id', $client_id)->get();
        $page_title = "Tasks";
        return view('clients.tasks.view')->with('page_title', $page_title)->with('tasks', $tasks);
    }

    public function request() {
        $client_id = $this->get_client_id();
        $page_title = "Request New Task";
        return view('clients.tasks.new')->with('page_title', $page_title)->with('client_id', $client_id);
    }

    private function get_client_id() {
        if (Session::has('client_id')) {
            return Session::get('client_id');
        } else {
            return 0;
        }
    }
}
