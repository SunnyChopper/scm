@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class='container pt-64 pb-64'>
		<div class='row justify-content-center'>
			@if(isset($before_and_after))
			@else
				<div class="col-12 mb-64">
					<h2 id="step_title" class="text-center mb-3">Welcome to the Lead Magnet Builder Kit</h2>
					<div class="progress" style="height: 40px;">
						<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 5%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
					</div>
				</div>

				<div class="col-lg-10 col-md-10 col-sm-12 col-12" id="stepOne">
					<div class="gray-box">
						<h3 class="text-center mb-3">Let's Get Started!</h3>
						<p class="text-center mb-3">Welcome to the Lead Magnet Builder Kit by SunnyChopper Media. Click the button below to get started with your before and after work sheet.</p>
						<button id="step_1_button" type="button" class="btn btn-success centered">Continue to Before and After</button>
					</div>
				</div>

				<div class="col-lg-10 col-md-10 col-sm-12 col-12" id="stepTwo" style="display: none;">
					<div class="gray-box">
						<h3 class="mb-3">What is the Before and After section?</h3>
						<p class="mb-2">The Before and After section is where you will write the before and after state of your target customer. Before they do business with you, what were they like and after they do business with you, how will they be like?</p>
						<p class="mb-4">We will write about the before and after stages with respect to the four following attributes: have, feel, average day, and status. In total, you will have 8 boxes to fill out.</p>
						<h3 class="mb-3">Why is this important?</h3>
						<p class="mb-2">Due to day-to-day activities and getting lost in the details, we tend to forget exactly what value we are providing to the customer at the end of the day. We forget the "why". When you lose your "why", you start to lose your edge in the market.</p>
						<p class="mb-4">This section was designed to get you to start thinking about how you're adding value to your customer's life on multiple levels so when we get around to creating the lead magnets, you will be able to easily come up with ideas.</p>

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<h5 class="mb-2">Before (Have):</h5>
								<p class="mb-2">Before your target audience does business with you, what do they physically have?</p>
								<textarea id="before_have" class="form-control" placeholder="Your before (have) here..." rows="5"></textarea>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-32-mobile">
								<h5 class="mb-2">After (Have):</h5>
								<p class="mb-2">After your target audience does business with you, what do they physically have? </p>
								<textarea id="after_have" class="form-control" placeholder="Your after (have) here..." rows="5"></textarea>
							</div>
						</div>

						<div class="row mt-32">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<h5 class="mb-2">Before (Feel):</h5>
								<p class="mb-2">Before your target audience does business with you, how do they feel?</p>
								<textarea id="before_feel" class="form-control" placeholder="Your before (feel) here..." rows="5"></textarea>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-32-mobile">
								<h5 class="mb-2">After (Feel):</h5>
								<p class="mb-2">After your target audience does business with you, how do they feel? </p>
								<textarea id="after_feel" class="form-control" placeholder="Your after (feel) here..." rows="5"></textarea>
							</div>
						</div>

						<div class="row mt-32">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<h5 class="mb-2">Before (Average Day):</h5>
								<p class="mb-2">Before your target audience does business with you, how does their average day look?</p>
								<textarea id="before_average_day" class="form-control" placeholder="Your before (average day) here..." rows="5"></textarea>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-32-mobile">
								<h5 class="mb-2">After (Average Day):</h5>
								<p class="mb-2">After your target audience does business with you, how does their average day look? </p>
								<textarea id="after_average_day" class="form-control" placeholder="Your after (average day) here..." rows="5"></textarea>
							</div>
						</div>

						<div class="row mt-32">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<h5 class="mb-2">Before (Status):</h5>
								<p class="mb-2">Before your target audience does business with you, what status do they have?</p>
								<textarea id="before_status" class="form-control" placeholder="Your before (status) here..." rows="5"></textarea>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-32-mobile">
								<h5 class="mb-2">After (Status):</h5>
								<p class="mb-2">After your target audience does business with you, what status do they have? </p>
								<textarea id="after_status" class="form-control" placeholder="Your after (status) here..." rows="5"></textarea>
							</div>
						</div>

						<button id="step_2_button" type="button" class="mt-32 btn btn-success centered">Generate Lead Magnet Ideas</button>
						<p id="error_feedback" class="red text-center mt-2 mb-2" style="display: none;"></p>
					</div>
				</div>

				<div class="col-lg-10 col-md-10 col-sm-12 col-12" id="stepThree" style="display: none;">
					<div class="gray-box">
						<div class="row">
							<div class="col-12">
								<h3 class="mb-3">Your Before and After Matrix</h3>
								<p>Below is your Before and After Matrix. You can visually see how your business provides value to your customer on four different levels. You want to keep this in mind when brainstorming your lead magnets.</p>
							</div>
						</div>

						<div class="row mt-32">
							<div class="col-12">
								<table class="table table-striped">
									<thead>
										<tr>
											<th></th>
											<th>Before</th>
											<th>After</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td style="vertical-align: middle;">Have</td>
											<td style="vertical-align: middle;" id="before_have_text"></td>
											<td style="vertical-align: middle;" id="after_have_text"></td>
										</tr>

										<tr>
											<td style="vertical-align: middle;">Feel</td>
											<td style="vertical-align: middle;" id="before_feel_text"></td>
											<td style="vertical-align: middle;" id="after_feel_text"></td>
										</tr>

										<tr>
											<td style="vertical-align: middle;">Average Day</td>
											<td style="vertical-align: middle;" id="before_average_day_text"></td>
											<td style="vertical-align: middle;" id="after_average_day_text"></td>
										</tr>

										<tr>
											<td style="vertical-align: middle;">Status</td>
											<td style="vertical-align: middle;" id="before_status_text"></td>
											<td style="vertical-align: middle;" id="after_status_text"></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>

						<div class="row mt-32">
							<div class="col-12">
								<h3 class="mb-3">The 8 Types of Lead Magnets</h3>
								<p class="mb-2">There are eight distinct types of lead magnets that have been proven over and over to be the highest converting. There's a reason why they work so while, however, before we get into that, let's cover the eight different types of lead magnets.</p>
								<ul class="list-group mt-2 mb-32">
									<li class="list-group-item">
										<h5 class="mb-2">Report/Guide</h5>
										<p class="mb-0">A report or guide that shows the client how to achieve something so they can move closer to their after state. The more specific the problem your report or guide solves, the better.</p>
									</li>

									<li class="list-group-item">
										<h5 class="mb-2">Toolkit/Resource List</h5>
										<p class="mb-0">A specific list of tools or resources that the client can use to solve their problems and move closer to the after state. Make sure the tools or resources in the list solve a specific problem.</p>
									</li>

									<li class="list-group-item">
										<h5 class="mb-2">Software Download/Trial</h5>
										<p class="mb-0">You can create a specific software that solves a very specific problem and offer that as a download or a trial. Make sure the software solves a specific problem.</p>
									</li>

									<li class="list-group-item">
										<h5 class="mb-2">Quiz/Survey</h5>
										<p class="mb-0">People like to know about themselves. Create a quiz or survey that helps the target audience know more about themselves. Make it related to the problem you are solving.</p>
									</li>

									<li class="list-group-item">
										<h5 class="mb-2">Cheatsheet/Handout</h5>
										<p class="mb-0">Who doesn't want to spend less time solving problems? If you can provide a quick and easy way to solve a specific problem, you can use that as a cheatsheet lead magnet.</p>
									</li>

									<li class="list-group-item">
										<h5 class="mb-2">Video Training</h5>
										<p class="mb-0">Modern day consumers are content-hungry and offering a video training such as a webinar or a multi-video course about a specific problem can help you get more leads.</p>
									</li>

									<li class="list-group-item">
										<h5 class="mb-2">Discount/Free Shipping</h5>
										<p class="mb-0">Offer a very specific discount or free shipping offer for a very limited amount of time. If you can make the limited offer contextual (e.g., Christmas Day discount), even better.</p>
									</li>

									<li class="list-group-item">
										<h5 class="mb-2">Assessment/Test</h5>
										<p class="mb-0">Unlike the survey or quiz, you are testing the knowledge of your target audience. This will help them find their problems and you can offer solutions right away to their exact problems.</p>
									</li>
								</ul>

								<h3 class="mb-3">Why Do These Eight Work?</h3>
								<p class="mb-2">These eight lead magnet types work because they are <b>specific</b>. That's the key with lead magnets. They have to be specific. You can make a report or guide that solves a specific problem. You can create an assessment that covers a specific topic. The bottom line is that they are specific.</p>
							</div>
						</div>

						<div class="row mt-32" id="choices">
							<div class="col-12">
								<h3 class="mb-3">Brainstorm Time</h3>
								<p class="mb-2">Read over the list of the eight best lead magnet types and start to brainstorm some ideas for lead magnets that can get the target audience farther away from their before stage and closer to the after stage.</p>
								<p class="mb-2">Narrow down your list of ideas to one and pick the corresponding lead magnet type below.</p>

								<div class="row mt-16">
									<div class="col-lg-3 col-md-3 col-sm-6 col-12">
										<button type="button" data-type="report" class="btn btn-primary centered full-width step_3_button">Report/Guide</button>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-6 col-12 mt-16-mobile">
										<button type="button" data-type="list" class="btn btn-primary centered full-width step_3_button">Tool/Resource List</button>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-6 col-12 mt-16-mobile">
										<button type="button" data-type="software" class="btn btn-primary centered full-width step_3_button">Software Download/Trial</button>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-6 col-12 mt-16-mobile">
										<button type="button" data-type="quiz" class="btn btn-primary centered full-width step_3_button">Quiz/Survey</button>
									</div>
								</div>

								<div class="row mt-16">
									<div class="col-lg-3 col-md-3 col-sm-6 col-12">
										<button type="button" data-type="cheatsheet" class="btn btn-primary centered full-width step_3_button">Cheatsheet/Handout</button>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-6 col-12 mt-16-mobile">
										<button type="button" data-type="video" class="btn btn-primary centered full-width step_3_button">Video Training</button>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-6 col-12 mt-16-mobile">
										<button type="button" data-type="discount" class="btn btn-primary centered full-width step_3_button">Discount/Free Shipping</button>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-6 col-12 mt-16-mobile">
										<button type="button" data-type="test" class="btn btn-primary centered full-width step_3_button">Assessment/Test</button>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>

				<div class="col-lg-10 col-md-10 col-sm-12 col-12" id="stepFour" style="display: none;">
					<div class="gray-box">
						<div class="row">
							<div class="col-12">
								<h3 class="mb-3">Your Before and After Matrix</h3>
								<p>Below is your Before and After Matrix. You can visually see how your business provides value to your customer on four different levels. You want to keep this in mind when brainstorming your lead magnets.</p>
							</div>
						</div>

						<div class="row mt-32">
							<div class="col-12">
								<table class="table table-striped">
									<thead>
										<tr>
											<th></th>
											<th>Before</th>
											<th>After</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td style="vertical-align: middle;">Have</td>
											<td style="vertical-align: middle;" id="before_have_text_2"></td>
											<td style="vertical-align: middle;" id="after_have_text_2"></td>
										</tr>

										<tr>
											<td style="vertical-align: middle;">Feel</td>
											<td style="vertical-align: middle;" id="before_feel_text_2"></td>
											<td style="vertical-align: middle;" id="after_feel_text_2"></td>
										</tr>

										<tr>
											<td style="vertical-align: middle;">Average Day</td>
											<td style="vertical-align: middle;" id="before_average_day_text_2"></td>
											<td style="vertical-align: middle;" id="after_average_day_text_2"></td>
										</tr>

										<tr>
											<td style="vertical-align: middle;">Status</td>
											<td style="vertical-align: middle;" id="before_status_text_2"></td>
											<td style="vertical-align: middle;" id="after_status_text_2"></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>

						<div class="row mt-32" id="polish_section">
							<div class="col-12">
								<h3 class="mb-3">Your Selected Type: <span id="type"></span></h3>
								<button class="btn btn-primary btn-sm back_button">Back to Lead Magnet Types</button>
								<div id="type_content" class="mt-16">
								</div>

								<div class="form-group row mt-32">
									<div class="col-lg-8 col-md-8 col-sm-12 col-12">
										<h4 class="mb-2">Title:</h4>
										<p class="mb-3">What problem are you solving with this lead magnet? Use that to come up with the title for your lead magnet.</p>
										<p class="mb-3">For example, if the specific problem is how to edit pictures better using Instagram filters, then the title could be "27 Instagram Filter Templates to Make Your Account Feel Professional".</p>
										<input type="text" class="form-control" id="title" placeholder="Lead magnet title...">
									</div>
								</div>

								<div class="form-group row mt-32">
									<div class="col-lg-8 col-md-8 col-sm-12 col-12">
										<h4 class="mb-2">Promise:</h4>
										<p class="mb-3">What promise are you making to your target audience? How is their life going to change from before using your lead magnet to after?</p>
										<p class="mb-3">For example, using the Instagram filters example, the specific promise we are making that before they won't have a professional profile and that after using our lead magnet, they will have a professional profile that attracts more leads.</p>
										<input type="text" class="form-control" id="promise" placeholder="Lead magnet promise...">
									</div>
								</div>

								<div class="form-group row mt-32">
									<div class="col-lg-8 col-md-8 col-sm-12 col-12">
										<h4 class="mb-2">Hook:</h4>
										<p class="mb-3">This is where you combine the title of the lead magnet and the promise to create a powerful hook. By talking about the problem you're solving, you'll be able to cut through the noise quicker. By talking about the promise, you are giving them a reason to try your lead magnet.</p>
										<p class="mb-3">For example, using the Instagram filters example, the hook could be "Are you having trouble getting high quality leads because you don't have a professionally branded profile? Our template package will give you not five, not ten, but twenty seven templates for you to use right out of the box that will give your profile that professional look you are aiming for."</p>
										<textarea rows="5" class="form-control" id="hook" placeholder="Lead magnet hook..."></textarea>
									</div>
								</div>

								<div class="form-group row mt-16">
									<div class="col-12">
										<p class="red text-center" id="complete_error" style="display: none;"></p>
										<button type="button" class="btn btn-success complete">Submit and Finish</button>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>

				<div class="col-lg-10 col-md-10 col-sm-12 col-12" id="stepFinish" style="display: none;">
					<div class="gray-box">
						<div class="row">
							<div class="col-12">
								<h4>Don't Lose Your Work!</h4>
								<hr />
								<p class="mb-3">After you leave this page, all your work is going to be gone. If you want to save your work, share it with colleagues or generate more ideas, click the button below to create your free account and get access to tools like these and many more.</p>
								<button class="btn btn-primary create_account_button">Create Free Account</button>
							</div>
						</div>

						<div class="row mt-32">
							<div class="col-12">
								<ul class="list-group">
									<li class="list-group-item">
										<h3 class="mb-3" id="display_title"></h3>
										<p class="mb-2"><b>Promise: </b> <span id="display_promise"></span></p>
										<p class="mb-4"><b>Hook: </b> <span id="display_hook"></span></p>
										<button class="btn btn-primary btn-sm uncomplete_button">Back to Polishing Lead Magnet</button>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection

@section('page_js')
	<script type='text/javascript'>
		var before_and_after = Array();
		var lead_magnet = Array();
		var type = "";

		function validateStepTwo() {
			if ($("#before_have").val() != "" && $("#after_have").val() != "" && $("#before_feel").val() != "" && $("#after_feel").val() != "" && $("#before_average_day").val() != "" && $("#after_average_day").val() != "" && $("#before_status").val() != "" && $("#after_status").val() != "") {
				return true;
			} else {
				return false;
			}
		}

		$("#step_1_button").on('click', function() {
			// Change views
			$("#step_title").html('Step 1 of 4: Before and After');
			$(".progress-bar").css('width', '25%');
			$(".progress-bar").html('25%');
			$("#stepOne").hide();
			$("#stepTwo").fadeIn();

			// Move to top of screen
			window.scrollTo({ top: 0, behavior: 'smooth' });
		});

		$("#step_2_button").on('click', function() {
			if (validateStepTwo() == true) {
				// Hide feedback
				$("#error_feedback").hide();

				// Create before and after object
				var have_array = Array($("#before_have").val(), $("#after_have").val());
				var feel_array = Array($("#before_feel").val(), $("#after_feel").val());
				var average_day_array = Array($("#before_average_day").val(), $("#after_average_day").val());
				var status_array = Array($("#before_status").val(), $("#after_status").val());
				before_and_after = Array(have_array, feel_array, average_day_array, status_array);

				// Update next view
				$("#before_have_text").html(before_and_after[0][0]);
				$("#after_have_text").html(before_and_after[0][1]);
				$("#before_feel_text").html(before_and_after[1][0]);
				$("#after_feel_text").html(before_and_after[1][1]);
				$("#before_average_day_text").html(before_and_after[2][0]);
				$("#after_average_day_text").html(before_and_after[2][1]);
				$("#before_status_text").html(before_and_after[3][0]);
				$("#after_status_text").html(before_and_after[3][1]);

				// Change views
				$("#step_title").html('Step 2 of 4: Generate Lead Magnet Idea');
				$(".progress-bar").css('width', '50%');
				$(".progress-bar").html('50%');
				$("#stepTwo").hide();
				$("#stepThree").fadeIn();

				// Move to top of screen
				window.scrollTo({ top: 0, behavior: 'smooth' });
			} else {
				// Display error
				$("#error_feedback").html('Please fill out all fields.');
				$("#error_feedback").show();
			}
		});

		$(".step_3_button").click(function() {
			// Get lead magnet type
			type = $(this).data('type');

			// Update next view
			$("#before_have_text_2").html(before_and_after[0][0]);
			$("#after_have_text_2").html(before_and_after[0][1]);
			$("#before_feel_text_2").html(before_and_after[1][0]);
			$("#after_feel_text_2").html(before_and_after[1][1]);
			$("#before_average_day_text_2").html(before_and_after[2][0]);
			$("#after_average_day_text_2").html(before_and_after[2][1]);
			$("#before_status_text_2").html(before_and_after[3][0]);
			$("#after_status_text_2").html(before_and_after[3][1]);
			
			// Change views
			var type_description;
			if (type == "report") {
				type_description = "<p class='mb-2'>The Report/Guide lead magnet type should solve a specific problem for your target audience. Ask yourself which specific problem your lead magnet idea is going to solve.</p>";
			} else if (type == "list") {
				type_description = "<p class='mb-2'>The Toolkit/Resource List lead magnet type should include tools and resources that solve a specific problem for your target audience. Think about which specific problem you can solve with a set of tools.</p>";
			} else if (type == "software") {
				type_description = "<p class='mb-2'>The Software Download/Trial lead magnet type should solve a specific problem your target audience is having. Think about a specific set of problems that you can solve with a software program.</p>";
			} else if (type == "cheatsheet") {
				type_description = "<p class='mb-2'>The Cheatsheet/Handout lead magnet type should have a specific shortcut to a problem for your target audience. Think about a specific system or process you use to solve a problem, you can turn that system into a Cheatsheet/Handout type lead magnet.</p>"
			} else if (type == "video") {
				type_description = "<p class='mb-2'>The Video lead magnet type should solve a specific problem for your target audience. Think about a specific problem that you can solve over a video or set of videos.</p>";
			} else if (type == "discount") {
				type_description = "<p class='mb-2'>The Discount/Free Shipping lead magnet type should promise a specific discount or offer. Do not try to make it vague. Use clear and concise wording and explain why there's a discount and for how long.</p>";
			} else if (type == "test") {
				type_description = "<p class='mb-2'>The Assessment/Test lead magnet type should help your target audience find their problems and also give them resources to help fix them. Think about how your target audience wants to improve.</p>";
			}
			$("#type_content").html(type_description);
			$("#type").html($(this).html());
			$("#step_title").html('Step 3 of 4: Polish Lead Magnet');
			$(".progress-bar").css('width', '75%');
			$(".progress-bar").html('75%');
			$("#stepThree").hide();
			$("#stepFour").fadeIn();

			// Move to top of screen
			window.scrollTo({ top: 0, behavior: 'smooth' });
		});

		$(".back_button").on('click', function() {
			$("#step_title").html('Step 2 of 4: Generate Lead Magnet Idea');
			$(".progress-bar").css('width', '50%');
			$(".progress-bar").html('50%');
			$("#stepFour").hide();
			$("#stepThree").fadeIn();
			$('html,body').animate({
			   scrollTop: $("#choices").offset().top
			});
		});

		$(".complete").on('click', function() {
			if ($("#title").val() != "" && $("#promise").val() != "" && $("#hook").val() != "") {
				// Hide error
				$("#complete_error").hide();

				// Create lead magnet object
				lead_magnet = Array($("#title").val(), $("#promise").val(), $("#hook").val());

				// Update views
				$("#display_title").html(lead_magnet[0]);
				$("#display_promise").html($("#promise").val());
				$("#display_hook").html($("#hook").val());

				// Change views
				$("#step_title").html('Step 4 of 4: Finish');
				$(".progress-bar").css('width', '100%');
				$(".progress-bar").html('100%');
				$("#stepFour").hide();
				$("#stepFinish").fadeIn();

				// Move to top of screen
				window.scrollTo({ top: 0, behavior: 'smooth' });
			} else {
				$("#complete_error").html("Please fill out all fields.");
				$("#complete_error").show();
			}
		});

		$(".uncomplete_button").on('click', function() {
			$("#step_title").html('Step 3 of 4: Polish Lead Magnet');
			$(".progress-bar").css('width', '75%');
			$(".progress-bar").html('75%');
			$("#stepFinish").hide();
			$("#stepFour").fadeIn();
			$('html,body').animate({
			   scrollTop: $("#polish_section").offset().top
			});
		});
	</script>
@endsection