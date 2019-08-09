<?php

namespace App\Http\Controllers;

use App\ProjectTask;

use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    
    /* ----------------------- *\
		CRUD Functions
	\* ----------------------- */

	public function create(Request $data) {
		$task = new ProjectTask;
		$task->project_id = $data->project_id;
		$task->title = $data->title;
		$task->description = $data->description;
		$task->save();

		return response()->json(true, 200);
	}

	public function read() {
		return response()->json(ProjectTask::find($_GET['task_id'])->toArray(), 200);
	}

	public function update(Request $data) {
		$task = ProjectTask::find($data->task_id);
		$task->title = $data->title;
		$task->description = $data->description;
		$task->status = $data->status;
		$task->save();

		return response()->json(true, 200);
	}

	public function delete(Request $data) {
		$task = ProjectTask::find($data->task_id);
		$task->status = 0;
		$task->save();

		return response()->json(true, 200);
	}

}
