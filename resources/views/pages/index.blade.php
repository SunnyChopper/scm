@extends('layouts.app')

@section('content')
	@include('layouts.home-banner')

	<div class="container mt-64 mb-64">
		<div class="row">
			<div class="col-12">
				<h2 class="text-center">How We Can Help You</h2>
				<hr />
			</div>
		</div>

		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="icon-box p-32 text-center">
					<i class="fas fa-cogs"></i>
					<h4 class="mt-16">Business Systems</h4>
					<p class="mb-0 mt-16">We will apply proven real-world business systems to help you start making money.</p>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="icon-box p-32 text-center">
					<i class="fas fa-code"></i>
					<h4 class="mt-16">Development Services</h4>
					<p class="mb-0 mt-16">To best help our partners, we include professional development services for free.</p>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="icon-box p-32 text-center">
					<i class="fas fa-money-bill"></i>
					<h4 class="mt-16">Scaling Pricing</h4>
					<p class="mb-0 mt-16">You don't pay a single penny until our services work. That means no risk for you.</p>
				</div>
			</div>
		</div>
	</div>
@endsection