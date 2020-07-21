<x-admin.dashboard>

	<section class="panel">
		<header class="panel-heading">
			<!-- <div class="panel-actions">
				<a href="#" class="fa fa-caret-down"></a>
				<a href="#" class="fa fa-times"></a>
			</div> -->

			<h2 class="panel-title">View Order №{{ $order->id }}</h2>

			<h5 class="mt-lg">Customer name: 
				<b>
					@if ($order->name) 
						{{ $order->name }}
					@else
						 (not specified) 
					@endif
				</b>
			</h5>
			<h5>Phone number: <b>{{ $order->phone }}</b></h5>
		</header>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover mb-none">
					<thead>
						<tr>
							<th>Product Name</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Total Price</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($order->products as $product)
							<tr>
								
								<td>
									<img class="img-responsive" style="max-height: 100px; max-width: 90px" src="{{ Storage::url($product->image) }}" alt="">
									{{ $product->name }}
								</td>
								<td>{{ $product->price }}</td>
								<td>({{ $product->pivot->count() }})</td>
								<td>${{ $product->getTotalPrice() }}</td>
								
							</tr>
						@empty
							<tr>
								<td colspan="4">
									Something went wrong. No products in this order.
								</td>
							</tr>
						@endforelse
						
					</tbody>
					<tfoot>
						<tr class="pt-lg">
							<td colspan="3">
								<b>Total Order Price:</b>
							</td>
							<td>
								<b>${{ $order->getTotalPrice() }}</b>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</section>

</x-admin.dashboard>