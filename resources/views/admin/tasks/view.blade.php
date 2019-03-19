@extends('layouts.app')

@section('content')
	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div style="overflow: auto;">
				<div class="col-12">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Company</th>
								<th>Title</th>
								<th>Description</th>
								<th>Due Date</th>
								<th>Status</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($tasks as $task)
								<tr>
									<td>{{ App\Custom\ClientHelper::getCompanyName($task->client_id) }}</td>
									<td>{{ $task->title }}</td>
									<td>{{ $task->description }}</td>
									<td>{{ $task->due_date }}</td>

									@if($task->status == 0)
										<td><span class="badge badge-warning">Waiting Approval</span></td>
									@elseif($task->status == 1)
										<td><span class="badge badge-primary">Approved</span></td>
									@elseif($task->status == 2)
										<td><span class="badge badge-info">Scheduled</span></td>
									@elseif($task->status == 3)
										<td><span class="badge badge-warning">In Progress</span></td>
									@elseif($task->status == 4)
										<td><span class="badge badge-success">Done</span></td>
									@endif

									<td>
										<a href="/admin/tasks/edit/{{ $task->id }}" class="genric-btn warning rounded">Edit</a>
										<button id="{{ $task->id }}" class="genric-btn delete_task_button danger rounded">Delete</button>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>

				<div class="col-12">
					{{ $tasks->links() }}
				</div>
			</div>
		</div>
	</div>
@endsection