@extends('layouts.app')

@section('content')
	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-12">
				<h3 class="text-center">Clients</h3>
				<hr />
				<ul class="list-group">
					<li class="list-group-item">
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-12 col-12">
								<h4 class="mb-0">Billionaires Drive</h4>
								<p class="mb-0"><small>Last logged in on March 14th, 2019 at 3:53 PM</small></p>
							</div>

							<div class="col-lg-4 col-md-4 col-sm-12 col-12">
								<a href="" class="genric-btn primary rounded right-button mobile-left-button">Edit</a>
							</div>
						</div>
					</li>

					<li class="list-group-item">
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-12 col-12">
								<h4 class="mb-0">Billion Dollars Motivation</h4>
								<p class="mb-0"><small>Last logged in on March 13th, 2019 at 12:01 PM</small></p>
							</div>

							<div class="col-lg-4 col-md-4 col-sm-12 col-12">
								<a href="" class="genric-btn primary rounded right-button mobile-left-button">Edit</a>
							</div>
						</div>
					</li>
				</ul>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-64-mobile">
				<div class="gray-box">
					<h3 class="text-center">New Log Event</h3>
					<hr />
					<form>
						<div class="form-group">
							<label>Select client:</label>
							<select class="form-control">
								<option>Billionaires Drive</option>
							</select>
						</div>

						<div class="form-group">
							<label>Title:</label>
							<input type="text" name="title" class="form-control" required>
						</div>

						<div class="form-group">
							<label>Description:</label>
							<textarea class="form-control" rows="6"></textarea>
						</div>

						<div class="form-group">
							<input type="submit" class="centered primary_btn pl-4 pr-4" value="Create Log Event">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection