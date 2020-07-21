<x-admin.dashboard>

	<section class="panel">
		<header class="panel-heading">
			<!-- <div class="panel-actions">
				<a href="#" class="fa fa-caret-down"></a>
				<a href="#" class="fa fa-times"></a>
			</div> -->

			<h2 class="panel-title">Category <b>"{{ $category->name }}"</b></h2>
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
							<td>{{ $category->id }}</td>
						</tr>
						<tr>
							<td>Slug</td>
							<td>{{ $category->slug }}</td>
						</tr>
						<tr>
							<td>Name</td>
							<td>{{ $category->name }}</td>
						</tr>
						<tr>
							<td>Description</td>
							<td>{{ $category->description }}</td>
						</tr>
						<tr>
							<td>Picture</td>
							<td>
								@if($category->image)
									<img class="img-responsive" style="max-height: 270px; max-width: 250px" src="{{ Storage::url($category->image) }}" alt="">
								@else
									(none)
								@endif
							</td>
						</tr>
						<tr>
							<td>Amount of products</td>
							<td>{{ $category->products->count() }}</td>
						</tr>						
					</tbody>
				</table>

				<a href="{{ route('categories.edit', $category) }}" class="mb-xs mt-xlg mr-xs ml-xs btn btn-primary">
					<i class="fa fa-chevron-right mr-xs"></i> 
					Edit
				</a>
			</div>
		</div>
	</section>

</x-admin.dashboard>