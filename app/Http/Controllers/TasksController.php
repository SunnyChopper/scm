<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Task;

class TasksController extends Controller
{
    public function create(Request $data) {
    	$task = new Task;
    	$task->client_id = $data->client_id;
    	$task->title = $data->title;
    	$task->description = $data->description;
    	$task->due_date = $data->due_date;
    	$task->save();

        // TODO: Send new task email to client

        return redirect(url($data->redirect_url));
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
    	$task->save();

        // TODO: Send updated task email to client

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
