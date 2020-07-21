<div class="row">

	@forelse($products as $product)
		<x-single-product :product="$product" :category="$category" />
	@empty
		<x-empty-message :page="$attributes['page']" />
	@endforelse

	<div class="col-md-12 text-center">
		{{ $products->withQueryString()->links() }}
	</div>
</div>