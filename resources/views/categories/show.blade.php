<x-main-layout title='{{ $category->name }} category'>

	<div id="fh5co-product">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<span>All the products from:</span>
					<h2>{{ $category->name }}</h2>
					<p>{{ $category->description }}</p>
				</div>
			</div>
			
			<x-product-filter-form :route="route('category', $category)"></x-product-filter-form>

			<x-products-grid :products="$products" :category="false" page='category-products' ></x-products-grid>
			
		</div>
	</div>

</x-main-layout>