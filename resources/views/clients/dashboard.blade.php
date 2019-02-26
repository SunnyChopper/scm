@extends('layouts.app')

@section('content')
	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-12">
				<h3 class="text-center">Tasks</h3>
				<hr />
				<ul class="list-group">
					<li class="list-group-item">
						<h5 class="mb-0">Creating Website Wireframe</h5>
						<p class="mb-0">Creating a rough draft of the website with wireframe objects.</p>
						Status: <span class="badge badge-warning mb-0 ml-1">In Progress</span>
					</li>
				</ul>
				<a class="primary_btn centered pl-4 pr-4 mt-16">Request Task</a>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="gray-box">
					<h3 class="text-center">Log Events</h3>
					<ul class="list-group">
						<li class="list-group-item">
							<h5>Getting ready to launch</h5>
							<p class="mb-0">I will be wrapping things up soon and getting things ready for launch. If you want to change anything before we launch, be sure to contact me.</p>
							<p class="mb-0"><small>February 26th, 2019</small></p>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection