@extends('layouts.app')

@section('content')
	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-12">
				<h3 class="text-center">Tasks</h3>
				@if(count($tasks) > 0)
					<hr />
					<ul class="list-group">
						@foreach($tasks as $task)
							<li class="list-group-item">
								<h5 class="mb-0">{{ $tasks->title }}</h5>
								<p class="mb-0">{{ $tasks->description }}</p>
								@if($task->status == 0)
								Status: <span class="badge badge-warning mb-0 ml-1">Waiting Approval</span>
								@elseif($task->status == 1)
								Status: <span class="badge badge-success mb-0 ml-1">Approved</span>
								@elseif($task->status == 2)
								Status: <span class="badge badge-warning mb-0 ml-1">Scheduled</span>
								@elseif($task->status == 3)
								Status: <span class="badge badge-warning mb-0 ml-1">In Progress</span>
								@elseif($task->status == 4)
								Status: <span class="badge badge-success mb-0 ml-1">Done</span>
								@endif
							</li>
						@endforeach
					</ul>
					<a class="primary_btn centered pl-4 pr-4 mt-16" href="/clients/tasks/request">Request Task</a>
				@else
					<hr />
					<p class="text-center">There are no tasks currently open. Click below to request a task.</p>
					<a class="primary_btn centered pl-4 pr-4 mt-16" href="/clients/tasks/request">Request Task</a>
				@endif
			</div>

			<div class="col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="gray-box">
					<h3 class="text-center">Log Events</h3>
					@if(count($logs) > 0)
						<ul class="list-group">
							@foreach($logs as $log)
								<li class="list-group-item">
									<h5>{{ $log->title }}</h5>
									<p class="mb-0">{{ $log->description }}</p>
									<p class="mb-0"><small>{{ $log->created_at->format('M jS, Y') }}</small></p>
								</li>
							@endforeach
						</ul>
					@else
						<p class="text-center mt-16">There are currently no logs for you.</p>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection