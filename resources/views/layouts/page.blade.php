<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Kamus KBBI</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
	<style>
		body {
			min-height: 75rem;
		}
	</style>
</head>
<body>
	
	
	<nav class="navbar navbar-expand-md navbar-dark bg-primary">
		<div class="container">
			<a class="navbar-brand" href="{{route('page.home')}}">KBBI</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="{{route('page.home')}}">Home</a>
					</li>
				</ul>
				
			</div>
		</div>
	</nav>



	@yield('content')

	<script src="{{asset('js/app.js')}}"></script>
</body>
</html>