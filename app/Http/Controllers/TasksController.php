<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function create(Request $data) {
    	$task = new Task;
    	$task->title = $data->title;
    	$task->description = $data->description;
    	$task->due_date = $data->due_date;
    	$task->save();
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
    }

    public function delete(Request $data) {
    	$task = Task::find($data->task_id);
    	$task->is_active = 0;
    	$task->save();
    }
}
