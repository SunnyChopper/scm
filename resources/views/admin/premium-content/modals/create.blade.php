<div class="modal fade" id="create_content_modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Create New Premium Content</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group row">
						<div class="col-12">
							<h6 class="mb-2">Title:</h6>
							<input type="text" class="form-control" id="create_title">
						</div>
					</div>

					<div class="form-group row">
						<div class="col-12">
							<h6 class="mb-2">Description:</h6>
							<textarea id="create_description" class="form-control" rows="4"></textarea>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-12">
							<h6 class="mb-2">Image URL:</h6>
							<input type="text" class="form-control" id="create_image_url">
						</div>
					</div>

					<div class="form-group row">
						<div class="col-12">
							<h6 class="mb-2">File:</h6>
							<input type="file" id="create_file">
						</div>
					</div>

					<div class="form-group row">
						<div class="col-12">
							<h6 class="mb-2">Category:</h6>
							<input type="text" class="form-control" id="create_category">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-success create">Create</button>
				</div>
			</div>
		</form>
	</div>
</div>