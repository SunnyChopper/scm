@extends('layouts.app')

@section('content')
	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-12 col-12">
				<h3>Contact Us</h3>
				<p>Fields with <span class="red">*</span> are required.</p>
				<hr />
				<form id="contact_form">
					<div class="gray-box">
						<div class="form-group">
							<label>Name<span class="red">*</span>:</label>
							<input type="text" name="name" class="form-control" required>
						</div>

						<div class="form-group">
							<label>Email<span class="red">*</span>:</label>
							<input type="email" name="email" class="form-control" required>
						</div>

						<div class="form-group">
							<label>Subject:</label>
							<input type="text" name="subject" class="form-control">
						</div>

						<div class="form-group">
							<label>Message<span class="red">*</span>:</label>
							<textarea class="form-control" name="message" form="contact_form" rows="6"></textarea>
						</div>

						<div class="form-group">
							<input type="submit" class="genric-btn primary rounded centered" value="Submit Form"> 
						</div>
					</div>
				</form>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-12 col-12 mt-32-mobile">
				<h3>Social Links</h3>
				<h4><a href=""><i class="fab fa-facebook mr-2"></i> Facebook</a></h4>
				<h4><a href=""><i class="fab fa-twitter mr-2"></i> Twitter</a></h4>
				<h4><a href=""><i class="fab fa-instagram mr-2"></i> Instagram</a></h4>
				<h4><a href=""><i class="fab fa-youtube mr-2"></i> YouTube</a></h4>
			</div>
		</div>
	</div>
@endsection