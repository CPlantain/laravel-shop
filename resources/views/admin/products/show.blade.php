<x-admin.dashboard>

	<section class="panel">
		<header class="panel-heading">
			<!-- <div class="panel-actions">
				<a href="#" class="fa fa-caret-down"></a>
				<a href="#" class="fa fa-times"></a>
			</div> -->

			<h2 class="panel-title">Product <b>"{{ $product->name }}"</b></h2>
		</header>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover mb-none">
					<thead>
						<tr>
							<th class="col-md-3">Field</th>
							<th class="col-md-9">Value</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>ID</td>
							<td>{{ $product->id }}</td>
						</tr>
						<tr>
							<td>Slug</td>
							<td>{{ $product->slug }}</td>
						</tr>
						<tr>
							<td>Name</td>
							<td>{{ $product->name }}</td>
						</tr>
						<tr>
							<td>Description</td>
							<td>{{ $product->description }}</td>
						</tr>
						<tr>
							<td>Category</td>
							<td>
								@if ($product->category)
									{{ $product->category->name }}
								@else
									(none)
								@endif
							</td>
						</tr>
						<tr>
							<td>Price</td>
							<td>${{ $product->price }}</td>
						</tr>
						<tr>
							<td>Picture</td>
							<td>
								@if ($product->image)
									<img class="img-responsive" style="max-height: 270px; max-width: 250px" src="{{ Storage::url($product->image) }}" alt="">
								@else
									(none)
								@endif
							</td>
						</tr>
						<tr>
							<td>Ordered times</td>
							<td>{{ $product->orders()->where('status', 1)->count() }}</td>
						</tr>
						<tr>
							<td>Labels</td>
							<td>
								@if($product->isNew())
									<span class="btn btn-sm btn-info">New come</span>
								@endif
								
								@if($product->isRecommended())
									<span class="btn btn-sm btn-success">Recommended</span>
								@endif

								@if($product->isHot())
									<span class="btn btn-sm btn-danger">Bestseller</span>
								@endif

							</td>
						</tr>					
					</tbody>
				</table>

				<a href="{{ route('products.edit', $product) }}" class="mb-xs mt-xlg mr-xs ml-xs btn btn-primary">
					<i class="fa fa-chevron-right mr-xs"></i> 
					Edit
				</a>
			</div>
		</div>
	</section>

</x-admin.dashboard>