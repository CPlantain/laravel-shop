<x-admin.dashboard>
	
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Edit Category <b>"{{ $category->name }}"</b></h2>
			<!-- <p class="panel-subtitle">
				Basic validation will display a label with the error after the form control.
			</p> -->
		</header>

		<form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">
			@method('PUT')
			<div class="panel-body">
				<div class="form-group">
					<label class="col-sm-2 control-label">Name<span class="required">*</span></label>
					<div class="col-sm-8">
						<input type="text" name="name" class="form-control" value="{{ $category->name }}" placeholder="eg.: Mobile Phones"/>

						@error('name')
							<p class="text-danger" style="margin-bottom: 0px; margin-top: 2px">{{ $message }}</p>
						@enderror
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Slug<span class="required">*</span></label>
					<div class="col-sm-8">							
						<input type="text" name="slug" class="form-control" value="{{ $category->slug }}" placeholder="eg.: mobile-phones"/>

						@error('slug')
							<p class="text-danger" style="margin-bottom: 0px; margin-top: 2px">{{ $message }}</p>
						@enderror
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Description</span></label>
					<div class="col-sm-8">
						<textarea name="description" rows="5" class="form-control" placeholder="Write a short description">{{ $category->description }}</textarea>

						@error('description')
							<p class="text-danger" style="margin-bottom: 0px; margin-top: 2px">{{ $message }}</p>
						@enderror
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Current Image</label>
					<div class="col-sm-8">
						@if($category->image)
							<img class="img-responsive" style="max-height: 240px; max-width: 230px" src="{{ Storage::url($category->image) }}" alt="">
						@else
							(none)
						@endif
					</div>
					
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Upload New Image</label>
					<div class="col-sm-8">
						<div class="fileupload fileupload-new">							
							<input type="file" name="image" class="form-control-file"/>

							@error('image')
								<p class="text-danger" style="margin-bottom: 0px; margin-top: 2px">{{ $message }}</p>
							@enderror
						</div>
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