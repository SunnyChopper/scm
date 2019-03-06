@extends('layouts.app')

@section('content')
	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-8 col-sm-12 col-12">
				@if(count($logs) > 0)
					@foreach($logs as $log)
						<ul class="list-group">
							<li class="list-group-item">
								<h4>{{ $log->title }}</h4>
								<p>{{ $log->description }}</p>
								<p class="mb-0"><small>{{ $log->created_at->format('M jS, Y') }}</small></p>
							</li>
						</ul>
					@endforeach
				@else
					<div class="gray-box">
						<h5 class="text-center mb-0">No logs in database.</h5>
					</div>
				@endif
			</div>
		</div>
	</div>
@endsection