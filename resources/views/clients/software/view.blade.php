@extends('layouts.app')

@section('content')
	<div class="container pt-64 pb-64">
		<div class="row">
			@if(count($products) > 0)
			<div class="col-12">
				<h1 class="text-center">Your Software Products</h1>
				<p class="text-center">The below are all of the software products and services that we are building for your brand.</p>
				<div style="overflow: auto;">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Title</th>
								<th>Use Case Diagram</th>
								<th>Design Class Diagram</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							@foreach($products as $p)
							<tr>
								<td style="vertical-align: middle;">{{ $p->title }}</td>
								<td style="vertical-align: middle;"><a href="{{ $p->use_case_link }}" class="genric-btn primary small rounded">View</a></td>
								<td style="vertical-align: middle;"><a href="{{ $p->use_case_link }}" class="genric-btn primary small rounded">View</a></td>
								<td style="vertical-align: middle;">${{ sprintf("%.2f", $p->price) }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			@else
			<div class="col-12">
				<h1 class="text-center">No Software Products</h1>
				<p class="text-center">There are currently no products or services in our database for your business. We're most likely hard at work to fix this.</p>	
			</div>
			@endif
		</div>
	</div>
@endsection