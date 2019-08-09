@extends('layouts.app')

@section('content')
	@include('layouts.banner')
	@include('clients.orders.modals.create')

	<div class="container pt-64 pb-64">
		<div id="app" class="row justify-content-center">
			
		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		var _token = '{{ csrf_token() }}';
		var client_id = {{ \App\Custom\ClientHelper::getID() }};
		var orders = Array();

		function displayEmptyView() {
			var html = `
				<div class="col-lg-7 col-md-8 col-sm-10 col-12">
					<div class="gray-box">
						<h3 class="text-center mb-2">No Orders Found</h3>
						<p class="text-center mb-3">There were no orders found associated with your account.</p>
						<button type="button" class="btn btn-primary centered new_order_button">Create New Order</button>
					</div>
				</div>
			`;

			$("#app").html(html);
		}

		function displayOrdersTable() {
			var table_html = `
				<div class="col-lg-8 col-md-8 col-sm-12 col-12">
					<div style="overflow: auto;">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Website</th>
									<th>Products</th>
									<th>Price</th>
									<th></th>
								</tr>
							</thead>
							<tbody>`;

			orders.forEach(function(element) {
				products = JSON.parse(element["products"]);

				if (products.length == 0) {
					table_html += `
						<tr>
							<td>` + element["website"] + `</td>
							<td>N/A</td>
							<td>$` + element["price"].toFixed(2) + `</td>
							<td>
								<button type="button" class="btn btn-sm btn-danger delete_order_button" style="float: right;">Delete</button>
								<button type="button" class="btn btn-sm btn-warning edit_order_button" style="float: right;">Edit</button>
							</td>
						</tr>
					`;
				} else {
					table_html += `
						<tr>
							<td style="vertical-align: middle;">` + element["website"] + `</td>
							<td style="vertical-align: middle;">TODO</td>
							<td style="vertical-align: middle;">$` + element["price"].toFixed(2) + `</td>
							<td style="vertical-align: middle;">
								<button type="button" class="btn btn-sm btn-danger delete_order_button m-1" style="float: right;">Delete</button>
								<button type="button" class="btn btn-sm btn-warning edit_order_button m-1" style="float: right;">Edit</button>
							</td>
						</tr>
					`;
				}
			});

			table_html +=	`</tbody>
						</table>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-12 mt-32-mobile">
					<div class="gray-box">
						<h4 class="text-center mb-3">Quick Actions</h4>
						<button class="btn btn-primary full-width new_order_button">Create New Order</button>
					</div>
				</div>
			`;

			$("#app").html(table_html);
		}

		function updateUI() {
			if (orders.length > 0) {
				displayOrdersTable();	
			} else {
				displayEmptyView();
			}
		}

		function getInvoices() {
			$.ajax({
				url : '/api/orders/get',
				type : 'GET',
				data : {
					'client_id' : client_id
				},
				success : function(data) {
					orders = data;
					updateUI();
				}
			});
		}

		$(document).ready(function() {
			getInvoices();
		});

		$(document.body).on('click', '.new_order_button', function() {
			$("#create_invoice_modal").modal();
		});

		$(".create").on('click', function() {
			var first_name = $("#create_first_name").val();
			var last_name = $("#create_last_name").val();
			var email = $("#create_email").val();
			var website = $("#create_website").val();

			if (first_name != "" && last_name != "" && email != "" && website != "") {
				$.ajax({
					url : '/api/orders/create',
					type : 'POST',
					data : {
						'_token' : _token,
						'client_id' : client_id,
						'website' : website
					},
					success : function(data) {
						if (data == true) {
							$("#create_invoice_modal").modal('hide');
						}
					}
				});
			} else {

			}
		});
	</script>
@endsection