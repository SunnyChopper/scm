@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div style="background-color: hsl(0, 0%, 97.5%);">
		<div class="container pt-64 pb-64">
			<div class="row" style="display: flex;">
				<div class="col-lg-6 col-md-6 col-sm-12 col-12" style="margin: auto;">
					<h3 class="mb-4">What Exactly Will I Get?</h3>
					<p class="mb-3">First, we will conduct <b><u>market research</u></b> to figure out what your target audience cares about. If we don't figure out what they care about, we won't be able to make a software that will get you more leads.</p>
					<p class="mb-3">Second, we create <b><u>software blueprints</u></b> so we can get you an accurate timeline of when things should be done. That way, everyone is being held accountable for their fair share of the work.</p>
					<p class="mb-3">Third, we <b><u>start to build the software</u></b> out on our local development servers. Once a stable working version of the code is created, we'll move the development to this website for seeing the progress live.</p>
					<p class="mb-3">Finally, we <b><u>deploy the software</u></b> to your website, run some tests, and get your final feedback. If there are any changes you want made, we will make them here.</p>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-12 col-12" style="margin: auto;">
					<img src="https://image.flaticon.com/icons/svg/1998/1998537.svg" class="regular-image-80 centered mt-32-mobile">
				</div>
			</div>
		</div>
	</div>

	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-12">
				<h2 class="text-center">Our Services</h2>
				<p class="text-center mt-3">Multiple methods to get more leads. Your choice.</p>
			</div>
		</div>

		<div class="row mt-64">
			<div class="col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="image-box-edge">
					<div class="set-bg image-box-image" data-setbg="https://www.impactbnd.com/hubfs/shutterstock_279336206-1.jpg"></div>
					<div class="image-box-info">
						<h4 class="text-center mb-3">Website Redesign</h4>
						<p class="text-center mb-3">If you have a website that does not look professional or does not fit the brand, you might be losing a lot of quality leads. We can help you fix that.</p>
						<h5 class="green text-center">$50/page</h5>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-12 col-12 mt-32-mobile">
				<div class="image-box-edge">
					<div class="set-bg image-box-image" data-setbg="https://content-static.upwork.com/blog/uploads/sites/3/2015/05/05084031/MOB_native-vs-web-app-whats-the-diff-which-do-i-need_M.png"></div>
					<div class="image-box-info">
						<h4 class="text-center mb-3">Website Application</h4>
						<p class="text-center mb-3">Present your visitors with a carefully designed and engineered progressive web application that turns visitors into quality leads.</p>
						<h5 class="green text-center">$1,000/mo/tool</h5>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-12 col-12 mt-32-mobile">
				<div class="image-box-edge">
					<div class="set-bg image-box-image" data-setbg="https://storage.googleapis.com/pg-assets/imager/storage_googleapis_com/pg-assets/pages/cards/OUR-FIRMS_CONSULTING2_600x400_d4542d6cf3989842eeaa56d3c4ee5abc.jpg	"></div>
					<div class="image-box-info">
						<h4 class="text-center mb-3">Software Consulting</h4>
						<p class="text-center mb-3">Already have a team of developers? Get the marketing, business, and technical skills transferred to your team to get quality leads.</p>
						<h5 class="green text-center">$1,500 one time</h5>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div style="background-color: hsl(0, 0%, 15%);">
		<div class="container pt-64 pb-64">
			<div class="row">
				<div class="col-12">
					<h2 class="text-center white">Ready to Make Money?</h2>
					<p class="text-center white mt-3" style="line-height: 1.25em;">Remember, we don't charge you a penny until we make you money. If you're ready to go, click the button below to apply to become one of our social media partners.</p>
					<a href="/apply" class="btn btn-primary mt-16 centered pl-4 pr-4">Apply Now</a>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		$(document).ready(function() {
			$('.set-bg').each(function() {
				var bg = $(this).data('setbg');
				console.log(bg);
				$(this).css('background-image', 'url(' + bg + ')');
			});
		});
	</script>
@endsection