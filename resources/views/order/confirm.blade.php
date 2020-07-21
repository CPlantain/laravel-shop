<x-main-layout title="Order Confirmation">

	<div id="fh5co-product">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h3 class="text-center" 
						style="margin-bottom: 30px; font-weight: 550;"
					>
						The total cost of your order is: ${{ $order->getTotalPrice() }}
					</h3>
					<h4 class="text-center" style="margin-bottom: 40px">Please fill the following fields to confirm your order.</h4>

					<form method="POST" action="{{ route('order.place') }}">
						@csrf

						<div class="form-group">
					         <label for="inputName">Your Name</label>
    					     <input type="text" class="form-control" id="inputName" name="name">
					    </div>

					    <div class="form-group">
					        <label for="inputPhoneNumber">Your Phone Number</label>
					        <input type="text" class="form-control" id="inputPhoneNumber" name="phone">
					        <small class="form-text text-black-30">We'll never share your name or phone number with anyone else.</small>
					    </div>
						
					    <button type="submit" class="btn btn-primary btn-outline mt-6" style="margin-top: 30px">Submit</button>
					</form>


					<!-- <div class="text-right">
						<a href="{{ route('order.confirm') }}" class="btn btn-primary btn-outline">Confirm the Order</a>	
					</div> -->
				</div>
			</div>
		</div>
	</div>

</x-main-layout>