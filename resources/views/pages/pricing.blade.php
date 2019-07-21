@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-12">
				<h2 class="text-center">How Much Does It Cost?</h2>
				<p class="text-center mt-3">You don't pay a single penny until you make money. Click below to apply to become a partner.</p>
				<a href="{{ url('/apply') }}" class="btn btn-primary mt-16 pl-4 pr-4 centered">Apply Now</a>
			</div>
		</div>
	</div>

	<div style="background-color: hsl(0, 0%, 97.5%);">
		<div class="container pt-64 pb-64">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 col-12">
					<h3>How does it all work?</h3>
					<p>Our mindset is that if you win, we win as well. That's why we've structured our pricing the way it is. You don't pay a single penny until we make you money.</p>
					<p>When you become a partner with SunnyChopper Media, we will agree on how to split up the revenue. For example, if we agree to split revenue 50/50, that means whatever money we generate for you from our direct efforts, you get 50% of it and we get 50% of it. So if we were to create you a mobile application that has a monthly revenue of $50,000, then you take home $25,000 and we take home $25,000 as well.</p>
					<p>We can further agree on partitioning money for investing in the business. So if that same app is making $50,000 per month and we agree that we will partition 10% of the revenue for marketing, then $5,000 will go towards marketing and then the rest, $45,000, will be split 50% both ways.</p>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-12 col-12">
					<img src="http://www.kiplinger.com/slideshow/saving/T065-S001-11-more-ways-to-get-extra-cash/images/intro.jpg" class="regular-image-100">
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