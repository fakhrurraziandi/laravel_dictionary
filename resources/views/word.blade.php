
@extends('layouts.page')

@section('content')
	
	<section class="section section-banner section-banner-mini">
		<div class="container">
			<div class="row mb-4">
				<div class="col-md-6">
					
					<div class="text-white">
						<h1 class="text-white">KBBI</h1>
						<p class="lead">Kamus Besar Bahasa Indonesia</p>
					</div>

					<form method="GET" action="{{route('page.search')}}">


						<div class="form-group">
							{{-- <label for="exampleInputEmail1">Cari Kata</label> --}}
							<div class="input-group input-group-lg">

								<input type="text" name="keyword" id="keyword" class="form-control border-0" placeholder="Cari Kata" aria-label="Cari Kata" aria-describedby="button-addon1" value="{{old('keyword')}}">

								<div class="input-group-append">
									<button class="btn btn-color-3 border-0" type="submit" id="button-addon1"><i class="fa fa-search"></i></button>
								</div>
								
							</div>
							@if($errors->has('keyword'))
								<p class="text-white mt-2"><small>{{$errors->first('keyword')}}</small></p>
							@endif
						</div>
					</form>
				</div>
			</div>

		

			
		</div>
	</section>
	
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					
					
					@foreach($words as $word)
						<div class="card border-light mb-3">
							<div class="card-body">
								<h4>{{$word->name}}</h4>
								<div class="meaning">
									{!! html_entity_decode($word->meaning) !!}
								</div>
							</div>
						</div>
					@endforeach
				


					
						
				</div>
			</div>
		</div>
	</div>

	<section class="section">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md-12 text-center">
					<h3>Berita Terbaru</h3>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<div class="card border-light">
						<div class="card-body">
							<h4><a href="#">Lorem ipsum dolor sit amet.</a></h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi qui optio consequuntur tenetur tempora! Quaerat.</p>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card border-light">
						<div class="card-body">
							<h4><a href="#">Lorem ipsum dolor sit amet.</a></h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi qui optio consequuntur tenetur tempora! Quaerat.</p>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card border-light">
						<div class="card-body">
							<h4><a href="#">Lorem ipsum dolor sit amet.</a></h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi qui optio consequuntur tenetur tempora! Quaerat.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>




@endsection