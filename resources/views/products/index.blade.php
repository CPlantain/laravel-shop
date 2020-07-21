<x-main-layout title='All the available products'>

	<div id="fh5co-product">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<!-- <span>Cool Stuff</span> -->
					<h2>All the available products</h2>
					<!-- <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p> -->
				</div>
			</div>

			<x-product-filter-form :route="route('products')"></x-product-filter-form>
			
			<x-products-grid :products="$products" page='all-products' ></x-products-grid>
				
		</div>
	</div>

</x-main-layout>
