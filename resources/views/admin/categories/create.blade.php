<x-admin.dashboard>
	
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Create New Category</h2>
			<!-- <p class="panel-subtitle">
				Basic validation will display a label with the error after the form control.
			</p> -->
		</header>

		<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
			<div class="panel-body">
				<div class="form-group">
					<label class="col-sm-2 control-label">Name<span class="required">*</span></label>
					<div class="col-sm-8">
						<input type="text" name="name" class="form-control" placeholder="eg.: Mobile Phones" />

						@error('name')
							<p class="text-danger" style="margin-bottom: 0px; margin-top: 2px">{{ $message }}</p>
						@enderror
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Slug<span class="required">*</span></label>
					<div class="col-sm-8">							
						<input type="text" name="slug" class="form-control" placeholder="eg.: mobile-phones" />

						@error('slug')
							<p class="text-danger" style="margin-bottom: 0px; margin-top: 2px">{{ $message }}</p>
						@enderror
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Description</span></label>
					<div class="col-sm-8">
						<textarea name="description" rows="5" class="form-control" placeholder="Write a short description"></textarea>
						
						@error('description')
							<p class="text-danger" style="margin-bottom: 0px; margin-top: 2px">{{ $message }}</p>
						@enderror
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Upload Image</label>
					<div class="col-sm-8">
						<div class="fileupload fileupload-new">							
							<input type="file" name="image" class="form-control-file"/>
						</div>

						@error('image')
							<p class="text-danger" style="margin-bottom: 0px; margin-top: 2px">{{ $message }}</p>
						@enderror
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