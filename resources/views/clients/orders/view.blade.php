@extends('layouts.app')

@section('content')
	@include('layouts.banner')
	@include('clients.orders.modals.create')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			@if(count($invoices) > 0)
			@else
				<div class="col-lg-7 col-md-8 col-sm-10 col-12">
					<div class="gray-box">
						<h3 class="text-center mb-2">No Orders Found</h3>
						<p class="text-center mb-3">There were no orders found associated with your account.</p>
						<button type="button" class="btn btn-primary centered new_order_button">Create New Order</button>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		$(".new_order_button").on('click', function() {
			$("#create_invoice_modal").modal();
		});
	</script>
@endsection