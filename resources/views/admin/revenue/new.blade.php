@extends('layouts.app')

@section('content')
	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			@if(count($clients) > 0)
				<div class="col-lg-7 col-md-8 col-sm-10 col-12">
					<form action="/admin/revenue/create" id="create_revenue_form" method="POST">
						{{ crsf_field() }}
						<input type="hidden" name="redirect_url" value="/admin/revenue">
						<div class="gray-box">
							<div class="form-group">
								<label>Select client:</label>
								<select name="client_id" form="create_revenue_form">
									@foreach($clients as $client)
										<option value="{{ $client->id }}">{{ $client->company_name }}</option>
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<label>Report date:</label>
								<input type="date" class="form-control" name="report_date" required>
							</div>

							<div class="form-group">
								<label>Amount:</label>
								<input type="number" class="form-control" step="0.01" min="0.00" required>
							</div>

							<div class="form-group">
								<input type="submit" class="primary_btn pr-4 pl-4 centered" value="Create Revenue">
							</div>
						</div>
					</form>
				</div>
			@else
				<div class="col-12">
					<div class="gray-box">
						<h3 class="text-center">No Clients</h3>
						<p class="text-center">There are no clients. Click below to get started on making the first client.</p>
						<a href="/admin/clients/new" class="primary_btn centered pr-4 pl-4">Create New Client</a>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection