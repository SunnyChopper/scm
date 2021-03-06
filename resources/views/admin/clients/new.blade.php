@extends('layouts.app')

@section('content')
	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-7 col-md-8 col-sm-12 col-12">
				<form action="/admin/clients/create" method="POST">
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
								<div class="form-group">
									<label>Email:</label>
									<input type="email" name="email" class="form-control" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label>Company Name:</label>
									<input type="text" name="company_name" class="form-control" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<input type="submit" class="primary_btn pr-4 pl-4 centered" value="Create Client">
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection