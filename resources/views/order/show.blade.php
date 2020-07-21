<x-main-layout title="View Cart">

	<div id="fh5co-product">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">

					@if($order && !$order->products->isEmpty())
						<table class="table table-hover">
							<thead>
							    <tr>
							        <th scope="col"></th>
							        <th scope="col"></th>
							        <th scope="col">Product</th>
							        <th scope="col">Price</th>
							        <th scope="col">Quantity</th>
							        <th scope="col">Total</th>
							    </tr>
							</thead>
							  <tbody>
								  	@foreach($order->products as $product)
									    <tr>
									        <td scope="row" style="padding-right: 0px">
									        	<form action="{{ route('cart.remove', $product) }}" method="POST"
									        			style="padding-right: 0px; margin-right: 0px">
									        		@method('DELETE')
									        		@csrf

									        		<input type="hidden" name="button" value="trash">

									        		<button class="btn" 
									        				class="icon" 
									        				title="remove from the cart" 
									        				style="background-color: #0000">
									        			<i class="icon-trash"></i>
									        		</button>
									        	</form>
									        </td>
									        <td class="text-left" style="margin-right: 0px; margin-left: 0px; padding-right: 0px; padding-left: 0px">
										      	<img 
										      		class="img-rounded" 
										      		style="max-width: 80px; max-height: 80px" 
										      		src="{{ Storage::url('img/categories/img_bg_4.jpg') }}" alt=""
										      	>
									        </td>
									        <td>
										      	<a href="{{ $product->path() }}">{{ $product->name }}</a>
									        </td>
									        <td>${{ $product->price }}</td>

									        <td class="content-justify-center">
									        	<form action="{{ route('cart.add', $product) }}" method="POST" style="display: inline-block;">
									        		@csrf
									        		<button class="btn" 
									        				class="icon" 
									        				style="background-color: #0000; padding: 7px; padding-left: 0px;margin:0px">
									        			<i class="icon-circle-plus"></i>
									        		</button>
									        	</form>

									        	<p style="display: inline-block; padding: 3px">{{ $product->pivot->count }}</p>

									        	<form action="{{ route('cart.remove', $product) }}" method="POST" style="display: inline-block;">
									        		@method('DELETE')
									        		@csrf

									        		<button class="btn" 
									        				class="icon" 
									        				style="background-color: #0000; padding: 7px; margin:0px">
									        			<i class="icon-circle-minus"></i>
									        		</button>
									        	</form>
									        </td>

									        <td>${{  $product->getTotalPrice() }}</td>
									    </tr>
									@endforeach	
									
									<tr>
										<td colspan="5"><b>Total Order Price:</b></td>
										<td><b>${{ $order->getTotalPrice() }}</b></td>
								    </tr>

							  </tbody>
						</table>

						<div class="text-right">
							<a href="{{ route('order.confirm') }}" class="btn btn-primary btn-outline">Confirm the Order</a>
						</div>

					@else
						<!-- <tr style="margin-top: 20px">
							<td colspan="5" class="text-center">
								<h3>Your cart is empty yet!</h3>
							</td>
						</tr> -->
						<h3 class="text-center" style="margin-bottom: 40px">Your cart is empty yet!</h3>

						<div class="text-center">
							<a href="{{ route('products') }}" class="btn btn-primary btn-outline">Go back to the shop</a>
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>

</x-main-layout>