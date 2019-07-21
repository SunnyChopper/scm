@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-7 col-sm-8 col-12">
				<form action="/clients/register" method="POST">
					{{ csrf_field() }}
					<div class="gray-box">
						<div class="row">
							<div class="col-12">
								<p class="text-center">Fields with <span class="red">*</span> are required.</p>
							</div>
						</div>

						<div class="form-group row mt-32">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<h6 class="mb-2">First Name: <span class="red">*</span></h6>
								<input type="text" name="first_name" class="form-control" required>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-16-mobile">
								<h6 class="mb-2">Last Name:</h6>
								<input type="text" name="last_name" class="form-control">
							</div>
						</div>

						<div class="form-group row mt-32">
							<div class="col-12">
								<h6 class="mb-2">Company Name:</h6>
								<input type="text" name="company_name" class="form-control">
							</div>
						</div>

						<div class="form-group row mt-32">
							<div class="col-12">
								<h6 class="mb-2">Email: <span class="red">*</span></h6>
								<input type="email" name="email" class="form-control" required>
								<p class="mb-0"><small id="email_feedback"></small></p>
							</div>
						</div>

						<div class="form-group row mt-32">
							<div class="col-12">
								<h6 class="mb-2">Password: <span class="red">*</span></h6>
								<input type="password" class="form-control" name="password">
								<p class="mb-0"><small><strong>Password: </strong> <span id="password"></span></small></p>
							</div>
						</div>

						@if(session()->has('error'))
							<p class="red text-center">{{ session()->get('error') }}</p>
						@endif

						<div class="form-group mt-32 mb-0">
							<input type="submit" value="Login" class="btn btn-primary pl-4 pr-4 centered">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		$("input[name=email]").on('change', function() {
			$.ajax({
				url : '/api/clients/email/check',
				type : 'GET',
				data : {
					'email' : $(this).val()
				},
				success : function(data) {
					console.log(data);
					if (data == true) {
						$("#email_feedback").addClass('green');
						$("#email_feedback").removeClass('red');
						$("#email_feedback").html('Email is available.');
						$("input[name=email]").css('border', '1px solid green');
					} else {
						$("#email_feedback").removeClass('green');
						$("#email_feedback").addClass('red');
						$("#email_feedback").html('Email is not available.');
						$("input[name=email]").css('border', '1px solid red');
					}
				}
			});
		});

		$("input[name=password]").on('keyup', function() {
			$("#password").html($(this).val());
		});
	</script>
@endsection