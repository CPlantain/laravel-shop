<x-main-layout title="View Cart">

	<div id="fh5co-product">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">

					<h3 class="text-center" style="margin-bottom: 40px">Your Confirmed orders:</h3>

						@if(!$orders->isEmpty())
							<table class="table table-hover">
								<thead>
								    <tr>
								        <th scope="col">#</th>
								        <th scope="col">Name</th>
								        <th scope="col">Phone Number</th>
								        <th scope="col">Clearance Date</th>
								        <th scope="col">Total Price</th>
								        <th scope="col">Actions</th>
								    </tr>
								</thead>
								  <tbody>
									  	@forelse($orders as $order)
										    
												<td>{{ $order->id }}</td>  
										        <td>{{ $order->name }}</td>
										        <td>{{ $order->phone }}</td>
												<td>{{ $order->getConfirmationTime() }}</td>
												<td>${{ $order->getTotalPrice() }}</td>
												<td>
													<a href="{{ route('user.orders.show', $order) }}">show</a>
												</td>
										    </tr>
										@empty
											<tr>
												<td colspan="6">
													No confirmed orders yet
												</td>
											</tr>
										@endforelse	
								  </tbody>
							</table>
						@else

							<h4 class="text-center" style="margin-bottom: 40px">You don't have any confirmed orders yet</h4>

							<div class="text-center">
								<a href="{{ route('products') }}" class="btn btn-primary btn-outline">Go back to the shop</a>
							</div>
						@endif
					
				</div>
			</div>
		</div>
	</div>

</x-main-layout>