@extends('layouts.app')

@section('content')
	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-7 col-sm-10 col-12">
				<form action="/clients/password/set" method="POST">
					{{ csrf_field() }}
					<input type="hidden" name="client_id" value="{{ $client->id }}">
					<div class="gray-box">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<label>First Name:</label>
									<input type="text" value="{{ $client->first_name }}" class="form-control disabled" disabled="true">
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Last Name:</label>
									<input type="text" value="{{ $client->last_name }}" class="form-control disabled" disabled="true">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label>Company Name:</label>
									<input type="text" value="{{ $client->company_name }}" class="form-control disabled" disabled="true">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label>Password:</label>
									<input type="password" name="password" class="form-control" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label>Password Again:</label>
									<input type="password" name="confirm_password" class="form-control" required>
								</div>
							</div>
						</div>

						<p class="text-center red" id="error_msg" style="display: none;">Passwords do not match.</p>

						<div class="row mt-16">
							<div class="col-12">
								<input type="submit" id="submit_button" class="btn btn-primary centered" value="Set Password">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		$(document).ready(function() {
			$("input[name=confirm_password]").on('change', function() {
				var pwd = $("input[name=password]").val();
				if (pwd.localeCompare($(this).val()) != 0) {
					$("#submit_button").prop('disabled', true);
					$("#error_msg").css('display', 'block');
				} else {
					$("#submit_button").prop('disabled', false);
					$("#error_msg").css('display', 'none');
				}
			});
		});
	</script>
@endsection