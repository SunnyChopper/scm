@extends('layouts.app')

@section('content')
	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			@if(count($clients) > 0)
			<div class="col-lg-8 col-md-9 col-sm-10 col-12">
				<form id="create_task_form" action="/admin/tasks/create" method="POST">
					{{ csrf_field() }}
					<input type="hidden" name="redirect_url" value="/admin/tasks">
					<div class="gray-box">
						<div class="form-group">
							<label>Clients:</label>
							<select class="form-control" form="create_task_form" name="client_id">
								@foreach($clients as $client)
									<option value="{{ $client->id }}">{{ $client->company_name }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<label>Task Status:</label>
							<select class="form-control" form="create_task_form" name="status">
								<option value="0">Waiting Approval</option>
								<option value="1">Approved</option>
								<option value="2">Scheduled</option>
								<option value="3">In Progress</option>
								<option value="4">Done</option>
							</select>
						</div>

						<div class="form-group">
							<label>Title:</label>
							<input type="text" class="form-control" name="title" required>
						</div>

						<div class="form-group">
							<label>Description:</label>
							<textarea rows="6" form="create_task_form" class="form-control" name="description" required></textarea>
						</div>

						<div class="form-group">
							<label>Due Date:</label>
							<input type="date" class="form-control" name="due_date" required>
						</div>

						<div class="form-group">
							<input type="submit" class="primary_btn pr-4 pl-4 centered" value="Create Task">
						</div>
					</div>
				</form>
			</div>
			@else
			<div class="col-lg-7 col-md-8 col-sm-10 col-12">
				<div class="gray-box">
					<h3 class="text-center">No clients in database.</h3>
					<p class="text-center">There are no clients in the database.</p>
					<a href="/admin/clients/new" class="primary_btn pr-4 pl-4 centered">Create Client</a>
				</div>
			</div>
			@endif
		</div>
	</div>
@endsection