<div class="modal fade" id="edit_lead_modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Lead Magnet Idea</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<input type="hidden" id="edit_lead_id">
				<div class="form-group row">
					<div class="col-12">
						<h5 class="mb-2">Lead Magnet Type:</h5>
						<p class="mb-1">Select one of the lead magnet types below. Make sure that you are solving a specific problem or delivering on a specific promise. Use your Before and After Matrix to figure out which problems you can solve.</p>
						<select class="form-control" id="edit_category">
							<option value="1">Report/Guide</option>
							<option value="2">Toolkit/Resource List</option>
							<option value="3">Software Download/Trial</option>
							<option value="4">Quiz/Survey</option>
							<option value="5">Cheatsheet/Handout</option>
							<option value="6">Video Training</option>
							<option value="7">Discount/Free Shipping</option>
							<option value="8">Assessment/Test</option>
						</select>
					</div>

					<div class="col-12 mt-32">
						<h5 class="mb-2">Title:</h5>
						<p class="mb-1">What specific problem are you solving? Use your Before and After Matrix to figure out which problems you can solve.</p>
						<input type="text" class="form-control" id="edit_title" placeholder="Title">
					</div>

					<div class="col-12 mt-32">
						<h5 class="mb-2">Promise:</h5>
						<p class="mb-1">What are you promising to your potential customer? Use your Before and After Matrix to figure out which promises you can make.</p>
						<input type="text" class="form-control" id="edit_promise" placeholder="Promise">
					</div>

					<div class="col-12 mt-32">
						<h5 class="mb-2">Hook:</h5>
						<p class="mb-1">Combine the specific problem you are solving and the promise you are making into a small hook.</p>
						<textarea rows="4" id="edit_hook" class="form-control" placeholder="Hook"></textarea>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success update_lead">Update</button>
			</div>
		</div>
	</div>
</div>