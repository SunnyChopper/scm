@extends('layouts.app')

@section('content')
	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-7 col-md-8 col-sm-10 col-12">
				<form id="request_task_form" action="/clients/tasks/new">
					<input type="hidden" name="client_id" value="{{ $client_id }}">
					<input type="hidden" name="status" value="0">
					<input type="hidden" name="redirect_url" value="/clients/tasks">
					<div class="gray-box">
						<h3 class="text-center">Request Task</h3>
						<p class="text-center mb-0">Fill out the fields below. Your task will then be either approved or disapproved.</p>
						<hr />
						<div class="form-group">
							<h5>Title:</h5>
							<input type="text" name="title" class="form-control" required>
						</div>
						<div class="form-group">
							<h5>Description:</h5>
							<textarea class="form-control" rows="6" form="request_task_form" name="description" required></textarea>
						</div>
						<div class="form-group">
							<h5>Due Date:</h5>
							<input type="date" class="form-control" name="due_date" required>
						</div>
						<div class="form-group mt-32 mb-0">
							<input type="submit" class="primary_btn centered pl-4 pr-4" value="Request Task">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection