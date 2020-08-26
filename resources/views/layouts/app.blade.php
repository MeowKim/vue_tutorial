<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Fonts -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Nunito">
    <!-- Styles -->
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/animate.css@3.5.1">
	<style>
		.navbar-nav {
			flex-wrap: wrap;
		}

		.navbar-collapse h4 {
			padding-left: 0.5rem;
			padding-right: 0.5rem;
		}
		
		code {
			margin: 0 2px;
			padding: 3px 5px;
			color: #d63200;
			background-color: #ccc;			
			border-radius: 2px;
		}

		.container {
			margin-bottom: 50px;
		}
	</style>
    <!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/tween.js@16.3.4"></script>
	<script src="https://cdn.jsdelivr.net/npm/color-js@1.0.3"></script>
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
					@foreach ($routes as $key=>$value)
						<h4 class="navbar-brand">{{ $key }}</h4>
						<ul class="navbar-nav mr-auto">
						@foreach ($value as $route)
							<li class="nav-item">
								<a class="nav-link" href="/{{ $route['uri'] }}">{{ $route['name'] }}</a>
							</li>
						@endforeach
						</ul>
					@endforeach
				</div>
			</div>
		</nav>
		<div class="container">
			@yield('content')
		</div>
	</div>
</body>
</html>