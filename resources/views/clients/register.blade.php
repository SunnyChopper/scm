@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center" style="display: flex;">
			<div class="col-lg-6 col-md-6 col-sm-12 col-12" style="margin: auto;">
				<h3 class="mb-3">What You're Unlocking Today By Joining</h3>
				<p class="mb-2">Getting high quality leads for your sales or marketing team is tough. Social platforms are getting expensive. The internet is becoming more complex by the day. Seems like the good old days of getting cheap leads from paid advertising are over.</p>
				<p class="mb-2">However, there was once a time when direct mail used to work effectively until social media came along. The good old days are only over when you stop innovating.</p>
				<p class="mb-2">By joining for free today, you will receive the following:</p>
				<ul>
					<li><b>Access to Toolbox</b> - Start taking actions that drive results by accessing our Toolbox. Inside it, you'll find lists of tools many businesses, including us, use to drive results. You will also get access to the free tools we make.</li>
					<li><b>Access to Playbooks</b> - Sometimes we all get stuck on which lead magnet to use or which funnel structure to use. Blast through these road bumps using our Playbooks. Within a Playbook, you'll find the pros and cons for many aspects of marketing.</li>
					<li><b>Access to Templates</b> - Imagine if you have over 25 funnel templates in your arsenal. Imagine if you have 50 different Instagram templates ready. You would become efficient. That's what you get with our Templates.</li>
					<li><b>Access to Vault</b> - You're always on the move and staying up-to-date on the latest marketing trends can get out of hand. Not to worry. In our Vault, you'll get the latest trends in bite-sized pieces with actionable steps.</li>
				</ul>
			</div>

			<div class="col-lg-6 col-md-7 col-sm-8 col-12" style="margin: auto;">
				<form action="/clients/register" class="mt-32-mobile" method="POST">
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