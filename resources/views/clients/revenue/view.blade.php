@extends('layouts.app')

@section('content')
	@include('layouts.banner')
	
	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-8 col-sm-12 col-12">
				@if(count($revenues) > 0)
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Date</th>
								<th>Amount</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								@foreach($revenues as $revenue)
									<td>{{ $revenue->report_date }}</td>
									<td>${{ $revenue->amount }}</td>
								@endforeach
							</tr>
						</tbody>
					</table>
				@else
					<div class="gray-box">
						<h5 class="text-center mb-0">No revenue in database.</h5>
					</div>
				@endif
			</div>
		</div>
	</div>
@endsection