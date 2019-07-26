@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	@if(\App\Custom\ClientHelper::guest())
	@include('clients.tools.lmbk.modals.create-account')
	@endif

	@if(isset($before_and_after))
	@include('clients.tools.lmbk.modals.create')
	@include('clients.tools.lmbk.modals.edit')
	@include('clients.tools.lmbk.modals.delete')
	@endif

	<div class='container pt-64 pb-64'>
		<div class='row justify-content-center'>
			@if(isset($before_and_after) && (count($before_and_after) > 0))
				<div class='col-lg-8 col-md-8 col-sm-12 col-12'>
					<h3>Your Lead Magnets</h3>

					<div id="emptyView">
					</div>

					<ul id='lead_magnets' class='list-group mt-16'>

					</ul>
				</div>

				<div id='quick_action' class='col-lg-4 col-md-4 col-sm-12 col-12 mt-32-mobile' style="display: none;">
					<div class="gray-box">
						<h4 class="text-center mb-3">Quick Actions</h4>
						<button type="button" class="btn btn-primary full-width new_lead_button">Create New Lead Magnet</button>
					</div>
				</div>
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
										<button type="button" data-category="1" data-type="report" class="btn btn-primary centered full-width step_3_button">Report/Guide</button>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-6 col-12 mt-16-mobile">
										<button type="button" data-category="2" data-type="list" class="btn btn-primary centered full-width step_3_button">Tool/Resource List</button>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-6 col-12 mt-16-mobile">
										<button type="button" data-category="3" data-type="software" class="btn btn-primary centered full-width step_3_button">Software Download/Trial</button>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-6 col-12 mt-16-mobile">
										<button type="button" data-category="4" data-type="quiz" class="btn btn-primary centered full-width step_3_button">Quiz/Survey</button>
									</div>
								</div>

								<div class="row mt-16">
									<div class="col-lg-3 col-md-3 col-sm-6 col-12">
										<button type="button" data-category="5" data-type="cheatsheet" class="btn btn-primary centered full-width step_3_button">Cheatsheet/Handout</button>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-6 col-12 mt-16-mobile">
										<button type="button" data-category="6" data-type="video" class="btn btn-primary centered full-width step_3_button">Video Training</button>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-6 col-12 mt-16-mobile">
										<button type="button" data-category="7" data-type="discount" class="btn btn-primary centered full-width step_3_button">Discount/Free Shipping</button>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-6 col-12 mt-16-mobile">
										<button type="button" data-category="8" data-type="test" class="btn btn-primary centered full-width step_3_button">Assessment/Test</button>
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
							@if(\App\Custom\ClientHelper::guest())
							<div class="col-12">
								<h4>Don't Lose Your Work!</h4>
								<hr />
								<p class="mb-3">After you leave this page, all your work is going to be gone. If you want to save your work, share it with colleagues or generate more ideas, click the button below to create your free account and get access to tools like these and many more.</p>
								<button class="btn btn-primary create_account_button">Create Free Account</button>
							</div>
							@else
							<div class="col-12">
								<h1 class="text-center mb-3">Congrats!</h1>
								<h5 class="text-center">You've created your first lead magnet idea! Now it's time to implement!</h5>
								<p class="text-center">Want to create more lead magnet ideas? Click the button below.</p>
								<a href="{{ url('/clients/tools/lead-builder') }}" class="btn btn-primary centered">Create More Lead Magnets</a>
							</div>
							@endif
						</div>

						<div class="row mt-32">
							<div class="col-12">
								<ul class="list-group">
									<li class="list-group-item">
										<h3 class="mb-1" id="display_title"></h3>
										<p class="mb-0"><b>Promise: </b> <span id="display_promise"></span></p>
										<p class="mb-0"><b>Hook: </b> <span id="display_hook"></span></p>
										@if(\App\Custom\ClientHelper::guest())
										<button class="btn btn-primary btn-sm uncomplete_button">Back to Polishing Lead Magnet</button>
										@endif
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			@endif
		</div>
	</div>

	@if(isset($before_and_after) && count($before_and_after) > 0)
	<div style="background: hsl(0, 0%, 95%);">
		<div class="container pt-64 pb-64">
			<div class="row">
				<div class="col-12">
					<h2 class="text-center">Before and After Matrix</h2>
				</div>
			</div>

			<div class="row mt-32">
				<div class="col-12">
					<div style="overflow: auto;">
						@foreach($before_and_after as $baa)
						<table class="table table-striped" style="min-width: 800px;">
							<thead>
								<tr>
									<th></th>
									<th>Before</th>
									<th>After</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td style="vertical-align: middle;"><strong>Have</strong></td>
									<td style="vertical-align: middle;"><textarea id="update_before_have" class="form-control">{{ $baa->before_have }}</textarea></td>
									<td style="vertical-align: middle;"><textarea id="update_after_have" class="form-control">{{ $baa->after_have }}</textarea></td>
								</tr>

								<tr>
									<td style="vertical-align: middle;"><strong>Feel</strong></td>
									<td style="vertical-align: middle;"><textarea id="update_before_feel" class="form-control">{{ $baa->before_feel }}</textarea></td>
									<td style="vertical-align: middle;"><textarea id="update_after_feel" class="form-control">{{ $baa->after_feel }}</textarea></td>
								</tr>

								<tr>
									<td style="vertical-align: middle;"><strong>Average Day</strong></td>
									<td style="vertical-align: middle;"><textarea id="update_before_day" class="form-control">{{ $baa->before_day }}</textarea></td>
									<td style="vertical-align: middle;"><textarea id="update_after_day" class="form-control">{{ $baa->after_day }}</textarea></td>
								</tr>

								<tr>
									<td style="vertical-align: middle;"><strong>Status</strong></td>
									<td style="vertical-align: middle;"><textarea id="update_before_status" class="form-control">{{ $baa->before_status }}</textarea></td>
									<td style="vertical-align: middle;"><textarea id="update_after_status" class="form-control">{{ $baa->after_status }}</textarea></td>
								</tr>
							</tbody>
						</table>
						@endforeach
					</div>

					<input type="hidden" id="update_baa_id" value="{{ $before_and_after[0]->id }}">
					<p id="baa_feedback" class="text-center" style="display: none;"></p>
					<button type="button" class="btn btn-success mt-32 centered update_baa_button">Update Before and After Matrix</button>	
				</div>
			</div>
		</div>
	</div>
	@endif
@endsection

@section('page_js')
	<script type='text/javascript'>
		/* ----------------------- *\
			Global Variables
		\* ----------------------- */
		@if(\App\Custom\ClientHelper::guest() == false)
		var user_id = {{ \App\Custom\ClientHelper::getID() }};
		var guest = false;
		@else
		var guest = true;
		@endif
		var _token = '{{ csrf_token() }}';
		var before_and_after = Array();
		var lead_magnet = Array();
		var type = "";
		var type_category = 0;

		/* ----------------------- *\
			Helper Functions
		\* ----------------------- */

		function displayCards() {
			var html = ``;

			lead_magnet.forEach(function(lead) {
				html += `
					<li class='list-group-item'>
						<div class="row" style="display: flex;">
							<div class="col-lg-8 col-md-8 col-sm-12 col-12" style="margin: auto;">
								<h4 class='mb-0'>` + lead["title"] + `</h4>
								<p class='mb-1'><small><strong>Category: </strong>`;

								switch(lead["category"]) {
									case 1:
										html += "Report/Guide";
										break;
									case 2:
										html += "Tool/Resource List";
										break;
									case 3:
										html += "Software Download/Trial";
										break;
									case 4:
										html += "Quiz/Survey";
										break;
									case 5:
										html += "Cheatsheet/Handout";
										break;
									case 6:
										html += "Video Training";
										break;
									case 7:
										html += "Discount/Free Shipping";
										break;
									case 8:
										html += "Assessment/Test";
										break;
									default:
										break;
								}

				html +=			`</small></p>
								<p class='black mb-0'><strong>Promise: </strong> ` + lead["promise"] + `</p>
								<p class='black mb-0'><strong>Hook: </strong> ` + lead["hook"] + `</p>
							</div>

							<div class="col-lg-4 col-md-4 col-sm-12 col-12" style="margin: auto;">
								<button type="button" data-id="` + lead["id"] + `" class="btn btn-danger mobile-full-width delete_lead_button m-1 mt-16-mobile" style="float: right;">Delete</button>
								<button type="button" data-id="` + lead["id"] + `" class="btn btn-warning mobile-full-width edit_lead_button m-1" style="float: right;">Edit</button>
							</div>
						</div>
					</li>
				`;
			});

			$("#lead_magnets").html(html);
			$("#emptyView").hide();
			$("#quick_action").show();
		}

		function displayEmpty() {
			var html = `
				<div class="gray-box mt-32">
					<h3 class="text-center mb-2">No Ideas Found</h3>
					<p class="text-center mb-3">Seems like you've completed the Before and After Matrix, however, haven't created any ideas. Click below to create your first lead magnet idea.</p>
					<button type="button" class="btn btn-primary centered new_lead_button">Create New Lead Magnet</button>
				</div>
			`;

			$("#quick_action").hide();
			$("#emptyView").html(html);
		}

		function updateUI() {
			if (lead_magnet.length > 0) {
				displayCards();
			} else {
				displayEmpty();
			}
		}

		function getLeadMagnets() {
			$.ajax({
				url : '/api/lead-ideas',
				type : 'GET',
				data : {
					'user_id' : user_id
				},
				success : function(data) {
					lead_magnet = data;
					updateUI();
				}
			});
		}

		function validateStepTwo() {
			if ($("#before_have").val() != "" && $("#after_have").val() != "" && $("#before_feel").val() != "" && $("#after_feel").val() != "" && $("#before_average_day").val() != "" && $("#after_average_day").val() != "" && $("#before_status").val() != "" && $("#after_status").val() != "") {
				return true;
			} else {
				return false;
			}
		}

		function isValidEmailAddress(emailAddress) {
		    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
		    return pattern.test(emailAddress);
		}

		/* ----------------------- *\
			Text Functions
		\* ----------------------- */

		$("#create_email").on('change', function() {
			var button = $(this);
			var email = $(this).val();

			if (isValidEmailAddress(email)) {
				$.ajax({
					url : '/api/clients/email/check',
					type : 'GET',
					data : {
						'email' : email
					},
					success : function(data) {
						if (data == false) {
							button.css('border', '1px solid red');
							$(".create_account").attr('disabled', true);
							$("#email_error").show();
						} else {
							button.css('border', '1px solid green');
							$(".create_account").attr('disabled', false);
							$("#email_error").hide();
						}
					}
				});
			}
		});

		$("#create_password").on('keyup', function() {
			$("#password_display").html("<strong>Password: </strong>" + $(this).val());
		});

		/* ----------------------- *\
			Dynamic Button Bindings
		\* ----------------------- */

		$(document).on('click', '.new_lead_button', function() {
			$("#create_lead_modal").modal();
		});

		$(document).on('click', '.delete_lead_button', function() {
			$("#delete_lead_id").val($(this).data('id'));
			$("#delete_lead_modal").modal();
		});

		$(document).on('click', '.edit_lead_button', function() {
			var lead_id = $(this).data('id');
			$.ajax({
				url : '/api/lead-idea/read',
				type : 'GET',
				data : {
					'lead_id' : lead_id
				},
				success : function(data) {
					$("#edit_lead_id").val(lead_id);
					$("#edit_category").val(data["category"]);
					$("#edit_title").val(data["title"]);
					$("#edit_promise").val(data["promise"]);
					$("#edit_hook").html(data["hook"]);
					$("#edit_lead_modal").modal();
				}
			});
		});

		$(document).on('click', '.create_account_button', function() {
			$("#create_account_modal").modal();
		});

		$(document).ready(function() {
			@if(isset($before_and_after))
			getLeadMagnets();
			@endif
		});

		/* ----------------------- *\
			Button Bindings
		\* ----------------------- */

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

		$(".complete").unbind().on('click', function() {
			if ($("#title").val() != "" && $("#promise").val() != "" && $("#hook").val() != "") {
				// Hide error
				$("#complete_error").hide();

				// Get variables
				var title = $("#title").val();
				var promise = $("#promise").val();
				var hook = $("#hook").val();

				// Create lead magnet object
				lead_magnet = Array($("#title").val(), $("#promise").val(), $("#hook").val());

				// Update views
				$("#display_title").html(lead_magnet[0]);
				$("#display_promise").html($("#promise").val());
				$("#display_hook").html($("#hook").val());

				if (guest == false) {
					$.ajax({
						url : '/api/lead-idea/create',
						type : 'POST',
						data : {
							'_token' : _token,
							'user_id' : user_id,
							'title' : title,
							'promise' : promise,
							'hook' : hook,
							'category' : type_category
						},
						success: function(data) {
							// Change views
							$("#step_title").html('Step 4 of 4: Finish');
							$(".progress-bar").css('width', '100%');
							$(".progress-bar").html('100%');
							$("#stepFour").hide();
							$("#stepFinish").fadeIn();

							// Move to top of screen
							window.scrollTo({ top: 0, behavior: 'smooth' });
						}
					});
				} else {
					// Change views
					$("#step_title").html('Step 4 of 4: Finish');
					$(".progress-bar").css('width', '100%');
					$(".progress-bar").html('100%');
					$("#stepFour").hide();
					$("#stepFinish").fadeIn();

					// Move to top of screen
					window.scrollTo({ top: 0, behavior: 'smooth' });
				}
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

		$(".create_lead").unbind().on('click', function() {
			$.ajax({
				url : '/api/lead-idea/create',
				type : 'POST',
				data : {
					'_token' : _token,
					'user_id' : user_id,
					'category' : $("#create_category").val(),
					'title' : $("#create_title").val(),
					'promise' : $("#create_promise").val(),
					'hook' : $("#create_hook").val()
				},
				success : function(data) {
					if (data == true) {
						$("#create_title").val('');
						$("#create_promise").val('');
						$("#create_hook").val('');
						$("#create_lead_modal").modal('hide');
						getLeadMagnets();
					}
				}
			});
		});

		$(".delete_lead").unbind().on('click', function() {
			$.ajax({
				url : '/api/lead-idea/delete',
				type : 'POST',
				data : {
					'_token' : _token,
					'lead_id' : $("#delete_lead_id").val()
				},
				success : function(data) {
					if (data == true) {
						getLeadMagnets();
						$("#delete_lead_modal").modal('hide');
					}
				}
			});
		});

		$(".update_lead").unbind().on('click', function() {
			$.ajax({
				url : '/api/lead-idea/update',
				type : 'POST',
				data : {
					'_token' : _token,
					'lead_id' : $("#edit_lead_id").val(),
					'category' : $("#edit_category").val(),
					'title' : $("#edit_title").val(),
					'promise' : $("#edit_promise").val(),
					'hook' : $("#edit_hook").html()
				},
				success : function(data) {
					if (data == true) {
						getLeadMagnets();
						$("#edit_lead_modal").modal('hide');
					}
				}
			});
		});

		$(".update_baa_button").unbind().on('click', function() {
			$.ajax({
				url : '/api/baa/update',
				type : 'POST',
				data : {
					'_token' : _token,
					'baa_id' : $("#update_baa_id").val(),
					'before_have' : $("#update_before_have").val(),
					'after_have' : $("#update_after_have").val(),
					'before_feel' : $("#update_before_feel").val(),
					'after_feel' : $("#update_after_feel").val(),
					'before_average_day' : $("#update_before_day").val(),
					'after_average_day' : $("#update_after_day").val(),
					'before_status' : $("#update_before_status").val(),
					'after_status' : $("#update_after_status").val()
				},
				success : function(data) {
					if (data == true) {
						$("#baa_feedback").html('Successfully updated your Before and After Matrix.');
						$("#baa_feedback").addClass('green');
						$("#baa_feedback").show();
					}
				}
			});
		});

		$(".create_account").unbind().on('click', function() {
			// Validate input
			if ($("#create_first_name").val() != "" && $("#create_email").val() != "" && $("#create_password").val() != "") { 

			// Create the account first
			$.ajax({
				url : '/api/clients/create',
				type : 'POST',
				data : {
					'_token' : _token,
					'first_name' : $("#create_first_name").val(),
					'last_name' : $("#create_last_name").val(),
					'email' : $("#create_email").val(),
					'password' : $("#create_password").val()
				},
				success : function(data) {
					if (data != false) {
						user_id = data;

						// Move onto saving before and after
						$.ajax({
							url : '/api/baa/create',
							type : 'POST',
							data : {
								'_token' : _token,
								'user_id' : user_id,
								'before_have' : before_and_after[0][0],
								'after_have' : before_and_after[0][1],
								'before_feel' : before_and_after[1][0],
								'after_feel' : before_and_after[1][1],
								'before_average_day' : before_and_after[2][0],
								'after_average_day' : before_and_after[2][1],
								'before_status' : before_and_after[3][0],
								'after_status' : before_and_after[3][1]
							},
							success : function(data) {
								if (data == true) {
									// Move into saving lead magnet
									$.ajax({
										url : '/api/lead-idea/create',
										type : 'POST',
										data : {
											'_token' : _token,
											'user_id' : user_id,
											'category' : type_category,
											'title' : lead_magnet[0],
											'promise' : lead_magnet[1],
											'hook' : lead_magnet[2]
										},
										success : function(data) {
											if (data == true) {
												// Finally...
												$("#create_account_feedback").html("Your account has been successfully created. Redirecting you to your dashboard...");
												$("#create_account_feedback").addClass('green');
												$("#create_account_feedback").removeClass('red');
												$("#create_account_feedback").show();

												setTimeout(function() { 
											        window.location.href = "{{ url('/clients/dashboard/') }}"
											    }, 2000);
											}
										}
									});
								}
							}
						});
					}
				}
			});
			} else {
				$("#create_account_feedback").html("Please fill out all required fields.");
				$("#create_account_feedback").addClass('red');
				$("#create_account_feedback").removeClass('green');
				$("#create_account_feedback").show();
			}
		});

		/* ----------------------- *\
			Step Functions
		\* ----------------------- */

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

		$("#step_2_button").unbind().on('click', function() {
			if (validateStepTwo() == true) {
				// Hide feedback
				$("#error_feedback").hide();

				// Get variables
				var before_have = $("#before_have").val();
				var after_have = $("#after_have").val();
				var before_feel = $("#before_feel").val();
				var after_feel = $("#after_feel").val();
				var before_average_day = $("#before_average_day").val();
				var after_average_day = $("#after_average_day").val();
				var before_status = $("#before_status").val();
				var after_status = $("#after_status").val();

				// Create before and after object
				var have_array = Array(before_have, after_have);
				var feel_array = Array(before_feel, after_feel);
				var average_day_array = Array(before_average_day, after_average_day);
				var status_array = Array(before_status, after_status);
				before_and_after = Array(have_array, feel_array, average_day_array, status_array);

				// Update next view
				$("#before_have_text").html(before_have);
				$("#after_have_text").html(after_have);
				$("#before_feel_text").html(before_feel);
				$("#after_feel_text").html(after_feel);
				$("#before_average_day_text").html(before_average_day);
				$("#after_average_day_text").html(after_average_day);
				$("#before_status_text").html(before_status);
				$("#after_status_text").html(after_status);

				if (guest == false) {
					$.ajax({
						url : '/api/baa/create',
						type : 'POST',
						data : {
							'_token' : _token,
							'user_id' : user_id,
							'before_have' : before_have,
							'after_have' : after_have,
							'before_feel' : before_feel,
							'after_feel' : after_feel,
							'before_average_day' : before_average_day,
							'after_average_day' : after_average_day,
							'before_status' : before_status,
							'after_status' : after_status
						},
						success: function(data) {
							// Change views
							$("#step_title").html('Step 2 of 4: Generate Lead Magnet Idea');
							$(".progress-bar").css('width', '50%');
							$(".progress-bar").html('50%');
							$("#stepTwo").hide();
							$("#stepThree").fadeIn();

							// Move to top of screen
							window.scrollTo({ top: 0, behavior: 'smooth' });
						}
					});
				} else {
					// Change views
					$("#step_title").html('Step 2 of 4: Generate Lead Magnet Idea');
					$(".progress-bar").css('width', '50%');
					$(".progress-bar").html('50%');
					$("#stepTwo").hide();
					$("#stepThree").fadeIn();

					// Move to top of screen
					window.scrollTo({ top: 0, behavior: 'smooth' });
				}
			} else {
				// Display error
				$("#error_feedback").html('Please fill out all fields.');
				$("#error_feedback").show();
			}
		});

		$(".step_3_button").click(function() {
			// Get lead magnet type
			type = $(this).data('type');
			type_category = $(this).data('category');

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

	</script>
@endsection