<x-admin.dashboard>

	<section class="panel">
		<header class="panel-heading">
			<!-- <div class="panel-actions">
				<a href="#" class="fa fa-caret-down"></a>
				<a href="#" class="fa fa-times"></a>
			</div> -->

			<h2 class="panel-title">Confirmed Orders</h2>
		</header>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover mb-none">
					<thead>
						<tr>
							<th>#</th>
							<th>Customer Name</th>
							<th>Phone Number</th>
							<th>Clearance Date</th>
							<th>Total Price</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($orders as $order)
							<tr>
								<td>{{ $order->id }}</td>
								<td>{{ $order->name }}</td>
								<td>{{ $order->phone }}</td>
								<td>{{ $order->getConfirmationTime() }}</td>
								<td>${{ $order->getTotalPrice() }}</td>
								<td class="actions">
									<a href="{{ route('admin.orders.show', $order) }}"><i class="fa fa-eye"></i></a>
									<a href="" class="delete-row"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="5">
									No confirmed orders yet
								</td>
							</tr>
						@endforelse
						
					</tbody>
				</table>

				<div class="text-right mt-sm mr-xlg">
					{{ $orders->links() }}
				</div>
			</div>
		</div>
	</section>

</x-admin.dashboard>