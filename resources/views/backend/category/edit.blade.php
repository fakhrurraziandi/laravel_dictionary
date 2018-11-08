@extends('layouts.backend')

@section('content')
    <div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card border-light">
					<div class="card-header">
						<h5 class="mb-0">Edit Category</h5>
					</div>
					<div class="card-body">
						<form action="{{route('backend.category.update', $category->id)}}" method="POST">

							{{csrf_field()}}
							{{method_field('PUT')}}

							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{old('name', $category->name)}}">
								@if($errors->has('name'))
									<p class="text-danger mt-2"><small>{{$errors->first('name')}}</small></p>
								@endif
							</div>

							<div class="form-group">
								<label for="slug">Slug</label>
								<input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{old('slug', $category->slug)}}">
								@if($errors->has('slug'))
									<p class="text-danger mt-2"><small>{{$errors->first('slug')}}</small></p>
								@endif
							</div>

							

							<div class="form-group">
								<label for="status">Status</label>
								<select class="form-control" id="status" name="status" placeholder="Category">
									<?php $statuses = ['enabled', 'disabled']; ?>
									@foreach($statuses as $status)
										<option <?php echo old('status', $category->status) == $status ? 'selected=""' : '' ?> value="{{$status}}">{{ucwords($status)}}</option>
									@endforeach
								</select>
								@if($errors->has('status'))
									<p class="text-danger mt-2"><small>{{$errors->first('status')}}</small></p>
								@endif
							</div>

							<hr>

							<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
							<a href="{{route('backend.category.index')}}" class="btn btn-secondary">Cancel</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
		$(function(){
			$('#name').on('input', function(){
				console.log('changed');
				var nameText = $(this).val();
				var slugText = slugify(nameText);
				$('#slug').val(slugText);
			});
		});	
	</script>
@endsection