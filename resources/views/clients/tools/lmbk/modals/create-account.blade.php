<div class="modal fade" id="create_account_modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Create Your Free Account</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<p class="mb-3">Fields with <span class="red">*</span> are required.</p>

				<div class="form-group row">
					<div class="col-lg-6 col-md-6 col-sm-12 col-12">
						<h6 class="mb-1">First Name: <span class="red">*</span></h6>
						<input type="text" id="create_first_name" class="form-control">
					</div>

					<div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-32-mobile">
						<h6 class="mb-1">Last Name:</h6>
						<input type="text" id="create_last_name" class="form-control">
					</div>
				</div>

				<div class="form-group row mt-32">
					<div class="col-12">
						<h6 class="mb-1">Company Name:</h6>
						<input type="text" id="create_company_name" class="form-control">
					</div>
				</div>

				<div class="form-group row mt-32">
					<div class="col-12">
						<h6 class="mb-1">Email: <span class="red">*</span></h6>
						<input type="email" id="create_email" class="form-control">
						<p id="email_error" class="red" style="display: none;"><small>Email is already in use.</small></p>
					</div>
				</div>

				<div class="form-group row mt-32">
					<div class="col-12">
						<h6 class="mb-1">Password: <span class="red">*</span></h6>
						<input type="password" id="create_password" class="form-control">
						<p><small id="password_display"></small></p>
					</div>
				</div>

				<p class="text-center" id="create_account_feedback" style="display: none;"></p> 
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success create_account">Create</button>
			</div>
		</div>
	</div>
</div>