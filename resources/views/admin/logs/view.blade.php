@extends('layouts.app')

@section('content')
	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-12">
				<h3 class="text-center">Logs for Clients</h3>
				<hr />
			</div>
		</div>

		@if(count($logs) > 0)
			<div class="row">
				<div class="col-12 mb-16">
					<a href="/admin/logs/new">New Log</a>
				</div>

				<div class="col-12">
					<div style="overflow: auto;">
						<table>
							<thead>
								<tr>
									<td>Company Name</td>
									<td>Title</td>
									<td>Description</td>
									<td></td>
								</tr>
							</thead>
							<tbody>
								@foreach($logs as $log)
									<tr>
										<td>{{ ClientHelper::getCompanyName($log->client_id) }}</td>
										<td>{{ $log->title }}</td>
										<td>{{ $log->description }}</td>
										<td><button id="{{ $log->id }}" class="genric-btn danger rounded">Delete</button></td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		@else
			<div class="row justify-content-center">
				<div class="col-lg-7 col-md-8 col-sm-10 col-12">
					<div class="gray-box">
						<p class="text-center">No logs for clients. Click below to get started on the first log event.</p>
						<a href="/admin/logs/new" class="primary_btn pr-4 pl-4 centered">Create Log</a>
					</div>
				</div>
			</div>
		@endif
	</div>
@endsection