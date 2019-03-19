@extends('layouts.app')

@section('content')
	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-7 col-sm-10 col-12">
				@if(count($clients) > 0)
					<form action="/admin/logs/create" id="create_log_form" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="redirect_url" value="/admin/logs">
						<div class="gray-box">
							<div class="form-group">
								<label>Clients:</label>
								<select form="create_log_form" name="client_id" class="form-control">
									@foreach($clients as $client)
										<option value="{{ $client->id }}">{{ $client->company_name }}</option>
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<label>Title:</label>
								<input type="text" name="title" class="form-control" required>
							</div>

							<div class="form-group">
								<label>Description:</label>
								<textarea class="form-control" rows="6"></textarea>
							</div>

							<div class="form-group">
								<input type="submit" class="centered primary_btn pl-4 pr-4" value="Create Log Event">
							</div>
						</div>
					</form>
				@else
					<div class="gray-box">
						<p class="text-center">No clients created. Click the button below to get started.</p>
						<a href="/admin/clients/new" class="primary_btn centered pr-4 pl-4">Create Client</a>
					</div>
				@endif
			</div>
		</div>
	</div>
@endsection