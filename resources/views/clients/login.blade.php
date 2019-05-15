@extends('layouts.app')

@section('content')
	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-5 col-md-6 col-sm-8 col-12">
				<form action="/clients/login/attempt" method="POST">
					{{ csrf_field() }}
					<div class="gray-box">
						<div class="form-group">
							<h5>Email:</h5>
							<input type="email" class="form-control" name="email" required>
						</div>

						<div class="form-group">
							<h5 class="mb-0">Password:</h5>
							<p class="mb-2">Type "NA" if you have not set a password.</p>
							<input type="password" class="form-control" name="password">
						</div>

						@if(session()->has('error'))
							<p class="red text-center">{{ session()->get('error') }}</p>
						@endif

						<div class="form-group mb-0">
							<input type="submit" value="Login" class="primary_btn pl-4 pr-4 centered">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection