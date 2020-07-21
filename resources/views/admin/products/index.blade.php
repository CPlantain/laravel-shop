<x-admin.dashboard>
	
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Products</h2>
		</header>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover mb-none">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Slug</th>
							<th>Category</th>
							<th>Price</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($products as $product)
							<tr>
								<td>{{ $product->id }}</td>
								<td>{{ $product->name }}</td>
								<td>{{ $product->slug }}</td>
								<td>
									@if ($product->category)
										{{ $product->category->name }}
									@else
										(none)
									@endif
								</td>
								<td>${{ $product->price }}</td>

								<td class="actions">
									<a href="{{ route('products.show', $product) }}"><i class="fa fa-eye"></i></a>
									<a href="{{ route('products.edit', $product) }}"><i class="fa fa-pencil"></i></a>

									<form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline-block">
										@method('DELETE')
										@csrf
										<button type="submit" 
											class="delete-row" 
											style="border: none; padding: 0px; background-color: #0000">
											<i class="fa fa-trash-o"></i>
										</button>
									</form>
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="5">
									No products here yet
								</td>
							</tr>
						@endforelse						

					</tbody>
				</table>

				<div class="text-right mt-sm mr-xlg">
					{{ $products->links() }}
				</div>

				<a href="{{ route('products.create') }}" class="mb-xs mt-lg mr-xs ml-xs btn btn-primary">
					<i class="fa fa-plus mr-xs"></i> 
					Add New
				</a>

			</div>
		</div>
	</section>

</x-admin.dashboard>