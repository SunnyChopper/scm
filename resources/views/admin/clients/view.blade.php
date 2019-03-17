@extends('layouts.app')

@section('content')
	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-12">
				@if(count($clients) > 0)
					<div style="overflow: auto;">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Company</th>
									<th>Email</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($clients as $client)
								<tr>
									<td>{{ $client->first_name }}</td>
									<td>{{ $client->last_name }}</td>
									<td>{{ $client->company_name }}</td>
									<td>{{ $client->email }}</td>
									<td>
										<a href="/admin/clients/edit/{{ $client->id }}" class="btn btn-warning">Edit Client</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				@else
					<div class="gray-box">
						<h3 class="text-center">No clients created.</h3>
						<p class="text-center">Click below to create the first client.</p>
						<a href="/admin/clients/new" class="primary_btn centered pr-4 pl-4">Create Client</a>
					</div>
				@endif
			</div>
		</div>
	</div> 
@endsection