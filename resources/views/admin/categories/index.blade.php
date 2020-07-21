<x-admin.dashboard>
	
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Categories</h2>
		</header>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover mb-none">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Slug</th>
							<th>Prod. Amount</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($categories as $category)
							<tr>
								<td>{{ $category->id }}</td>
								<td>{{ $category->name }}</td>
								<td>{{ $category->slug }}</td>
								<td>({{ $category->products->count() }})</td>

								<td class="actions">
									<a href="{{ route('categories.show', $category) }}"><i class="fa fa-eye"></i></a>
									<a href="{{ route('categories.edit', $category) }}"><i class="fa fa-pencil"></i></a>

									<form action="{{ route('categories.destroy', $category) }}" method="POST" style="display: inline-block">
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
									No categories yet
								</td>
							</tr>
						@endforelse

					</tbody>
				</table>

				<div class="text-right mt-sm mr-xlg">
					{{ $categories->links() }}
				</div>

				<a href="{{ route('categories.create') }}" class="mb-xs mt-xlg mr-xs ml-xs btn btn-primary">
					<i class="fa fa-plus mr-xs"></i> 
					Add New
				</a>
			</div>
		</div>
	</section>

</x-admin.dashboard>