<?php

namespace App\Http\Controllers;

use App\Project;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    
	/* ----------------------- *\
		CRUD Functions
	\* ----------------------- */

	public function create(Request $data) {
		$project = new Project;
		$project->client_id = $data->client_id;
		$project->customer_id = $data->customer_id;
		$project->charge_id = $data->charge_id;
		$project->subscription_id = $data->subscription_id;
		$project->order_id = $data->order_id;
		$project->save();

		return response()->json(true, 200);
	}

	public function read() {
		return response()->json(Project::find($_GET['project_id'])->toArray(), 200);
	}

	public function update(Request $data) {
		$project = Project::find($data->project_id);
		$project->status = $data->status;
		$project->save();

		return response()->json(true, 200);
	}

}
