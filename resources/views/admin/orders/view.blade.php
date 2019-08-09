@extends('layouts.app')

@section('content')
	@include('layouts.banner')
	@include('admin.orders.modals.refund-confirm')

	<div class='container pt-64 pb-64'>
		<div id='view' class='row justify-content-center'>
			@if(count($orders) > 0)
				<div class="col-12">
					<div style="overflow: auto;">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Client</th>
									<th>Website</th>
									<th>Amount</th>
									<th>Products</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($orders as $order)
								<tr>
									<td style="vertical-align: middle;">{{ $order->client->first_name }} {{ $order->client->last_name }}</td>
									<td style="vertical-align: middle;">{{ $order->website }}</td>
									<td style="vertical-align: middle;">${{ sprintf("%.2f", $order->amount) }}</td>
									<td style="vertical-align: middle;">
										@foreach(json_decode($order->products) as $product)
										{{ $product }}<br>
										@endforeach
									</td>
									<td style="vertical-align: middle;">
										<button type="button" data-charge="{{ $order->charge_id }}" class="btn btn-sm btn-danger m-1 refund_button" style="float: right;">Refund</button>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@else
				<div class="col-lg-7 col-md-7 col-sm-9 col-12">
					<div class="gray-box">
						<h3 class="text-center light-font">No Orders</h3>
						<p class="text-center black light-font">There are no orders in the system. Go out there and sell.</p>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection

@section('page_js')
	<script type='text/javascript'>
		var _token = '{{ csrf_token() }}';

		$(".refund_button").on('click', function() {
			var charge_id = $(this).data('charge');
			$("#refund_charge_id").val(charge_id);
			$("#refund_customer_modal").modal();
		});
	</script>
@endsection