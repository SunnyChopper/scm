@extends('layouts.app')

@section('content')
	@include('layouts.banner')
	@include('admin.products.modals.create')
	@include('admin.products.modals.delete')

	<div class='container pt-64 pb-64'>
		<div id='view' class='row justify-content-center'>
			
		</div>
	</div>
@endsection

@section('page_js')
	<script type='text/javascript'>

		/* ------------------------ *\
			Global Variables
		\* ------------------------ */

		var _token = '{{ csrf_token() }}';
		var products = Array();
		var count = 0;

		/* ------------------------ *\
			Functions
		\* ------------------------ */

		function displayEmptyView() {
			var html = `
				<div class="col-lg-5 col-md-6 col-sm-10 col-12">
					<div class="gray-box">
						<h3 class="text-center mb-2">No Products Found</h3>
						<p class="text-center mb-3">There were no products found in the database. Click below to create the first product.</p>
						<button type="button" class="btn btn-primary centered new_product_button">Create New Product</button>
					</div>
				</div>
			`;

			$('#view').html(html);
		}

		function displayTableView() {
			var html = `
				<div class="col-lg-8 col-md-8 col-sm-12 col-12">
					<div style="overflow: auto;">
						<h3 class="mb-3">Products</h3>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Title</th>
									<th>Description</th>
									<th>Price</th>
									<th></th>
								</tr>
							</thead>
							<tbody>`;

			products.forEach(function(element) {
				html += `
					<tr>
						<td style="vertical-align: middle;">` + element["title"] + `</td>
						<td style="vertical-align: middle;">` + element["description"] + `</td>
						<td style="vertical-align: middle;">$` + element["price"] + `</td>
						<td style="vertical-align: middle;">
							<button data-id="` + element["id"] + `" type="button" class="btn btn-danger btn-sm m-1 delete_product_button" style="float: right;">Delete</button>
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
						<h4 class="text-center">Quick Actions</h4>
						<button class="mt-16 btn btn-primary full-width centered new_product_button">Create New Product</button>
					</div>
				</div>
			`;

			$("#view").html(html);
		}

		function updateUI() {
			if (count > 0) {
				displayTableView();
			} else {
				displayEmptyView();
			}
		}

		function fetchData() {
			$.ajax({
				url : '/api/products',
				type : 'GET',
				success : function(data) {
					products = data;
					count = products.length;
					updateUI();
				}
			});
		}

		/* ------------------------ *\
			Auto-run
		\* ------------------------ */

		$(document).ready(function() {
			fetchData();
		});

		/* ------------------------ *\
			Button Clicks
		\* ------------------------ */

		$(".create").unbind().on('click', function() {
			$.ajax({
				url : '/api/products/create',
				type : 'POST',
				data : {
					'_token' : _token,
					'title' : $("#create_title").val(),
					'description' : $("#create_description").val(),
					'image_url' : $("#create_image_url").val(),
					'price' : $("#create_price").val()
				},
				success : function(data) {
					if (data == true) {
						$("#create_title").val('');
						$("#create_description").val('');
						$("#create_image_url").val('');
						$("#create_price").val('');
						$("#create_product_modal").modal('hide');

						fetchData();
					}
				}
			});
		});

		$(".delete").on('click', function() {
			$.ajax({
				url : '/api/products/delete',
				type : 'POST',
				data : {
					'_token' : _token,
					'product_id' : $("#delete_product_id").val()
				},
				success : function(data) {
					if (data == true) {
						$("#delete_product_modal").modal('hide');
						fetchData();
					}
				}
			});
		});

		$(document.body).on('click', '.new_product_button', function() {
			$("#create_product_modal").modal();
		});

		$(document.body).on('click', '.delete_product_button', function() {
			$("#delete_product_id").val($(this).data('id'));
			$("#delete_product_modal").modal();
		});
	</script>
@endsection