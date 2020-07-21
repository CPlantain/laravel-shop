<x-admin.dashboard>
	
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Create New Product</h2>
			<!-- <p class="panel-subtitle">
				Basic validation will display a label with the error after the form control.
			</p> -->
		</header>

		<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
			<div class="panel-body">
				<div class="form-group">
					<label class="col-sm-2 control-label">Name<span class="required">*</span></label>
					<div class="col-sm-8">
						<input type="text" name="name" value="{{ old('name') }}" class="form-control"/>

						<x-admin.error :input="('name')"/>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Slug<span class="required">*</span></label>
					<div class="col-sm-8">							
						<input type="text" name="slug" value="{{ old('slug') }}" class="form-control"/>

						<x-admin.error :input="('slug')"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Description</span></label>
					<div class="col-sm-8">
						<textarea name="description" rows="5" class="form-control" placeholder="Write a short description">{{ old('description') }}</textarea>

						<x-admin.error :input="('description')"/>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Category</span></label>
					<div class="col-sm-8">
						<select name="category_id">
							@forelse ($categories as $category)
								<option value="{{ $category->id }}">{{ $category->name }}</option>
							@empty
								<option disabled>no categories available</option>
							@endforelse
						</select>

						<x-admin.error :input="('category_id')"/>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Upload Image</label>
					<div class="col-sm-8">
						<div class="fileupload fileupload-new">							
							<input type="file" name="image" class="form-control-file"/>
						</div>

						<x-admin.error :input="('image')"/>
					</div>

				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Price<span class="required">*</span></label>
					<div class="col-sm-8">							
						<input type="text" name="price" value="{{ old('price') }}" class="form-control"/>

						<x-admin.error :input="('price')"/>
						
					</div>
				</div>
				
				<div class="form-group">
					
					<label class="col-sm-2 control-label">Additional</label>

					<div class="col-sm-8 content-left">

						@forelse ([
							'new' => 'New Product', 
							'hot' => 'Hot Product', 
							'recommended' => 'Recommended Product'
						] as $input => $label)

							<div class="checkbox-custom checkbox-default">
								<input type="checkbox" name="{{ $input }}" id="{{ $input }}">
								<label for="{{ $input }}">{{ $label }}</label>
								
								<x-admin.error :input="$input"/>
							</div>

						@empty
							<p>No options available</p>
						@endforelse

					</div>
				</div>
				@csrf
			</div>

			<footer class="panel-footer">
				<div class="row">
					<div class="col-sm-12 ml-xs">
						<button type="submit" class="btn btn-primary">Submit</button>
						<button type="reset" class="btn btn-default">Reset</button>
					</div>
				</div>
			</footer>
		</form>
	</section>

</x-admin.dashboard>