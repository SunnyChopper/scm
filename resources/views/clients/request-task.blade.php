@extends('layouts.app')

@section('content')
	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-7 col-md-8 col-sm-9 col-12">
				<div class="gray-box">
					<h3 class="text-center">Request a Task</h3>
					<hr />
					<form action="/clients/tasks/request" method="POST" id="request_task_form">
						{{ csrf_field() }}
						<input type="hidden" name="client_id" value="{{ $client_id }}">
						<div class="form-group">
							<h5>Title:</h5>
							<input type="text" class="form-control" name="title" required>
						</div>
						<div class="form-group">
							<h5>Description:</h5>
							<textarea name="description" form="request_task_form" class="form-control" rows="6" required></textarea>
						</div>
						<div class="form-group">
							<h5>Due Date:</h5>
							<input type="date" class="form-control" required>
						</div>
						<div class="form-group">
							<input type="submit" value="Submit" class="primary_btn pl-4 pr-4 centered" required>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection