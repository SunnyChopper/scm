@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-12">
				<h3 class="text-center">Clients</h3>
				<hr />
				@if(count($clients) > 0)
					<ul class="list-group">
						@foreach($clients as $client)
							<li class="list-group-item">
								<div class="row">
									<div class="col-lg-8 col-md-8 col-sm-12 col-12">
										<h4 class="mb-0">{{ $client->company_name }}</h4>
										<p class="mb-0"><small>Last logged in on March 14th, 2019 at 3:53 PM</small></p>
									</div>

									<div class="col-lg-4 col-md-4 col-sm-12 col-12">
										<a href="/admin/clients/edit/{{ $client->id }}" class="btn btn-primary rounded full-width" style="margin-top: 0.5em;">Edit</a>
									</div>
								</div>
							</li>
						@endforeach
					</ul>
				@else
					<div class="gray-box">
						<p class="text-center">No clients currently on site. Click below to create your first client.</p>
						<a href="/admin/clients/new" class="primary_btn pr-4 pl-4 centered">Create New Client</a>
					</div>
				@endif
			</div>

			<div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-64-mobile">
				<div class="gray-box">
					<h3 class="text-center">New Log Event</h3>
					<hr />
					@if(count($clients) > 0)
						<form id="create_log_form" action="/admin/logs/create">
							{{ csrf_field() }}
							<input type="hidden" name="redirect_url" value="/admin/dashboard">
							<div class="form-group">
								<label>Select client:</label>
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
								<input type="submit" class="centered btn btn-primary pl-4 pr-4" value="Create Log Event">
							</div>
						</form>
					@else
						<p class="text-center">Please create a client first.</p>
					@endif
				</div>
			</div>
		</div>
	</div>

	<div style="background: hsl(0, 0%, 95%);">
		<div class="container pt-64 pb-64">
			<div class="row">
				<div class="col-12">
					<h2 class="text-center">Company Revenue</h2>
					<hr />
				</div>
			</div>

			@if(count($revenue) > 0)
				<div class="row">
					<div class="col-12">
						<div style="overflow: auto;">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Report Date</th>
										<th>Company Name</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
									@foreach($revenue as $r)
										<tr>
											<td>{{ $r->report_date }}</td>
											<td>{{ ClientHelper::getCompanyName($r->client_id) }}</td>
											<td>${{ sprintf("%.2f", $r->total) }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			@else
				<div class="row">
					<div class="col-12">
						<p class="text-center">No revenue recorded.</p>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection