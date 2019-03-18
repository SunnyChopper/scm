@extends('layouts.app')

@section('content')
	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-8 col-sm-10 col-12">
				<div class="gray-box">
					<form action="/admin/login" method="POST">
						{{ csrf_field() }}
						<div class="form-group">
							<label>Username:</label>
							<input type="text" class="form-control" name="username" required>
						</div>

						<div class="form-group">
							<label>Password:</label>
							<input type="password" class="form-control" name="password" required>
						</div>

						@if(session()->has('error'))
						<div class="form-group">
							<p class="text-center mb-0 red">{{ session()->get('error') }}</p>
						</div>
						@endif

						<div class="form-group">
							<input type="submit" class="primary_btn pl-4 pr-4 mb-0 centered">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection