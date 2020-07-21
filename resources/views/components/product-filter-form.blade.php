<div class="row animate-box" style="margin-bottom: 20px">
	<div class="col-md-12">

		<form action="{{ $route }}" method="GET">

			<div class="row">
				<div class="col-sm-6 col-md-4">
					<label for="price_min">The price from
						<input 
							type="text" size="6" 
							name="price_min" id="price_min" 
							value="{{ request()->price_min }}">
					</label>

					<label for="price_max">to
						<input 
							type="text" size="6" 
							name="price_max" id="price_max" 
							value="{{ request()->price_max }}">
					</label>
				</div>
				<div class="col-sm-2 col-md-2 text-center">
					<label for="new">
						<input 
							type="checkbox" name="new" id="new"
							style="margin-right: 5px"
							@if(request()->has('new')) checked @endif 
							>New Come	
					</label>
				</div>
				<div class="col-sm-2 col-md-2 text-center">
					<label for="recommended">
						<input 
							type="checkbox" name="recommended" id="recommended" 
							style="margin-right: 5px"
							@if(request()->has('recommended')) checked @endif 
							>Recommended
					</label>
				</div>
				<div class="col-sm-2 col-md-2 text-center">
					<label for="hot">
						<input 
							type="checkbox" name="hot" id="hot" 
							style="margin-right: 5px"
							@if(request()->has('hot')) checked @endif 
							>Bestseller
					</label>
				</div>
				<div class="col-sm-5 col-md-2">
					<button type="submit" class="btn btn-sm btn-primary">filter</button>
					<a href="{{ $route }}" class="btn btn-sm btn-primary btn-outline">reset</a>
				</div>
			</div>	
			
		</form>

	</div>	
</div>