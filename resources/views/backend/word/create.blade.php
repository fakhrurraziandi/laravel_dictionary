@extends('layouts.backend')

@section('content')
    <div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card border-light">
					<div class="card-header">
						<h5 class="mb-0">Create Word</h5>
					</div>
					<div class="card-body">
						<form action="{{route('backend.word.store')}}" method="POST">

							{{csrf_field()}}

							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{old('name')}}">
								@if($errors->has('name'))
									<p class="text-danger mt-2"><small>{{$errors->first('name')}}</small></p>
								@endif
							</div>

							<div class="form-group">
								<label for="slug">Slug</label>
								<input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{old('slug')}}">
								@if($errors->has('slug'))
									<p class="text-danger mt-2"><small>{{$errors->first('slug')}}</small></p>
								@endif
							</div>

							<div class="form-group">
								<label for="meaning">Meaning</label>
								<textarea class="form-control" id="meaning" name="meaning" placeholder="Meaning">{{old('meaning')}}</textarea>
								@if($errors->has('meaning'))
									<p class="text-danger mt-2"><small>{{$errors->first('meaning')}}</small></p>
								@endif
							</div>

							<div class="form-group">
								<label for="hit">Hit</label>
								<input type="number" class="form-control" id="hit" name="hit" placeholder="Hit" value="{{old('hit')}}">
								@if($errors->has('hit'))
									<p class="text-danger mt-2"><small>{{$errors->first('hit')}}</small></p>
								@endif
							</div>

							

							<hr>

							<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
							<a href="{{route('backend.word.index')}}" class="btn btn-secondary">Cancel</a>
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
				var slugText = slugify(nameText.toLowerCase());
				$('#slug').val(slugText);
			});

			$('#meaning').ckeditor();
		});	
	</script>
@endsection