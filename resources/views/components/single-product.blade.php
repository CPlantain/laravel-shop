<div class="col-md-4 text-center animate-box">
	<div class="product">
		<div class="product-grid" style="background-image:url({{ Storage::url('img/categories/img_bg_4.jpg') }});">
			<div class="inner">
				<p>
					<!-- <a href="{{ route('cart.add', $product) }}" class="icon"><i class="icon-shopping-cart"></i></a> -->

					<a href="{{ $product->path() }}" class="icon"><i class="icon-eye"></i></a>
				</p>
			</div>
		</div>
		<div class="desc">
			<div class="row" style="padding-bottom: 30px">
				<div class="col-md-5">
					
					@if($product->isNew())
						<span class="alert alert-info" style="display: inline-block; width: 100%; padding: 0px; margin-bottom: 5px">New Come</span>
					@endif

					@if($product->isRecommended())
						<span class="alert alert-success" style="display: inline-block; width: 100%; padding: 0px; margin-bottom: 5px">We Recommend</span>
					@endif

					@if($product->isHot())
						<span class="alert alert-danger" style="display: inline-block; width: 100%; padding: 0px; margin-bottom: 5px">Bestseller!</span>
					@endif
				</div>

				<div class="col-md-7">
					<h3><a href="{{ $product->path() }}">{{ $product->name }}</a></h3>

						@if($category)
							<span>
								<a href="{{ route('category', $product->category) }}">
									{{ $product->category->name }}
								</a>
							</span><br>
						@endif
						
					<div>
						<form method="POST" action="{{ route('cart.add', $product) }}" 
							style="display: inline-block; margin-top: 10px; margin-right: 10px">	
							@csrf
					    	<button type="submit" class="btn btn-sm btn-primary btn-outline">Add to Cart</button>
						</form>

						<span class="price">${{ $product->price }}</span>
					</div>		
				</div>
			</div>
			
		</div>
	</div>
</div>