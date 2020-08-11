<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Fonts -->
    <link href="//fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<style>
		.navbar-nav {
			flex-wrap: wrap;
		}
		
		code {
			margin: 0 2px;
			padding: 3px 5px;
			color: #d63200;
			background-color: #ccc;			
			border-radius: 2px;
		}
	</style>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>{{ config('app.name') }}</title>
</head>
<body>
	<div id="app">
		<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm mb-3">
			<div class="container">
				<a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav mr-auto">
						@foreach ($routes as $route)
						<li class="nav-item">
							<a class="nav-link" href="{{ $route['uri'] }}">{{ $route['name'] }}</a>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			@yield('content')
		</div>
	</div>
</body>
</html>