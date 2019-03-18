@extends('layouts.app')

@section('content')
	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-7 col-md-8 col-sm-10 col-12">
				<form action="/admin/create" method="POST">
					{{ csrf_field() }}
					<div class="gray-box">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<label>First Name:</label>
									<input type="text" name="first_name" class="form-control" required>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Last Name:</label>
									<input type="text" name="last_name" class="form-control" required>
								</div>
							</div>
						</div>
					
						<div class="row">
							<div class="col-12">
								<label>Username:</label>
								<input type="text" name="username" class="form-control" required>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<label>Password:</label>
								<input type="password" name="password" class="form-control" required>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<input type="submit" value="Create Admin" class="primary_btn pr-4 pl-4 centered">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection