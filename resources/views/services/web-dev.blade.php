@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<h2 class="text-center">Why Do I Need A Website?</h2>
				<p class="text-center mt-3">Monetizing your brand means that you need a central location where you can distribute your content, products, and services. This is where web development comes in handy. Even if you don't need a website, having a web server can prove to be extremely helpful when you want to start selling products.</p>
			</div>
		</div>
	</div>

	<div style="background: hsl(0, 0%, 97.5%);">
		<div class="container pt-64 pb-64">
			<div class="row">
				<div class="col-12">
					<h2 class="text-center">How We Can Help You</h2>
				</div>
			</div>

			<div class="row mt-64">
				<div class="col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="icon-box">
						<i class="fas fa-signal centered mb-32" style="font-size: 3em;"></i>
						<h3 class="text-center mt-16 mb-3">Scalable Systems</h3>
						<p class="text-center">No matter how much traffic you send to your website, your server will not crash. We design our systems based on proven principles that allow you to send as much traffic with little to no effect on user experience.</p>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-12 col-12 mt-32-mobile">
					<div class="icon-box">
						<i class="fas fa-lock centered mb-32" style="font-size: 3em;"></i>
						<h3 class="text-center mt-16 mb-3">SSL Secured</h3>
						<p class="text-center">We care about protecting you from malicious hacks and we care about your customer's privacy. Every website and app we build is secured with a 256 bit SSL. Security of your information is our priority.</p>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-12 col-12 mt-32-mobile">
					<div class="icon-box">
						<i class="fas fa-database centered mb-32" style="font-size: 3em;"></i>
						<h3 class="text-center mt-16 mb-3">Easy-to-Use API</h3>
						<p class="text-center">In order to quickly engineer websites and mobile apps for you, we take our time to build out an API from the ground up. This means that we can quickly deploy your website or app to multiple devices.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-12">
				<h2 class="text-center">How We've Helped Others Before You</h2>
			</div>
		</div>

		<div class="row mt-32" style="display: flex;">
			<div class="col-lg-5 col-md-6 col-sm-12 col-12" style="margin: auto;">
				<img src="https://www.variety.org.au/sa/wp-content/uploads/2016/06/placeholder.png" class="regular-image-100">
			</div>

			<div class="col-lg-7 col-md-6 col-sm-12 col-12" style="margin: auto;">
				<h3 class="mt-32-mobile">Law of Ambition</h3>
				<p>Luis needed a website where he can take orders for his merchandise, distribute content, setup marketing funnels, monitor analytics, give user control to his site and much more. We built the website using Laravel and hosted it in the cloud using Amazon Web Services. Without having to leave his site, he could monitor things such as product views, which products got added to cart and how many actually followed through to buy. This gives him deeper insight on which products to promote.</p>
				<a href="https://www.lawofambition.com" class="btn btn-primary">View Website</a>
			</div>
		</div>

		<div class="row mt-32" style="display: flex;">
			<div class="col-lg-5 col-md-6 col-sm-12 col-12" style="margin: auto;">
				<img src="https://www.variety.org.au/sa/wp-content/uploads/2016/06/placeholder.png" class="regular-image-100">
			</div>

			<div class="col-lg-7 col-md-6 col-sm-12 col-12" style="margin: auto;">
				<h3 class="mt-32-mobile">BillionairesDrive</h3>
				<p>After conducting market research, we figured out that the audience was interested in learning how to start an online Instagram business. So we designed and built the website to help his audience do exactly that. Much like WordPress, there can be multiple administrator accounts that can write their own blog posts. There are also integrated software tools on the site as well as something called a Content Bank which helps users share and re-use content without having to worry about copyright issues.</p>
				<a href="https://www.billionairesdrive.com" class="btn btn-primary">View Website</a>
			</div>
		</div>
	</div>

	<div style="background: hsl(0, 0%, 5%);">
		<div class="container pt-64 pb-64">
			<div class="row">
				<div class="col-12">
					<h2 class="text-center white">Ready to Make Money?</h2>
					<p class="text-center white">Remember, we don't charge you a penny until we make you money. If you're ready to go, click the button below to apply to become one of our social media partners. If selected, we'll start the process of developing a scalable website and/or mobile app.</p>
					<a href="/apply" class="primary_btn centered pl-4 pr-4">Apply Now</a>
				</div>
			</div>
		</div>
	</div>
@endsection