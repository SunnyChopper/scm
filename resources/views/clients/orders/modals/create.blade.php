<div class="modal fade" id="create_invoice_modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Create New Order</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<h6 class="mb-2">First Name:</h6>
							<input type="text" class="form-control" value="{{ $client->first_name }}" id="create_first_name">
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-16-mobile">
							<h6 class="mb-2">Last Name:</h6>
							<input type="text" class="form-control" value="{{ $client->last_name }}" id="create_last_name">
						</div>
					</div>

					<div class="form-group row">
						<div class="col-12">
							<h6 class="mb-2">Email:</h6>
							<input type="email" class="form-control" value="{{ $client->email }}" id="create_email">
						</div>
					</div>

					<div class="form-group row">
						<div class="col-12">
							<h6 class="mb-2">Website:</h6>
							<input type="url" class="form-control" id="create_website">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-success create">Next Step</button>
				</div>
			</div>
		</form>
	</div>
</div>