@extends('layouts.app')

@section('content')
	@include('layouts.banner')
	
	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			@if(count($revenues) > 0)
				<div class="col-12 mb-16">
					<a href="/admin/revenue/new">New Revenue</a>
				</div>

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
								@foreach($revenues as $r)
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

				<div class="col-12">
					{{ $revenues->links() }}
				</div>
			@else
				<div class="col-lg-7 col-md-8 col-sm-10 col-12">
					<div class="gray-box">
						<h3 class="text-center">No Revenue</h3>
						<p class="text-center">There are no revenue objects created. Click below to get started.</p>
						<a href="/admin/revenue/new" class="primary_btn centered pr-4 pl-4">Create Revenue</a>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection