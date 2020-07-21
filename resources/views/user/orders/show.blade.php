<x-main-layout title="View Cart">

	<div id="fh5co-product">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">

					<h3>View Order №{{ $order->id }}</h3>
					<h5>Customer name: <b>{{ $order->name }}</b></h5>
					<h5>Phone number: <b>{{ $order->phone }}</b></h5>

					<table class="table table-hover">
						<thead>
						    <tr>
						        <!-- <th scope="col"></th> -->
						        <th scope="col">Product Name</th>
						        <th scope="col">Price</th>
						        <th scope="col">Quantity</th>
						        <th scope="col">Total Price</th>
						    </tr>
						</thead>
						  <tbody>
							  	@foreach($order->products as $product)
								    <tr>
								        
								        <!-- <td class="text-left" style="margin-right: 0px; margin-left: 0px; padding-right: 0px; padding-left: 0px">
									      	
								        </td> -->
								        <td>
								        	<img 
									      		class="img-rounded" 
									      		style="max-width: 80px; max-height: 80px; margin-right: 20px" 
									      		src="{{ Storage::url($product->image) }}" alt=""
									      	>
									      	<a href="{{ $product->path() }}">{{ $product->name }}</a>
								        </td>
								        <td>${{ $product->price }}</td>

								        <td class="content-justify-center">
								        	

								        	<p style="display: inline-block; padding: 3px">{{ $product->pivot->count }}</p>

								        	
								        </td>

								        <td>${{  $product->getTotalPrice() }}</td>
								    </tr>
								@endforeach	
								
								<tr>
									<td colspan="3"><b>Total Order Price:</b></td>
									<td><b>${{ $order->getTotalPrice() }}</b></td>
							    </tr>

						  </tbody>
					</table>

				</div>
			</div>
		</div>
	</div>

</x-main-layout>