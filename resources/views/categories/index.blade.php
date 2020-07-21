<x-main-layout title="The list of product categories">
	
	<div id="fh5co-services" class="fh5co-bg-section">
		<div class="container">
			<div class="row">

				@forelse($categories as $category)
					<div class="col-md-4 col-sm-4 text-center align-self-center">
						<!-- <div class="feature-center animate-box" data-animate-effect="fadeIn"> -->
						<div class="animate-box" data-animate-effect="fadeIn">
							<span class="icon">
								<img class="img-rounded" src="{{ Storage::url($category->image) }}" style="max-width: 140px; max-height: 130px; margin: 15px" alt="">
								<!-- <i class="icon-credit-card"></i> -->
							</span>
							<h3>{{ $category->name }}</h3>
							<p>{{ $category->description }}</p>
							<p><a href="{{ route('category', $category) }}" class="btn btn-primary btn-outline">Learn More</a></p>
						</div>
					</div>
				@empty
					<div class="col-md-12 col-sm-4 text-center">
						<h3>No categories added yet</h3>
					</div>
				@endforelse

				<div class="col-md-12 text-center">
					{{ $categories->links() }}
				</div>
				
			</div>
		</div>
	</div>

</x-main-layout>