@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-5 col-md-6 col-sm-8 col-12">
				<form action="/clients/login/attempt" method="POST">
					{{ csrf_field() }}
					<div class="gray-box">
						<div class="form-group">
							<h6 class="mb-2">Email:</h6>
							<input type="email" class="form-control" name="email" required>
						</div>

						<div class="form-group">
							<h6 class="mb-2">Password:</h6>
							<input type="password" class="form-control" name="password">
						</div>

						@if(session()->has('error'))
							<p class="red text-center">{{ session()->get('error') }}</p>
						@endif

						<div class="form-group mb-0">
							<input type="submit" value="Login" class="btn btn-primary pl-4 pr-4 centered">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection