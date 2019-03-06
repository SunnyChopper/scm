@extends('layouts.app')

@section('content')
	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-8 col-sm-12 col-12">
				@if(count($tasks) > 0)
					@foreach($tasks as $task)
						<ul class="list-group">
							<li class="list-group-item">

								@if($task->status == 0)
								<h6><span class="badge badge-danger">Waiting Approval</span></h6>
								@elseif($task->status == 1)
								<h6><span class="badge badge-primary">Approved</span></h6>
								@elseif($task->status == 2)
								<h6><span class="badge badge-info">Scheduled</span></h6>
								@elseif($task->status == 3)
								<h6><span class="badge badge-warning">In Progress</span></h6>
								@elseif($task->status == 4)
								<h6><span class="badge badge-success">Done</span></h6>
								@endif

								<h4>{{ $task->title }}</h4>
								<p>{{ $task->description }}</p>
								<p><strong>Expected due date:</strong> {{ $task->due_date }}</p>
							</li>
						</ul>
					@endforeach
				@else
					<div class="gray-box">
						<p class="text-center">No tasks in database. Click the button below to request a task.</p>
						<a href="/clients/tasks/request" class="centered genric-btn primary pl-4 pr-4">Request Task</a>
					</div>
				@endif
			</div>
		</div>
	</div>
@endsection