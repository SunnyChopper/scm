@extends('layouts.app')

@section('content')
	@include('layouts.banner')
	@include('admin.premium-content.modals.create')
	@include('admin.premium-content.modals.edit')
	@include('admin.premium-content.modals.delete')

	<div class="container pt-64 pb-64">
		<div id="app" class="row justify-content-center">

		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		var content = Array();
		var _token = '{{ csrf_token() }}';

		/* ------------------------- *\
			Helper functions
		\* ------------------------- */

		function displayContentTable() {
			var html = `
				<div class="col-lg-8 col-md-8 col-sm-12 col-12">
					<div style="overflow: auto;">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Title</th>
									<th>Category</th>
									<th>Downloads</th>
									<th></th>
								</tr>
							</thead>
							<tbody>`;

			content.forEach(function(element) {
				html += `
					<tr>
						<td>` + element["title"] + `</td>
						<td>` + element["category"] + `</td>
						<td>` + element["downloads"] + `</td>
						<td>
							<button data-id="` + element["id"] + `" class="btn btn-sm btn-danger delete_content_button m-1" style="float: right;">Delete</button>
							<button data-id="` + element["id"] + `" class="btn btn-sm btn-warning edit_content_button m-1" style="float: right;">Edit</button>
						</td>
					</tr>
				`;
			});

			html +=			`</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-12 col-12 mt-32-mobile">
					<div class="gray-box">
						<h4 class="mb-3 text-center">Quick Actions</h4>
						<button type="button" class="btn btn-primary full-width new_content_button">Create New Premium Content</button>
					</div>
				</div>
			`;

			$("#app").html(html);
		}

		function displayEmptyView() {
			var html = 	`
				<div class="col-lg-7 col-md-8 col-sm-12 col-12">
					<div class="gray-box">
						<h3 class="text-center m-2">No Premium Content</h3>
						<p class="text-center mb-2">There is no premium content available on the site. Click below to create the first piece of premium content.</p>
						<button class="new_content_button btn btn-primary centered">Create New Premium Content</button>
					</div>
				</div>
			`;

			$("#app").html(html);
		}

		function updateUI() {
			if (content.length > 0) {
				displayContentTable();
			} else { 
				displayEmptyView();
			}
		}

		function getContent() {
			$.ajax({
				url : '/api/premium',
				type : 'GET',
				success : function(data) {
					content = data;
					updateUI();
				}
			});
		}

		/* ------------------------- *\
			Static button bindings
		\* ------------------------- */

		$(".create").unbind().on('click', function() {
			// Get form fields
			var title = $("#create_title").val();
			var description = $("#create_description").val();
			var image_url = $("#create_image_url").val();
			var file = $("#create_file")[0].files[0];
			var category = $("#create_category").val();

			// Create form data
			var form = new FormData();
			form.append('_token', _token);
			form.append('title', title);
			form.append('description', description);
			form.append('image_url', image_url);
			form.append('file', file);
			form.append('category', category);

			// Create AJAX request
			$.ajax({
				url : '/api/premium/create',
				type : 'POST',
				data : form,
				cache : false,
				contentType : false,
				processData : false,
				success : function(data) {
					if (data == true) {
						$("#create_title").val('');
						$("#create_description").val('');
						$("#create_image_url").val('');
						$("#create_category").val('');
						$("#create_file").val('');
						$("#create_category").val('');
						$("#create_content_modal").modal('hide');
						getContent();
					}
				}
			});
		});

		$(".edit").unbind().on('click', function() {
			// Get form fields
			var content_id = $("#edit_content_id").val();
			var title = $("#edit_title").val();
			var description = $("#edit_description").val();
			var image_url = $("#edit_image_url").val();
			var file = $("#edit_file")[0].files[0];
			var category = $("#edit_category").val();

			// Create form data
			var form = new FormData();
			form.append('_token', _token);
			form.append('content_id', content_id);
			form.append('title', title);
			form.append('description', description);
			form.append('image_url', image_url);
			form.append('file', file);
			form.append('category', category);

			// Create AJAX request
			$.ajax({
				url : '/api/premium/update',
				type : 'POST',
				data : form,
				cache : false,
				contentType : false,
				processData : false,
				success : function(data) {
					if (data == true) {
						$("#edit_content_modal").modal('hide');
						getContent();
					}
				}
			});
		});

		$(".delete").unbind().on('click', function() {
			$.ajax({
				url : '/api/premium/delete',
				type : 'POST',
				data : {
					'_token' : _token,
					'content_id' : $("#delete_content_id").val()
				},
				success : function(data) {
					if (data == true) {
						getContent();
						$("#delete_content_modal").modal('hide');
					}
				}
			});
		});


		/* ------------------------- *\
			Dynamic button bindings
		\* ------------------------- */

		$(document.body).on('click', '.new_content_button', function() {
			$("#create_content_modal").modal();
		});

		$(document.body).on('click', '.delete_content_button', function() {
			var id = $(this).data('id');
			$("#delete_content_id").val(id);
			$("#delete_content_modal").modal();
		});

		$(document.body).unbind().on('click', '.edit_content_button', function() {
			var id = $(this).data('id');
			$.ajax({
				url : '/api/premium/read',
				type : 'GET',
				data : {
					'content_id' : id
				},
				success : function(data) {
					$("#edit_content_id").val(data["id"]);
					$("#edit_title").val(data["title"]);
					$("#edit_description").html(data["description"]);
					$("#edit_image_url").val(data["image_url"]);
					$("#edit_category").val(data["category"]);
					$("#edit_content_modal").modal();
				}
			})
		});

		/* ------------------------- *\
			General
		\* ------------------------- */

		$(document).ready(function() {
			getContent();
		});
	</script>
@endsection